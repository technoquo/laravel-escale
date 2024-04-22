    <!-- Footer Start -->
    @php
        $contact = DB::table('contacts')->first();

    @endphp
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Nos bureaux</h4>
                    <p class="d-flex justify-content-center" style="width:220px">
                        <i class="fa fa-map-marker-alt me-3" id="line-map"></i>{{ $contact->bureau }}</>
                    </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $contact->tel }}</p>
                    <p class="mb-2">
                        <i class="fab fa-whatsapp me-3"></i> <a href="https://api.whatsapp.com/send?phone=472172609"
                            target="_blank"  style="color:#A7ADA6">{{ $contact->gsm }}</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Lien rapide</h4>
                    <a class="btn btn-link" href="{{ route('contact') }}">Contactez-nous</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Horaire</h4>
                    <p class="mb-1">Lundi - Vendredi</p>
                    <div>{{ $contact->horaire }}</div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Don</h4>
                    {!! str_replace('<p>', '<p class="mb-4">', str($contact->don)->markdown()) !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    {{ date('Y') }} &copy; <a class="fw-medium text-light" href="/">L'escale ASBL</a>, Tous droits réservés.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    WebMaster <a class="fw-medium text-light" target="_blank"
                        href="https://codigoaccesibleconleo.com">Leonel Lopez</a>

                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="/" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
