@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <!--FIN MENU-->

    <!--APARTADO DE LA IMAGEN-->
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4 text-center mb-5">
            <h2 class="col-12 tm-text-primary">{{$discusionId->titulo}}</h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset($discusionId->imagenDePortada ? 'storage/images/'.$discusionId->imagenDePortada : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
            </div>
           <br>
            <!--FIN APARTADO DE LA IMAGEN-->
            <!--APARTADO DE LA PUBLICACION-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                <div class="tm-bg-gray tm-video-details text-center mt-5">
                    <h5 class="mb-5">
                        {{$discusionId->texto}}
                    </h5>
                </div>
            </div>
<hr>

            @livewire('chat-form', ['idDisc' => $discusionId->id])


        </div>
        <!-- FIN APARTADO DE LA PUBLICACION-->
        <!--OTRAS PUBLICACIONES-->
        <hr>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Otras Publicaciones
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach($discusionesRelacionadas as $pub)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($pub->imagenDePortada ? 'storage/images/'.$pub->imagenDePortada : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$pub->titulo}}</h2>
                            <a href="{{route('pagDiscusion', $pub->id)}}">Ver Mas</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{$pub->created_at->format('d-m-Y')}}</span>
                        <span><a href="{{route('stalker',$pub->id_usuario)}}">{{$pub->usuario->nombre}}</a></span>
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
            @foreach($discusiones as $pubs)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($pubs->imagen ? 'storage/images/'.$pubs->imagen : '/img/img-web/mejorAlbum.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$pubs->titulo}}</h2>
                            <a href="{{route('pagDiscusion', $pubs->id)}}">Ver Mas</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{$pubs->created_at->format('d-m-Y')}}</span>
                        <span><a href="{{route('stalker',$pubs->id_usuario)}}">{{$pubs->usuario->nombre}}</a></span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--FIN OTRAS PUBLICACIONES-->


    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection
