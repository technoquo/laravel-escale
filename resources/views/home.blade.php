<x-app-layout>

    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="/storage/{{ $slider->image }}" title="{{ $slider->title }}" alt="{{ $slider->title }}" />
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-lg-7 text-start">
                                        <p class="fs-4 text-white animated slideInRight">{{ $slider->title }}</p>
                                        <h1 class="display-1 text-white mb-4 animated slideInRight">
                                            {{ $slider->description }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Notre actualité -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

                <h1 class="display-5 mb-5 title">Nos actualités</h1>
            </div>

            <div class="row g-4">

                @forelse ($posts as $post)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="nouvelle-item position-relative">
                            <a class="text-primary fw-medium" href="{{ route('post.index', $post->slug) }}">
                                <div class="service-text rounded p-5">
                                    @if ($post->image)
                                        <div class="mx-auto mb-4 photo">
                                            <img class="img-fluid" src="/storage/{{ $post->image }}"
                                                title="{{ $post->title }}" alt="{{ $post->title }}">
                                        </div>
                                    @elseif ($post->youtube)
                                        <img class="img-fluid"
                                            src="https://img.youtube.com/vi/{{ $post->youtube }}/mqdefault.jpg"
                                            title="{{ $post->title }}" alt="{{ $post->title }}">
                                    @elseif ($post->vimeo)
                                        <img class="img-fluid" src="https://vumbnail.com/{{ $post->vimeo }}.jpg"
                                            title="{{ $post->title }}" alt="{{ $post->title }}">
                                    @endif
                                    <h5 class="mb-3">{{ $post->title }}</h4>
                                        <p class="mb-0">
                                            {{ substr($post->description, 0, 100) . '...' }}
                                        </p>
                                </div>
                                <div class="service-btn rounded-0 rounded-bottom">
                                    {{ date('d-m-Y', strtotime($post->date_published)) }} - En savoir plus<i
                                        class="bi bi-chevron-double-right ms-2"></i>
                                </div>
                            </a>
                        </div>
                    </div>



                @empty
                    dffds
                @endforelse


                <div class="mt-5 d-flex justify-content-center"><a href="{{ route('actualites') }}"
                        class="btn btn-primary rounded-pill py-2 px-3 text-white">Et plus encore...</a></div>

            </div>


        </div>
    </div>
    <!-- End Notre actualité -->

    <!-- Project Start -->
    <div class="container-xxl pt-5">
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Avec le soutien de</p>
                {{-- <h1 class="display-5 mb-5">We've Done Lot's of Awesome Projects</h1> --}}
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($sponsors as $sponsor)
                    <div class="project-item mb-5">
                        <div class="position-relative">
                            <a href="{{ $sponsor->url }}" target="_blank">
                                <img class="img-fluid" width="50" height="50"
                                    src="/storage/{{ $sponsor->image }}" alt="{{ $sponsor->alt }}">
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
    <!-- Project End -->

</x-app-layout>
