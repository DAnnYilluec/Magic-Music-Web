@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <!--FIN MENU-->

    <!--APARTADO DE LA IMAGEN-->

    <div class="container-fluid tm-container-content tm-mt-60">
        <h2>Editar Artista</h2>
        <form action="{{route('editarArtista',$id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="row mb-4">
            <input class="col-12 tm-text-primary" placeholder="Nombre del Grupo o Cantante" name="nombre" value="{{$id->nombre}}">
        </div>
            <div class="row tm-mb-90">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <h3>Imagen de portada&nbsp;</h3>
                    <img id="imagenPerfil" src='{{ asset($id->imagenDePortada ? 'storage/images/'.$id->imagenDePortada : '/img/img-web/INSERTAR FOTO.png') }}' class='img-fluid w-50' alt='Imagen del usuario'>
                    <input id="inputImagen" type="file" class="form-control" name="imagenDePortada" style="display: none">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <img id="imagenPortada" src='{{ asset($id->imagen ? 'storage/images/'.$id->imagen : '/img/img-web/INSERTAR FOTO.png') }}' class='img-fluid w-50' alt='Imagen del usuario'>
                    <input id="inputImagen2" type="file" class="form-control" name="imagen" style="display: none">
                    <h3>&nbsp;Imagen</h3>
                </div>

            <br>
            <!--FIN APARTADO DE LA IMAGEN-->
            <!--APARTADO DE LA PUBLICACION-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 tm-mt-60">
                    <textarea name="texto" type="text" placeholder="Descripcion" class="w-100 h-75">{{$id->texto}}</textarea>
                </div>

            </div>

    <div class="text-center mb-5">
        <button href="" class="btn btn-primary tm-btn-big">Subir</button>
    </div>
        </form>
    </div>



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

        document.getElementById('imagenPortada').addEventListener('click', function() {
            document.getElementById('inputImagen2').click();
        });
        var imagenPerfil2 = document.getElementById('imagenPortada');

        imagenPerfil2.addEventListener('mouseover', function() {
            imagenPerfil2.style.opacity = 0.5;
        });

        imagenPerfil2.addEventListener('mouseout', function() {
            imagenPerfil2.style.opacity = 1;
        });

    </script>
@endsection
