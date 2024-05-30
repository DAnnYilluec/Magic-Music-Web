@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <!--FIN MENU-->


    <div class="container-fluid tm-container-content tm-mt-60">
        <h2>Crear Musica</h2>
        <form action="{{route('editarMusica',$id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                      <div id="dynamicInput" class="container-fluid tm-container-content tm-mt-60">
      </div>
            <div class="row tm-mb-90">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="tm-text-gray-dark mb-3">Titulo</h3>
                    <input class="w-100" placeholder="Titulo de la Cancion" name="nombreCan" value="{{$id->nombreCan}}">
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="tm-text-gray-dark mb-3">Link</h3>
                    <input name="link" type="text" placeholder="Link" class="w-100" value="{{$id->link}}">
                    <div class="row mt-3">
                        <div class="col-md-6 mb-4">
                            <h3 class="tm-text-gray-dark mb-3">Artista</h3>
                            <select name="id_artistaCan" class="w-100">
                                @foreach ($artistas as $artista)
                                    <option value="{{$artista->id}}" {{ $artista->id == $id->id_artistaCan ? 'selected' : '' }}>{{ $artista->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h3 class="tm-text-gray-dark mb-3">Publicacion</h3>
                            <select name="id_publicacion" class="w-100">
                                @foreach ($publicaciones as $publicacion)
                                    <option value="{{$publicacion->id }}"{{ $publicacion->nombre== $id->id_publicacion ? 'selected' : '' }}>{{ $publicacion->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h3 class="tm-text-gray-dark mb-3">Descripcion</h3>
                            <textarea placeholder="Descripcion" class="w-100 h-75" type="text" name="textoCan">{{$id->textoCan}}</textarea>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h3 class="tm-text-gray-dark mb-3">Tipo</h3>
                            <select name="tipo" class="w-100">
                                <option value="Rock">Rock</option>
                                <option value="Jazz">Jazz</option>
                                <option value="Hip-hop">Hip-hop</option>
                                <option value="Electrónica">Electrónica</option>
                                <option value="Reggae">Reggae</option>
                                <option value="Clásica">Clásica</option>
                                <option value="Blues">Blues</option>
                                <option value="R&B">R&B</option>
                                <option value="Country">Country</option>
                                <option value="Folk">Folk</option>
                                <option value="Pop">Pop</option>
                                <option value="Salsa">Salsa</option>
                                <option value="Reggaetón">Reggaetón</option>
                                <option value="Metal">Metal</option>
                                <option value="Indie">Indie</option>
                                <option value="Funk">Funk</option>
                                <option value="Soul">Soul</option>
                                <option value="Disco">Disco</option>
                                <option value="Punk">Punk</option>
                                <option value="Gospel">Gospel</option>
                                <option value="Cumbia">Cumbia</option>
                                <option value="Rap">Rap</option>
                                <option value="Trap">Trap</option>
                                <option value="Techno">Techno</option>
                                <option value="Ska">Ska</option>
                                <option value="House">House</option>
                                <option value="Dubstep">Dubstep</option>
                                <option value="Flamenco">Flamenco</option>
                                <option value="Clásico">Clásico</option>
                                <option value="Bachata">Bachata</option>
                                <option value="Merengue">Merengue</option>
                                <option value="Tango">Tango</option>
                                <option value="Fusión">Fusión</option>
                                <option value="Chill-out">Chill-out</option>
                                <option value="Rumba">Rumba</option>
                                <option value="Grunge">Grunge</option>
                                <option value="Experimental">Experimental</option>
                                <option value="Samba">Samba</option>
                                <option value="New Age">New Age</option>
                                <option value="Electroswing">Electroswing</option>
                                <option value="Hardcore">Hardcore</option>
                                <option value="Drum and Bass">Drum and Bass</option>
                                <option value="Ambient">Ambient</option>
                                <option value="Bluegrass">Bluegrass</option>
                                <option value="Industrial">Industrial</option>
                                <option value="Psychedelic">Psychedelic</option>
                                <option value="Dub">Dub</option>
                                <option value="Trap Latino">Trap Latino</option>
                                <option value="Synthpop">Synthpop</option>
                            </select>
                        </div>
                    </div>
                </div>
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


