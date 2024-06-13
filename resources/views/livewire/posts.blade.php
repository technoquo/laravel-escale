<div class="container-sm">
    @foreach ($posts as $post)
        <div class="card mb-3" style="max-width: 540px;">
            <a href="{{ route('post.index', $post->slug) }}">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if ($post->image)
                            <img class="img-fluid" src="{{ $post->image }}" title="{{ $post->title }}"
                                alt="{{ $post->title }}">
                        @elseif ($post->youtube)
                            <img class="img-fluid" src="https://img.youtube.com/vi/{{ $post->youtube }}/mqdefault.jpg"
                                title="{{ $post->title }}" alt="{{ $post->title }}">
                        @elseif ($post->vimeo)
                            <img class="img-fluid" src="https://vumbnail.com/{{ $post->vimeo }}.jpg"
                                title="{{ $post->title }}" alt="{{ $post->title }}">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $post->title }}</h5>
                            <p class="card-text"> {{ substr($post->description, 0, 100) . '...' }}</p>
                            <p class="card-text"><small
                                    class="text-body-secondary">{{ is_string($post->date_published) ? \Carbon\Carbon::parse($post->date_published)->format('d-m-Y') : $post->date_published->format('d-m-Y') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    {{ $posts->links('livewire.custom-pagination-links') }}
</div>
