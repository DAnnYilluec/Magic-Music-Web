@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="/img/img-web/PUBLICACIONES.png">
        <form class="d-flex tm-search-form" action="{{ route('busqueda') }}" method="GET">
            <input class="form-control tm-search-input" name="q" type="search" placeholder="Buscar" aria-label="Search" style="
    BACKGROUND-COLOR: LIGHTSTEELBLUE;
">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <!--FIN MENU-->
<!--INICIO PUBLICACIONES-->
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-60">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col mx-auto">
                <h2 class="col-8 tm-text-primary">
                    Publicaciones
                </h2>
                {{$publicaciones->withQueryString()->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>

        <div class="row tm-mb-90 tm-gallery">
            @foreach($publicaciones as $publicacion)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($publicacion->imagen ? 'storage/images/'.$publicacion->imagen : '/img/img-web/Evolve - Imagine Dragons.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$publicacion->nombre}}</h2>
                            <a href="{{route('pagPublicacion', $publicacion->id)}}">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{$publicacion->created_at->format('d-m-Y')}}</span>
                        <span>{{$publicacion->artistas->nombre}}</span>
                    </div>
                </div>

            @endforeach
            </div>
        </div>
        <!--FIN PUBLICACIONES-->


    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection
