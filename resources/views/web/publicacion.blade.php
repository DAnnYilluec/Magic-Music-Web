@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <!--FIN MENU-->

    <!--APARTADO DE LA IMAGEN-->
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">{{$publicacionId->nombre}}</h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset($publicacionId->imagenDePortada ? 'storage/images/'.$publicacionId->imagenDePortada : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
            </div>
           <br>
            <!--FIN APARTADO DE LA IMAGEN-->
            <!--APARTADO DE LA PUBLICACION-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 tm-mt-60">
                <div class="d-flex justify-content-center align-items-center">
                    @for($i = 1; $i <= 5; $i++)
                        @if($publicacionId->valoracion >= $i)
                            <i class="fas fa-star estrella" style="color:{{$publicacionId->color}}"></i>
                        @elseif($publicacionId->valoracion >= $i - 0.5)
                            <i class="fas fa-star-half-alt estrella" style="color:{{$publicacionId->color}}"></i>
                        @else
                            <i class="far fa-star estrella" style="color:{{$publicacionId->color}}"></i>
                        @endif
                    @endfor
                </div>
                <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3" id="artista">{{$publicacionId->artistas->nombre}}</h3>
                        {!!$publicacionId->texto!!}
                    </div>

                </div>
                @foreach($musica as $music)
    <p class="d-inline-flex gap-1">
        <a class="btn btn-primary w-100 cancion botoncito" data-bs-toggle="collapse" href="#collapseExample{{$loop->index}}" role="button"
            aria-expanded="false" aria-controls="collapseExample{{$loop->index}}" style="background-color:{{$publicacionId->color}}; border-color:{{$publicacionId->color}};">
            {{$music->nombreCan}}
        </a>
    </p>
    <div class="container">
        <div class="row">
            <!-- Div para la canción de Spotify y la descripción -->
            <div class="col-md-6">
                <div class="collapse w-100 mb-5" id="collapseExample{{$loop->index}}">
                    <iframe style="border-radius:12px" src="{{$music->link}}" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    <!-- Div para la descripción de la canción -->
                    <div id="descripcion">
                        {!!$music->textoCan!!}
                    </div>
                </div>
            </div>
            <!-- Div para la letra de la canción -->
            <div class="col-md-6">
                <div class="collapse w-100 mb-5" id="collapseLetra{{$loop->index}}">
                    <div class="resultado" style="background-color:{{$publicacionId->color}}; color: white;"></div>
                </div>
            </div>
        </div>
    </div>
@endforeach


        </div>
        <!-- FIN APARTADO DE LA PUBLICACION-->
        <!--OTRAS PUBLICACIONES-->
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Otras Publicaciones de <a class="a2" href="{{route("pagArtista",$publicacionId->id_artista)}}">{{$publicacionId->artistas->nombre}}</a>
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach($publicacionesRelacionadas as $pub)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset($pub->imagenDePortada ? 'storage/images/'.$pub->imagenDePortada : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{$pub->nombre}}</h2>
                        <a href="{{route('pagPublicacion', $pub->id)}}">Ver Mas</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">{{$pub->created_at->format('d-m-Y')}}</span>
                    <span> @for($i = 1; $i <= 5; $i++)
                            @if($pub->valoracion >= $i)
                                <i class="fas fa-star" style="color:{{$pub->color}}"></i>
                            @elseif($pub->valoracion >= $i - 0.5)
                                <i class="fas fa-star-half-alt" style="color:{{$pub->color}}"></i>
                            @else
                                <i class="far fa-star" style="color: {{$pub->color}}"></i>
                            @endif
                        @endfor</span>
                </div>
            </div>
            @endforeach
        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Otras Publicaciones
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach($publicaciones as $pubs)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($pubs->imagen ? 'storage/images/'.$pubs->imagen : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$pubs->nombre}}</h2>
                            <a href="{{route('pagPublicacion', $pubs->id)}}">Ver Mas</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{$pubs->created_at->format('d-m-Y')}}</span>
                        <span> @for($i = 1; $i <= 5; $i++)
                                @if($pubs->valoracion >= $i)
                                    <i class="fas fa-star"></i>
                                @elseif($pubs->valoracion >= $i - 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor</span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!--FIN OTRAS PUBLICACIONES-->

    <script src="/js/js-web/app.js" type="module"></script>
    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection
