<x-app-layout>
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="Admininistration">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                    <p class="fs-5 fw-medium text-primary">
                        Organe d' Admininistration
                    </p>
                </div>
                <div class="row g-4">
                    @foreach ($organes as $organe)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded overflow-hidden pb-4">
                                <img class="img-fluid mb-4" src="{{ asset('storage/' . $organe->image) }}"
                                    alt="{{ $organe->firstname . '  ' . $organe->lastname }}" />
                                <h5>{{ $organe->firstname . '  ' . $organe->lastname }}</h5>
                                <span class="text-primary">{{ $organe->position }}</span>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="Direction mt-5">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                    <p class="fs-5 fw-medium text-primary">Direction</p>
                </div>
                <div class="row justify-content-center">
                    @foreach ($directions as $direction)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded overflow-hidden pb-4">
                                <img class="img-fluid mb-4" src="{{ asset('storage/' . $direction->image) }}"
                                    alt="{{ $direction->firstname . '  ' . $direction->lastname }}" />
                                <h5>{{ $direction->firstname . '  ' . $direction->lastname }}</h5>
                                <span class="text-primary">{{ $direction->position }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="accompagnement mt-5">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                    <p class="fs-5 fw-medium text-primary">Accompagnateurs</p>
                </div>
                <div class="row g-4">
                    @foreach ($acompagnateurs as $acompagnateur)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded overflow-hidden pb-4">
                                <img class="img-fluid mb-4" src="{{ asset('storage/' . $acompagnateur->image) }}"
                                    alt="{{ $acompagnateur->firstname . '  ' . $acompagnateur->lastname }}" />
                                <h5>{{ $acompagnateur->firstname . '  ' . $acompagnateur->lastname }}</h5>
                                <span class="text-primary">{{ $acompagnateur->position }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="animatrice mt-5">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                    <p class="fs-5 fw-medium text-primary">
                        Animatrice / Accompagnatrice
                    </p>
                </div>
                <div class="row g-4">
                    @foreach ($animatrices as $animatrice)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded overflow-hidden pb-4">
                                <img class="img-fluid mb-4" src="{{ asset('storage/' . $animatrice->image) }}"
                                    alt="{{ $animatrice->firstname . '  ' . $animatrice->lastname }}" />
                                <h5>{{ $animatrice->firstname . '  ' . $animatrice->lastname }}</h5>
                                <span class="text-primary">{{ $animatrice->position }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

</x-app-layout>
