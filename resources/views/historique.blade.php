<x-app-layout>

    <main>
        <div class="ag-timeline-block">
            <div class="ag-timeline_title-box">
                <div class="ag-timeline_tagline">Historique</div>
                <div class="ag-timeline_pdf">
                    <a href="http://escaleasbl.be/wp-content/uploads/convention-accompagnement.pdf">Télécharger
                        l'historique en
                        PDF</a>
                </div>
            </div>
            <section class="ag-section">
                <div class="ag-format-container">
                    <div class="js-timeline ag-timeline">
                        <div class="js-timeline_line ag-timeline_line">
                            <div class="js-timeline_line-progress ag-timeline_line-progress"></div>
                        </div>
                        <div class="ag-timeline_list">
                            @foreach ($historiques as $historique)
                                <div class="js-timeline_item ag-timeline_item">
                                    <div class="ag-timeline-card_box">
                                        <div class="js-timeline-card_point-box ag-timeline-card_point-box">
                                            <div class="text-center bg-primary text-white font-weight-bold py-2 px-3 rounded">{{ $historique->year }}</div>
                                        </div>
                                    </div>
                                    <div class="ag-timeline-card_item">
                                        <div class="ag-timeline-card_inner">
                                            <div class="ag-timeline-card_img-box">
                                                @if ($historique->youtube)
                                                    <div class="ratio ratio-16x9 mt-5">
                                                        <iframe
                                                            src="https://www.youtube.com/embed/{{ $historique->youtube }}"></iframe>
                                                    </div>
                                                @endif
                                                @if ($historique->vimeo)
                                                    <div class="ratio ratio-16x9 mt-5">
                                                        <iframe
                                                            src="https://player.vimeo.com/video/{{ $historique->vimeo }}"
                                                            allow="autoplay; fullscreen; picture-in-picture"></iframe>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ag-timeline-card_info">
                                                <div class="ag-timeline-card_desc">
                                                    {!! str_replace('<p>', '<p class="mb-4">', str($historique->description)->markdown()) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ag-timeline-card_arrow"></div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    @section('scripts')
        <script>
            (function($) {
                $(function() {
                    $(window).on("scroll", function() {
                        fnOnScroll();
                    });

                    $(window).on("resize", function() {
                        fnOnResize();
                    });

                    var agTimeline = $(".js-timeline"),
                        agTimelineLine = $(".js-timeline_line"),
                        agTimelineLineProgress = $(".js-timeline_line-progress"),
                        agTimelinePoint = $(".js-timeline-card_point-box"),
                        agTimelineItem = $(".js-timeline_item"),
                        agOuterHeight = $(window).outerHeight(),
                        agHeight = $(window).height(),
                        f = -1,
                        agFlag = false;

                    function fnOnScroll() {
                        agPosY = $(window).scrollTop();

                        fnUpdateFrame();
                    }

                    function fnOnResize() {
                        agPosY = $(window).scrollTop();
                        agHeight = $(window).height();

                        fnUpdateFrame();
                    }

                    function fnUpdateWindow() {
                        agFlag = false;

                        agTimelineLine.css({
                            top: agTimelineItem.first().find(agTimelinePoint).offset().top -
                                agTimelineItem.first().offset().top,
                            bottom: agTimeline.offset().top +
                                agTimeline.outerHeight() -
                                agTimelineItem.last().find(agTimelinePoint).offset().top,
                        });

                        f !== agPosY && ((f = agPosY), agHeight, fnUpdateProgress());
                    }

                    function fnUpdateProgress() {
                        var agTop = agTimelineItem
                            .last()
                            .find(agTimelinePoint)
                            .offset().top;

                        i = agTop + agPosY - $(window).scrollTop();
                        a =
                            agTimelineLineProgress.offset().top +
                            agPosY -
                            $(window).scrollTop();
                        n = agPosY - a + agOuterHeight / 2;
                        i <= agPosY + agOuterHeight / 2 && (n = i - a);
                        agTimelineLineProgress.css({
                            height: n + "px",
                        });

                        agTimelineItem.each(function() {
                            var agTop = $(this).find(agTimelinePoint).offset().top;

                            agTop + agPosY - $(window).scrollTop() <
                                agPosY + 0.5 * agOuterHeight ?
                                $(this).addClass("js-ag-active") :
                                $(this).removeClass("js-ag-active");
                        });
                    }

                    function fnUpdateFrame() {
                        agFlag || requestAnimationFrame(fnUpdateWindow);
                        agFlag = true;
                    }
                });
            })(jQuery);
        </script>
    @endsection
</x-app-layout>
