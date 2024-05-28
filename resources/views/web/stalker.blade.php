@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout')
@section('title',$id->nombre)
@section('content')
    <div class="container-fluid tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                {{$id->nombre}}
            </h2>
        </div>
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src='{{ asset($id->imagen ? 'storage/images/'.$id->imagen : '/img/img-web/A night at the opera - Queen.png') }}' class='img-fluid w-100' alt='Imagen del usuario'>
                                    <div class="mt-3">
                                        <h4>{{$id->nombre_usuario}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9 text-secondary">
                                        {!!$id->texto!!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nombre</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$id->nombre}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Usuario</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$id->nombre_usuario}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$id->correo}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Se unio el</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$id->created_at}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Discusiones creadas</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$numeroDeDiscusiones}}
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

    </div>

        <!--Mis discusiones-->
    <div class="container-fluid tm-container-content tm-mt-60">
            <div class="row mb-4">
                <h2 class="col-6 tm-text-primary">
                    Discusiones de {{$id->nombre}}
                </h2>
            </div>
            <div class="row mb-3 tm-gallery">
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
                            <span>{{$discusion->usuario->nombre}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

    </div>
    </div>

    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection
