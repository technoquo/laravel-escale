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
                        <div class="container text-center">
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">

                                @if ($accompagnement->attachment_roi)
                                    <div class="col">
                                        <a href="{{ route('download.file', ['model' => 'accompagnementype', 'id' => $accompagnement->id, 'attachment' => $accompagnement->attachment_roi]) }}"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-file-text" width="76"
                                                height="76" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <line x1="9" y1="9" x2="10" y2="9">
                                                </line>
                                                <line x1="9" y1="13" x2="15" y2="13">
                                                </line>
                                                <line x1="9" y1="17" x2="15" y2="17">
                                                </line>
                                            </svg>
                                            <h5 class="mb-3">{{ $accompagnement->name_type_1 }}</h5>
                                        </a>

                                        <span>{{ $accompagnement->description_roi }}</span>
                                    </div>
                                @endif
                                @if ($accompagnement->attachment_scheduler)
                                    <div class="col">
                                        <a href="{{ route('download.file', ['model' => 'accompagnementype', 'id' => $accompagnement->id, 'attachment' => $accompagnement->attachment_scheduler]) }}"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-file-text" width="76"
                                                height="76" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <line x1="9" y1="9" x2="10" y2="9">
                                                </line>
                                                <line x1="9" y1="13" x2="15" y2="13">
                                                </line>
                                                <line x1="9" y1="17" x2="15" y2="17">
                                                </line>
                                            </svg>
                                        </a>
                                        <h5 class="mb-3">{{ $accompagnement->name_type_3 }}</h5>
                                    </div>
                                @endif
                                @if ($accompagnement->attachment_convention)
                                    <div class="col">
                                        <a href="{{ route('download.file', ['model' => 'accompagnementype', 'id' => $accompagnement->id, 'attachment' => $accompagnement->attachment_convention]) }}"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-file-text" width="76"
                                                height="76" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <line x1="9" y1="9" x2="10" y2="9">
                                                </line>
                                                <line x1="9" y1="13" x2="15" y2="13">
                                                </line>
                                                <line x1="9" y1="17" x2="15" y2="17">
                                                </line>
                                            </svg>
                                        </a>
                                        <h5 class="mb-3">{{ $accompagnement->name_type_2 }}</h5>
                                        <span>{{ $accompagnement->description_convention }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
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
</x-app-layout>
