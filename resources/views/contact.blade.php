<x-app-layout>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container box">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="fs-5 fw-medium text-primary">Contactez-nous</p>
                <h1 class="display-5 mb-5 box">
                    Si vous avez des questions, veuillez nous contacter
                </h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4 box">{{ $contact->nom_contact }}</h3>
                    <p class="mb-4">
                        {{ $contact->description_contact }}
                    </p>
                    <h3 class="mb-4">Accès par tram et bus :</h3>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-solid fa-bus text-white"></i>
                        </div>
                        <div class="ms-3">
                            <div>
                                <span>{{ $contact->acces_bus1 }}</span>
                            </div>
                            <div>
                                <span>{{ $contact->acces_bus2 }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-solid fa-train-tram text-white"></i>
                        </div>
                        <div class="ms-3">
                            <div>
                                <span>{{ $contact->acces_tram1 }}</span>
                            </div>
                            <div>
                                <span>{{ $contact->acces_tram2 }}</span>
                            </div>
                        </div>
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
                    <iframe class="w-100 rounded"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.9128492311693!2d{{ $longitude }}!3d{{ $latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c35c43a2ed93%3A0x1aed03cd4076cb2e!2sRue%20Jacques%20Jansen%2017%2C%201030%20Schaerbeek!5e0!3m2!1ses-419!2sbe!4v1686820286488!5m2!1ses-419!2sbe"
                        frameborder="0" style="min-height: 300px; border: 0" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-app-layout>
