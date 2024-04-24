<x-app-layout :title="$post->title" :description="$post->description" :slug="$post->slug">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h1 class="display-5 mb-4 title">{{ $post->title }}</h1>
                    <p>
                    </p>
                    @if ($post->share_facebook || $post->whatsapp)
                        <div class="d-flex share-social">
                            @if ($post->share_facebook)
                                <a onclick="shareOnFacebook()"><i class="fab fa-facebook facebook-icon"></i></a>
                            @endif
                            @if ($post->whatsapp)
                                <a onclick="shareOnWhatsApp()"><i class="fab fa-whatsapp"></i></a>
                            @endif
                        </div>
                    @endif
                    {!! str_replace('<p>', '<p class="mb-4 box">', str($post->description)->markdown()) !!}
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    @if ($post->image)
                        <div class="row g-3">
                            <img src="{{ asset('storage/' . $post->image) }}" title="{{ $post->title }}"
                                alt="{{ $post->title }}">
                        </div>
                    @endif
                    @if ($post->youtube)
                        <div class="ratio ratio-16x9 mt-5">
                            <iframe src="https://www.youtube.com/embed/{{ $post->youtube }}"></iframe>
                        </div>
                    @endif
                    @if ($post->vimeo)
                        <div class="ratio ratio-16x9 mt-5">
                            <iframe src="https://player.vimeo.com/video/{{ $post->vimeo }}"
                                allow="autoplay; fullscreen; picture-in-picture" title="{{ $post->name }}"></iframe>
                        </div>
                    @endif
                    @if ($post->link)
                        <div class="row g-3 mt-5 text-center">
                            <a href="{{ $post->link }}" target="_blank">Registre</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
