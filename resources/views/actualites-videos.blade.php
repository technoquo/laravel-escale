<x-app-layout>

    <main>
        <div class="container py-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Actualités Vidéos</h2>
            </div>

            <!-- Recherche -->
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-6">
                    <form method="GET" action="{{ route('actualites.videos') }}">
                        <div class="input-group">
                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Rechercher une vidéo..."
                                   value="{{ $search }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            @if ($search)
                                <a href="{{ route('actualites.videos') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-times"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($videos as $video)
                    <div class="col-12 col-md-6 col-lg-4">
                        @php
                            preg_match('/vimeo\.com\/(?:video\/)?(\d+)/i', $video->url, $m);
                            $vimeoId   = $m[1] ?? null;
                            $embedUrl  = $vimeoId ? "https://player.vimeo.com/video/{$vimeoId}?autoplay=1" : '';
                            $thumbnail = $vimeoId ? "https://vumbnail.com/{$vimeoId}.jpg" : '';
                        @endphp
                        <div class="card h-100 shadow-sm border-0 video-card"
                             role="button"
                             data-bs-toggle="modal"
                             data-bs-target="#videoModal"
                             data-url="{{ $embedUrl }}"
                             data-title="{{ $video->title }}"
                             data-date="{{ $video->published_at ? \Carbon\Carbon::parse($video->published_at)->translatedFormat('d F Y') : '' }}">
                            <div class="video-thumbnail position-relative">
                                <img src="{{ $thumbnail }}" alt="{{ $video->title }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="video-play-overlay">
                                    <i class="fa fa-play-circle fa-4x text-white"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center mb-1 dark-text-white">{{ $video->title }}</h5>
                                @if ($video->published_at)
                                    <p class="text-center text-muted small mb-0">
                                        <i class="fa fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($video->published_at)->translatedFormat('d F Y') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="fa fa-video fa-3x mb-3 d-block"></i>
                        @if ($search)
                            Aucun résultat pour « {{ $search }} ».
                        @else
                            Aucune vidéo disponible pour le moment.
                        @endif
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($videos->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $videos->links() }}
                </div>
            @endif
        </div>

        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="videoModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="ratio ratio-16x9">
                            <iframe id="modalVideoPlayer"
                                    src=""
                                    frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture"
                                    allowfullscreen
                                    class="rounded">
                            </iframe>
                        </div>
                        <p id="modalVideoDate" class="text-muted small mt-2 mb-0">
                            <i class="fa fa-calendar-alt me-1"></i>
                            <span></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .video-thumbnail {
            height: 190px;
            overflow: hidden;
        }

        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .video-play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.3);
            transition: background 0.2s ease;
        }

        .video-play-overlay .fa-play-circle {
            opacity: 0.85;
            transition: transform 0.2s ease, opacity 0.2s ease;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.5));
        }

        .video-card {
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .video-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
        }

        .video-card:hover .video-thumbnail img {
            transform: scale(1.04);
        }

        .video-card:hover .video-play-overlay {
            background: rgba(0, 0, 0, 0.45);
        }

        .video-card:hover .fa-play-circle {
            opacity: 1;
            transform: scale(1.12);
        }

        [data-theme=dark] .dark-text-white {
            color: #ffffff !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const videoModal = document.getElementById('videoModal');

            videoModal.addEventListener('show.bs.modal', function (event) {
                const card = event.relatedTarget;
                const url = card.getAttribute('data-url');
                const title = card.getAttribute('data-title');
                const date = card.getAttribute('data-date');

                document.getElementById('videoModalLabel').textContent = title;
                document.getElementById('modalVideoPlayer').src = url;

                const dateEl = document.getElementById('modalVideoDate');
                if (date) {
                    dateEl.querySelector('span').textContent = date;
                    dateEl.style.display = '';
                } else {
                    dateEl.style.display = 'none';
                }
            });

            videoModal.addEventListener('hidden.bs.modal', function () {
                document.getElementById('modalVideoPlayer').src = '';
            });
        });
    </script>

</x-app-layout>
