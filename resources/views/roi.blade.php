<x-app-layout>
    <main>
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Règlement d'Ordre Intérieur</h2>
                <h5 class="text-muted">(ROI)</h5>
            </div>

            @forelse ($rois as $roi)
                <div class="mb-5">
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <h4 class="fw-semibold mb-0">{{ $roi->title }}</h4>
                        @if ($roi->pdf)
                            <a href="{{ $roi->pdf }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-file-pdf me-1"></i> Télécharger PDF
                            </a>
                        @endif
                    </div>

                    @foreach ($roi->items as $item)
                        <div class="row g-4 align-items-start mb-4 pb-4 border-bottom">
                            <!-- Vidéo (gauche) -->
                            <div class="col-12 col-lg-6">
                                @if ($item->vimeo)
                                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                                        <iframe
                                            src="https://player.vimeo.com/video/{{ $item->vimeo }}"
                                            allow="autoplay; fullscreen; picture-in-picture"
                                            allowfullscreen
                                            class="rounded">
                                        </iframe>
                                    </div>
                                @else
                                    <div class="ratio ratio-16x9 rounded bg-light d-flex align-items-center justify-content-center shadow-sm">
                                        <span class="text-muted"><i class="fa fa-video fa-2x"></i></span>
                                    </div>
                                @endif
                            </div>

                            <!-- Texte (droite) -->
                            <div class="col-12 col-lg-6">
                                <div class="bg-light rounded p-4 h-100">
                                    {!! $item->text !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="text-center text-muted py-5">
                    <i class="fa fa-file-alt fa-3x mb-3 d-block"></i>
                    Aucun contenu disponible pour le moment.
                </div>
            @endforelse
        </div>
    </main>
</x-app-layout>
