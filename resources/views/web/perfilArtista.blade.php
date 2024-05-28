@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title',$artistaId->nombre)
@section('content')
    <div class="container-fluid tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                {{$artistaId->nombre}}
            </h2>
        </div>
        <div class="row tm-mb-74 tm-row-1640">
            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <img src="{{ asset($artistaId->imagenDePortada? 'storage/images/'.$artistaId->imagenDePortada : '/img/img-web/Evolve - Imagine Dragons.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <div class="tm-about-img-text">
                    <p class="mb-4">
                 {!! $artistaId->texto !!}
                    </p>
                    </div>
            </div>
        </div>
        <div class="row tm-mb-50">
            <div class="col-md-6 col-12">
                <div class="tm-about-2-col">
                    <h2 class="tm-text-primary mb-4">
                        Ultima Publicacion de {{$artistaId->nombre}}
                    </h2>
                    @foreach($publicaciones as $publicacion)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($publicacion->imagenDePortada ? 'storage/images/'.$publicacion->imagenDePortada : '/img/img-web/Evolve - Imagine Dragons.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$publicacion->nombre}}</h2>
                           <a href="{{route('pagPublicacion', $publicacion->id)}}">Ver Más</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{$publicacion->created_at->format('d-m-Y')}}</span>
                            <span>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($publicacion->valoracion >= $i)
                                        <i class="fas fa-star" style="color: {{$publicacion->color}}"></i>
                                    @elseif($publicacion->valoracion >= $i - 0.5)
                                        <i class="fas fa-star-half-alt" style="color: {{$publicacion->color}}"></i>
                                    @else
                                        <i class="far fa-star" style="color: {{$publicacion->color}}"></i>
                                    @endif
                                @endfor
                            </span>
                    </div>
                </div>
            @endforeach
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="tm-about-2-col">
                    <h2 class="tm-text-primary mb-4">
                       Te recomendamos
                    </h2>
                    @foreach($publicacionesRec as $pubRec)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($pubRec->imagenDePortada ? 'storage/images/'.$pubRec->imagenDePortada : '/img/img-web/Evolve - Imagine Dragons.png') }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$pubRec->nombre}}</h2>
                           <a href="{{route('pagPublicacion', $pubRec->id)}}">Ver Más</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{$pubRec->created_at->format('d-m-Y')}}</span>
                            <span>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($pubRec->valoracion >= $i)
                                        <i class="fas fa-star" style="color: {{$pubRec->color}}"></i>
                                    @elseif($pubRec->valoracion >= $i - 0.5)
                                        <i class="fas fa-star-half-alt" style="color: {{$pubRec->color}}"></i>
                                    @else
                                        <i class="far fa-star" style="color: {{$pubRec->color}}"></i>
                                    @endif
                                @endfor
                            </span>
                    </div>
                </div>
            @endforeach
                </div>
            </div>
        </div> <!-- row -->
        <div class="row tm-mb-50">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Todas las Publicaciones de {{$artistaId->nombre}}
            </h2>
        </div>
            <div class="row mb-3 tm-gallery">

            @foreach($publicacionesAleatorias as $pub)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset($pub->imagen ? 'storage/images/'.$pub->imagen : '/img/img-web/Evolve - Imagine Dragons.png') }}" alt="Image" class="img-fluid justify-content-center">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$pub->nombre}}</h2>
                           <a href="{{route('pagPublicacion', $pub->id)}}">Ver Más</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{$pub->created_at->format('d-m-Y')}}</span>
                            <span>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($pub->valoracion >= $i)
                                        <i class="fas fa-star" style="color: {{$pub->color}}"></i>
                                    @elseif($pub->valoracion >= $i - 0.5)
                                        <i class="fas fa-star-half-alt" style="color: {{$pub->color}}"></i>
                                    @else
                                        <i class="far fa-star" style="color: {{$pub->color}}"></i>
                                    @endif
                                @endfor
                            </span>
                    </div>
                </div>

            @endforeach

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
