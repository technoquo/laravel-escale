<x-app-layout>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container box">
            {{-- <div class="text-center mx-auto wow fadeInUp mb-5" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="fs-5 fw-medium text-primary ">Contactez-nous</p>
               
            </div> --}}
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                   
                    <p class="mb-4">
                        {{ $contact->description_contact }}
                    </p>
                    <h3 class="mb-4">Accès par tram et bus :</h3>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square  rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bus-stop" width="76" height="76" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 3m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                <path d="M18 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M10 5h7c2.761 0 5 3.134 5 7v5h-2" />
                                <path d="M16 17h-8" />
                                <path d="M16 5l1.5 7h4.5" />
                                <path d="M9.5 10h7.5" />
                                <path d="M12 5v5" />
                                <path d="M5 9v11" />
                              </svg>
                        </div>
                        <div class="ms-3">                           
                            <div class="d-flex">
                             
                                @foreach ($buses as $bus )
                                <div class="rounded-circle py-1 px-2 me-1 text-white text-center" style="background-color: {{ $bus->color }}">  {{ $bus->number }} </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square  rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-train" width="76" height="76" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M21 13c0 -3.87 -3.37 -7 -10 -7h-8" />
                                <path d="M3 15h16a2 2 0 0 0 2 -2" />
                                <path d="M3 6v5h17.5" />
                                <path d="M3 10l0 4" />
                                <path d="M8 11l0 -5" />
                                <path d="M13 11l0 -4.5" />
                                <path d="M3 19l18 0" />
                              </svg>
                        </div>
                        <div class="ms-3">                            
                            <div class="d-flex">
                             
                                @foreach ($trams as $tram )
                                <div class="rounded-circle py-1 px-2 me-1 text-white text-center" style="background-color: {{ $tram->color }}">  {{ $tram->number }} </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    <div>
                        <img class="img-fluid" src="{{ asset('storage/' . $contact->image) }}" alt="{{ $contact->alt }}" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h3 class="mb-4">Détails du contact</h3>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Notre bureau</h6>
                            <span>{{ $contact->bureau }}</span>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-user text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Direction</h6>
                            <span>{{ $contact->nom_contact }}</span>
                        </div>
                    </div>
                   
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-mobile-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>GSM</h6>
                            <span><a href="https://api.whatsapp.com/send?phone=472172609"
                                    target="_blank">{{ $contact->gsm }}</a></span>
                        </div>
                    </div>
                    <div class="d-flex border-bottom-0 pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Envoyez-nous un e-mail</h6>
                            <span>direction@escaleasbl.be</span>
                        </div>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d212.5552029587243!2d{{ $longitude }}!3d{{ $latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c3596473f3d5%3A0x74be4477403e5a1c!2sEscale%20(l&#39;)%20asbl!5e0!3m2!1ses-419!2sbe!4v1710250000913!5m2!1ses-419!2sbe"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-app-layout>
