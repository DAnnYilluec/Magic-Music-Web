@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="/img/img-web/ADMIN.png">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Buscar" aria-label="Search" style="
    BACKGROUND-COLOR: LIGHTSTEELBLUE;
">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <!--FIN MENU-->
  <!--INICIO ARTISTAS-->
        <div class="container-fluid tm-container-content tm-mt-60">

            <div class="row  tm-gallery">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="/img/img-web/USUARIOS.png" alt="Image" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Usuarios</h2>
                                <a href="{{route('panelAdminUsu')}}">Ver Más</a>
                            </figcaption>
                        </figure>
                    </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="/img/img-web/PUB.png" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Publicaciones</h2>
                            <a href="{{route('panelAdminPublic')}}">Ver Más</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="/img/img-web/DISCUSIONES1.png" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Discusiones</h2>
                            <a href="{{route('panelAdminDiscu')}}">Ver Más</a>
                        </figcaption>
                    </figure>
                </div>
        </div>
            <div class="row tm-gallery justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="/img/img-web/ART.png" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Artistas y Musica</h2>
                            <a href="{{route('panelAdminMusica')}}">Ver Más</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
        <!--FIN admin-->

    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function resizeImages() {
            $('.img-fluid').each(function() {
                var imgSrc = $(this).attr('src');
                var baseName = imgSrc.substring(0, imgSrc.lastIndexOf('.'));
                var extension = imgSrc.substring(imgSrc.lastIndexOf('.'));

                if ($(window).width() <= 989) {
                    if (!baseName.endsWith('Responsive')) {
                        $(this).attr('src', baseName + 'Responsive' + extension);
                    }
                } else {
                    if (baseName.endsWith('Responsive')) {
                        $(this).attr('src', baseName.replace('Responsive', '') + extension);
                    }
                }
            });
        }

        $(window).on('load resize', resizeImages);
    </script>


@endsection
