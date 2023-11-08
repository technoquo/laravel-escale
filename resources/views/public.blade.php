<x-app-layout>
    <!-- About Start -->
    <div class="container-xxl about my-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-nav-white rounded-top p-5 mt-lg-5 box">
                        <h1 class="display-6 mb-4 title">Notre Public</h1>
                        <h2 class="mb-4">Adultes sourds ou malentendants</h2>
                        <p>
                            L’Escale est un service d’accompagnement à Bruxelles qui
                            s’adresse exclusivement à des personnes sourdes ou
                            malentendantes.
                        </p>
                        <p>
                            Il s’agit de personnes adultes utilisant pour la majorité la
                            langue des signes comme unique mode de communication et ayant
                            développé un sentiment d’appartenance à la communauté sourde.
                        </p>
                        <h2 class="mb-4">Notre service s’adresse</h2>
                        <ul>
                            <li>
                                principalement à des personnes fragilisées par un retard
                                intellectuel ou des difficultés psychosociales importantes.
                            </li>
                            <li>
                                Des aides dans la vie quotidienne pour les personnes qui
                                veulent vivre dans leur propre logement.
                            </li>
                            <li>
                                à des personnes sourdes plus autonomes, demandeuses d’une aide
                                dans la réalisation d’un projet particulier ou dans un domaine
                                spécifique.
                            </li>
                        </ul>
                        <h2 class="mb-4">Notre service s’adresse :</h2>
                        <p>
                            L’Escale offre ses services uniquement aux personnes sourdes ou
                            malentendantes habitant sur le territoire de Bruxelles-Capitale
                            et de ses environs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

</x-app-layout>
