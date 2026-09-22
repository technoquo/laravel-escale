<x-app-layout>
    <!-- About Start -->
    <div class="container-xxl about my-5" style="background-image: url({{ $accompagnement->image }})">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px">
                        {{-- <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://player.vimeo.com/video/{{ $accompagnement->video }}"
                            data-bs-target="#videoModal">
                            <span></span>
                        </button> --}}
                        <iframe width="560" height="315"
                            src="https://player.vimeo.com/video/{{ $accompagnement->video }}">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-nav-white rounded-top p-5 mt-lg-5 box">
                        <h1 class="display-6 mb-4 title">{{ ucwords(str_replace('-', ' ', $accompagnement->slug)) }}
                        </h1>

                        <p>

                            {!! str($accompagnement->description)->markdown() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Video Modal Start -->
    {{-- <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">
                        {{ ucwords(str_replace('-', ' ', $accompagnement->slug)) }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Video Modal End -->

    @if ($accompagnement->slug === 'accompagnement-collectif')
        <div class="container my-5">
            <div class="row justify-content-center g-4">
                @if ($accompagnement->attachment_roi)
                    <div class="col-auto">
                        <a href="{{ route('download.file', ['model' => 'accompagnementype', 'attachment' => 'attachment_roi', 'id' => $accompagnement->id]) }}"
                            class="btn btn-primary" target="_blank">
                            <i class="fa fa-file-pdf me-2"></i>
                            {{ $accompagnement->name_type_1 ?? 'ROI' }}
                        </a>
                    </div>
                @endif
                @if ($accompagnement->attachment_convention)
                    <div class="col-auto">
                        <a href="{{ route('download.file', ['model' => 'accompagnementype', 'attachment' => 'attachment_convention', 'id' => $accompagnement->id]) }}"
                            class="btn btn-primary" target="_blank">
                            <i class="fa fa-file-pdf me-2"></i>
                            {{ $accompagnement->name_type_2 ?? 'Convention' }}
                        </a>
                    </div>
                @endif
                @if ($accompagnement->attachment_scheduler)
                    <div class="col-auto">
                        <a href="{{ route('download.file', ['model' => 'accompagnementype', 'attachment' => 'attachment_scheduler', 'id' => $accompagnement->id]) }}"
                            class="btn btn-primary" target="_blank">
                            <i class="fa fa-file-pdf me-2"></i>
                            {{ $accompagnement->name_type_3 ?? 'Horaire' }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</x-app-layout>
