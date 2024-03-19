    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex">
        <div class="container py-3">
            <div class="d-flex align-items-center">
                <a href="/">
                    <img src="{{ asset('images/logo-escale.png') }}" />
                </a>

                @php
                    $contact = DB::table('contacts')->first();

                @endphp


                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>{{ $contact->bureau }}</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3">{{ $contact->tel }}</i>
                    </small>
                    <small class="ms-4"><i class="fab fa-whatsapp me-3"></i> <a
                            href="https://api.whatsapp.com/send?phone=472172609" target="_blank"
                            class="text-white">{{ $contact->gsm }}</a></small>

                    <div class="ms-3 d-flex">
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                            href="{{ $contact->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                            href="{{ $contact->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                            href="mailto:{{ $contact->email }}"><i class="fa fa-envelope"></i></a>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Navbar Start -->
    <div class="container-fluid bg-nav-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-nav-white navbar-light p-lg-0">
                <a href="/" class="navbar-brand d-lg-none">
                    <img src="{{ asset('images/logo-escale.png') }}" />
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="64"
                        height="64" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="18" x2="20" y2="18"></line>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="/"
                            class="escale actualit nav-item nav-link  {{ request()->is('/') ? 'active' : '' }}">Actualités</a>
                        <div class="nav-item dropdown">
                            <a href="#"
                                class="escale accompagnement nav-link dropdown-toggle  {{ request()->is('accompagnement') ? 'active' : '' }}"
                                data-bs-toggle="dropdown">Accompagnement</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="{{ route('accompagnement', 'notre-asbl') }}" class="dropdown-item">Notre
                                    ASBL</a>
                                <a href="{{ route('accompagnement', 'notre-mission') }}" class="dropdown-item">Notre
                                    Mission</a>
                                <a href="{{ route('accompagnement', 'notre-public') }}" class="dropdown-item">Notre
                                    Public</a>
                                <a href="{{ route('type', 'accompagnement-individuel') }}"
                                    class="dropdown-item">Accompagnement
                                    Individuel</a>
                                <a href="{{ route('type', 'accompagnement-collectif') }}"
                                    class="dropdown-item">Accompagnement
                                    Collectif</a>
                                <a href="{{ route('equipe') }}" class="dropdown-item">Equipe</a>
                                <a href="{{ route('organigramme') }}" class="dropdown-item">Organigramme</a>
                                <a href="{{ route('document') }}" class="dropdown-item">Documents</a>
                            </div>
                        </div>
                        <a href="{{ route('years') }}"
                            class="escale photos nav-item nav-link {{ request()->is('années') ? 'active' : '' }}">Photos</a>
                        <a href="{{ route('historique') }}" class="escale historique nav-item nav-link">Historique</a>
                        <a href="{{ route('contact') }}" class="escale contact nav-item nav-link">Contact</a>

                    </div>
                    <div class="showtip" id="tooltip"></div>
                    <div class="ms-auto d-none d-lg-block">
                        <div class="switch">
                            <nav>
                                <div class="theme-switch-wrapper">
                                    <label class="theme-switch" for="checkbox">
                                        <input type="checkbox" id="checkbox" />
                                        <div class="slider round"></div>
                                    </label>
                                    <img class="ico" id="light" src="{{ asset('images/modo-de-luz.png') }}"
                                        alt="light">
                                    <img class="ico" id="night" src="{{ asset('images/modo-nocturno.png') }}"
                                        alt="night">
                                </div>

                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
