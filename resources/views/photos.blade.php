<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

                <h1 class="display-5 mb-5 title">Années</h1>
            </div>
            <div class="row g-4">
                @foreach ($years as $year)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="nouvelle-item position-relative h-100">
                            <a class="text-primary fw-medium" href="{{ route('gallery.index', $year->title) }}">
                                <div class="service-text rounded p-5">

                                    <div class="mx-auto mb-4 year">
                                        <img class="img-fluid" src="{{ $year->image }}" alt="{{ $year->alt }}">
                                    </div>
                                    <h5 class="mb-3">{{ $year->title }}</h4>

                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
</x-app-layout>
