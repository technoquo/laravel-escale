<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ $attributes['title']  }}">
    <meta property="og:description" content="Service d\' accompagnement pour personnes sourdes ou malentendantes habitant en Région Bruxelloise et ses alentours">
    <meta property="og:url" content="{{ config('app.url') .'/'. $attributes['slug'] ?? 'https://www.escaleasbl.be' }}">
    <meta property="og:image" content="{{ config('app.url') }}/images/escale.png">
    <meta name="keywords" content="service, accompagnement, personnes sourdes ou malentendantes, autonomie, langue des signes, bruxelles, social, soutien, parentalité">
    <meta property="og:type" content="website">
    <!-- Favicon -->
    <link rel="icon" href="https://escaleasbl.be/wp-content/uploads/escale_icon.png" sizes="32x32" />


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <title>
        {{ $attributes['title'] . '- L\' Escale ASBL' ?? ' L\' Escale ASBL - Service d\' accompagnement pour personnes sourdes ou malentendantes' }}
    </title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EHHZHTFP8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5EHHZHTFP8');
    </script>


</head>

<body>
    @include('layouts.partials.header')




    {{ $slot }}


    <!-- Video Modal End -->


    @include('layouts.partials.footer')


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}?v={{ time() }}"></script>
    
    @yield('scripts')
</body>

</html>
