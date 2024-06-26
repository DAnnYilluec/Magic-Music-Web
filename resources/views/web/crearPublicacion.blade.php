@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <!--FIN MENU-->

    <!--APARTADO DE LA IMAGEN-->

    <div class="container-fluid tm-container-content tm-mt-60">
    <h2>Crear Publicacion</h2>
    <form action="{{route('crearPublicacion')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row mb-4">
        <input class="col-12 tm-text-primary" placeholder="Titulo de la publicación" name="nombre">
      </div>
      <div class="row tm-mb-90">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
          <h3>Imagen Grande&nbsp;</h3>
          <img id="imagenPerfil" src='/img/img-web/INSERTAR FOTO.png' class='img-fluid w-50' alt='Imagen del usuario'>
          <input id="inputImagen" type="file" class="form-control" name="imagenDePortada" style="display: none">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
          <img id="imagenPortada" src='/img/img-web/INSERTAR FOTO.png' class='img-fluid w-50' alt='Imagen del usuario'>
          <input id="inputImagen2" type="file" class="form-control" name="imagen" style="display: none">
          <h3>&nbsp; Imagen Pequeña</h3>
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 tm-mt-60">
        <textarea name="texto" type="text" placeholder="Descripcion" class="w-100"></textarea>
      </div>
        <div class="row">
          <div class="col-md-6 mb-4">
            <h3 class="tm-text-gray-dark mb-3">Artista</h3>
            <select name="id_artista" class="w-100">
              @foreach ($artistas as $artista)
                <option value="{{$artista->id }}">{{ $artista->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-4">
            <h3 class="tm-text-gray-dark mb-3">Valoración</h3>
            <select name="valoracion" class="w-100">
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
              <option value="4.5">4.5</option>
              <option value="5">5</option>
            </select>
          </div>
          <h3 class="tm-text-gray-dark mb-3">Color</h3>
          <input type="color" id="color" name="color" value="#000000"><br>
        </div>
      </div>
      <div id="dynamicInput" class="container-fluid tm-container-content tm-mt-60">
      </div>
      <div class="text-center mb-5">
        <button href="#" class="btn btn-primary tm-btn-big">Subir</button>
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
