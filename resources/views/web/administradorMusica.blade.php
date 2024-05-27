@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="/img/img-web/ADMIN.png">
    </div>
    <!--FIN MENU-->
    <div class="container tm-mt-60">
        <!--Inicio tabla 1-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Tabla de <span>Musica</span></h4>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                                <div class="btn_group">
                                    <form action="{{ route('busquedaMusica') }}" method="GET">
                                    <input type="text" class="form-control" placeholder="Buscar Musica"  name="q">
                                    </form>
                                    <button class="btn btn-default" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                    <button class="btn btn-default" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                    <button class="btn btn-default" title="Excel"><i class="fas fa-file-excel"></i></button>
                                </div>
                            </div>
                            <div class="text-center mb-5">
                                <a href="{{route("pagCrearMusica")}}" class="btn btn-primary tm-btn-big">Crear Musica</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Id artista</th>
                                <th>Nombre Artista</th>
                                <th>Género</th>
                                <th>Fecha Creacion</th>
                                <th>Fecha Editado</th>
                                <th>.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($musica as $music)
                            <tr>

                                <td>{{$music->id}}</td>
                                <td>{{$music->nombreCan}}</td>
                                <td>{{$music->id_artistaCan}}</td>
                                <td>{{$music->artistas->nombre}}</td>
                                <td>{{$music->tipo}}</td>
                                <td>{{$music->created_at}}</td>
                                <td>{{$music->updated_at}}</td>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="{{route('eliminarMus',$music->id)}}" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </td>

                            </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-sm-6 col-xs-6">Mostrando <b>{{ $musica->count() }}</b> de <b>{{ $musica->total() }}</b> entradas</div>
                            <div class="col-sm-6 col-xs-6">
                                {{$musica->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        <!--Fin tabla 1-->



        <div class="col-md-6">
            <div class="panel ">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title">Tabla de <span>Artistas</span></h4>
                        </div>
                        <div class="col-sm-9 col-xs-12 text-right">
                            <div class="btn_group">
                                <form action="{{ route('busquedaMusica') }}" method="GET">
                                    <input type="text" class="form-control" placeholder="Buscar Artista"  name="q">
                                </form>
                                <button class="btn btn-default" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                <button class="btn btn-default" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                <button class="btn btn-default" title="Excel"><i class="fas fa-file-excel"></i></button>
                            </div>
                            <div class="text-center mb-5">
                                <a href="{{route("pagCrearArtista")}}" class="btn btn-primary tm-btn-big">Crear Artista</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Texto</th>
                            <th>Fecha Creacion</th>
                            <th>Fecha Editado</th>
                            <th>.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($artistas as $artista)
                            <tr>
                                <td>{{$artista->id}}</td>
                                <td>{{$artista->nombre}}</td>
                                <td>{{$artista->texto}}</td>
                                <td>{{$artista->created_at}}</td>
                                <td>{{$artista->updated_at}}</td>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="{{route('eliminarArt',$artista->id)}}" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-sm-6 col-xs-6">Mostrando <b>{{ $artistas->count() }}</b> de <b>{{ $artistas->total() }}</b> entradas</div>
                        <div class="col-sm-6 col-xs-6">
                            {{$artistas->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>
                </div>
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
