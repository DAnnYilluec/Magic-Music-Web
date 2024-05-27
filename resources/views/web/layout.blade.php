<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @livewireStyles
    @livewireScripts
    <link rel="icon" type="image/png" href="/img/img-login/ControlHead icon.png"/>
    <link rel="stylesheet" href="/CSS/css-web/bootstrap.min.css">
    <link rel="stylesheet" href="/CSS/css-web/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/CSS/css-web/templatemo-style.css">
    <link rel="stylesheet" href="/CSS/css-web/letras.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<!-- Page Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<!--INICIO MENU-->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand titulo" href="{{ route('inicio') }}">
            MAGICAL MUSIC WEB
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('pagPublicaciones') }}">Publicaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('pagDiscusiones') }}">Discusiones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('pagArtistas') }}">Artistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('miPerfil', ['id' => Auth::id()]) }}">Mi Perfil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--FIN MENU-->

@yield('content')
<footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
    <div class="container-fluid tm-container-small">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4 tm-footer-title">Contactanos</h3>
                <p>Correo: dannyzap@mmt.com<br>Teléfono: 640194312</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4 tm-footer-title">¡Visita nuestras redes sociales!</h3>
                <ul class="tm-footer-links pl-0">
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Our Company</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                    <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                    <li class="mb-2"><a href="https://tiktok.com"><i class="fab fa-tiktok"></i></a></li>
                </ul>
                <a href="#" class="tm-text-gray text-right d-block mb-2">Terminos de Uso</a>
                <a href="#" class="tm-text-gray text-right d-block">Politica de Privacidad</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                Copyright 2024 DannyZapataCompany. Todos los derechos reservados
            </div>
            <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                Colegio Montessori Zaragoza
            </div>
        </div>
    </div>
</footer>
</body>
</html>
