@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout')
@section('title',$id->nombre)
@section('content')
    <div class="container-fluid tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                {{$id->nombre}}
            </h2>
        </div>
        <form class="login100-form validate-form" method="post" action="{{route('miPerfilEditar', $id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img id="imagenPerfil" src='{{ asset($id->imagen ? 'storage/images/'.$id->imagen : '/img/img-web/A night at the opera - Queen.png') }}' class='img-fluid w-100' alt='Imagen del usuario'>
                                    <input id="inputImagen" type="file" class="form-control" name="imagen" style="display: none">
                                    <div class="mt-3">
                                        <h4>Cambiar Foto de Perfil</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">

                                    <span class="login100-form-title">
                                        <h2>Editar Perfil</h2>
                                    </span>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input class="form-control" type="text" name="nombre" value="{{ $id->nombre }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nombre Usuario</label>
                                        <input class="form-control" type="text" name="nombre_usuario" value="{{ $id->nombre_usuario }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo</label>
                                        <input class="form-control" type="text" name="correo" value="{{ $id->correo }}">
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripción</label>
                                    <input class="form-control" type="text" name="texto" value="{{ $id->texto }}">
                                </div>
                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn" name="btnRegistrarse">
                                            Editar Perfil
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    <script>
        document.getElementById('imagenPerfil').addEventListener('click', function() {
            document.getElementById('inputImagen').click();
        });
            var imagenPerfil = document.getElementById('imagenPerfil');

            imagenPerfil.addEventListener('mouseover', function() {
            imagenPerfil.style.opacity = 0.5;
        });

            imagenPerfil.addEventListener('mouseout', function() {
            imagenPerfil.style.opacity = 1;
        });

    </script>

@endsection
