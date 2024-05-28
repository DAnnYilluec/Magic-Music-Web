@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="/img/img-web/ControlZone2.jpg">
        <form class="d-flex tm-search-form" action="{{ route('busqueda') }}" method="GET">
            <input class="form-control tm-search-input" name="q" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success {{ $comprobar->esAdmin == 1 ? 'tm-search-btn-ad' : 'tm-search-btn' }}" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
<!--INICIO PUBLICACIONES-->
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Últimas publicaciones
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            <!--INICIO EJEMPLOS-->

            <!--FIN EJEMPLOS-->
            @foreach($publicaciones as $publicacion)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($publicacion->imagen ? 'storage/images/'.$publicacion->imagen : '/img/img-web/Evolve - Imagine Dragons.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$publicacion->nombre}}</h2>
                           <a href="{{route('pagPublicacion', $publicacion->id)}}">Ver Más</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{$publicacion->created_at->format('d-m-Y')}}</span>
                            <span> @for($i = 1; $i <= 5; $i++)
                                    @if($publicacion->valoracion >= $i)
                                        <i class="fas fa-star" style="color: {{$publicacion->color}}"></i>
                                    @elseif($publicacion->valoracion >= $i - 0.5)
                                        <i class="fas fa-star-half-alt " style="color: {{$publicacion->color}}"></i>
                                    @else
                                        <i class="far fa-star" style="color: {{$publicacion->color}}"></i>
                                    @endif
                                @endfor</span>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

        <!--FIN PUBLICACIONES-->
        <!--INICIO DEISCUSIONES-->
        <div class="container-fluid tm-container-content tm-mt-60">
            <div class="row mb-4">
                <h2 class="col-6 tm-text-primary">
                    Discusiones Top
                </h2>
            </div>
            <div class="row tm-mb-90 tm-gallery">
                @foreach($discusiones as $discusion)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="{{ asset($discusion->imagen ? 'storage/images/'.$discusion->imagen : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>{{$discusion->titulo}}</h2>
                                <a href="{{route('pagDiscusion', $discusion->id)}}">Ver Más</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{$discusion->created_at->format('d-m-Y')}}</span>
                            <span><a href="{{route('stalker',$discusion->id_usuario)}}">{{$discusion->usuario->nombre}}</a></span>
                        </div>
                    </div>
                @endforeach

        </div>
        </div>
            <!--COMIENZO ARTISTAS-->
            <div class="container-fluid tm-container-content tm-mt-60">
                <div class="row mb-4">
                    <h2 class="col-6 tm-text-primary">
                        Últimas Artistas Añadidos
                    </h2>
                </div>
                <div class="row tm-mb-90 tm-gallery">
                @foreach($artistas as $artista)
                     <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                         <figure class="effect-ming tm-video-item">
                             <img src="{{ asset($artista->imagen ? 'storage/images/'.$artista->imagen : '/img/img-web/TheBeatles portada.png') }}" alt="Image" class="img-fluid">
                             <figcaption class="d-flex align-items-center justify-content-center">
                                 <h2>{{$artista->nombre}}</h2>
                                 <a href="{{route('pagArtista', $artista->id)}}">Ver Más</a>
                             </figcaption>
                         </figure>
                         <div class="d-flex justify-content-between tm-text-gray">
                             <span class="tm-text-gray-light">{{$artista->created_at->format('d-m-Y')}}</span>
                             <span>{{$artista->nombre}}</span>
                         </div>
                     </div>
                @endforeach
            </div>
            </div>
            <!--FIN ARTISTAS-->


        <!--FIN DISCUSIONES-->


    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection()
