@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="/img/img-web/ADMIN.png">
    </div>
    <!--FIN MENU-->
    <div class="container tm-mt-60">
        <div class="row justify-content-center">
            <div class="col-md-offset-11 col-md-10 ">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Tabla de <span>Publicaciones</span></h4>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                                <div class="btn_group">
                                    <form action="{{ route('busquedaPub') }}" method="GET">
                                        <input type="text" class="form-control" placeholder="Buscar Publicacion"  name="q">
                                    </form>
                                    <button class="btn btn-default" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                    <button class="btn btn-default" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                    <button class="btn btn-default" title="Excel"><i class="fas fa-file-excel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary tm-btn-big" href="{{route('pagCrearPublicacion')}}">Crear Nueva Publicación</a>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Id Creador</th>
                                <th>Nombre</th>
                                <th>Id Artista</th>
                                <th>Nombre Artista</th>
                                <th>Fecha Creación</th>
                                <th>Fecha Modificación</th>
                                <th>.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($publicaciones as $publicacion)
                                <tr>
                                    <td>{{ $publicacion->id }}</td>
                                    <td><a href="{{route('pagPublicacion', $publicacion->id)}}">{{ $publicacion->nombre }}</a></td>
                                    <td>{{ $publicacion->id_usuario}}</td>
                                    <td>{{ $publicacion->usuario->nombre_usuario}}</td>
                                    <td>{{ $publicacion->artistas->id}}</td>
                                    <td>{{ $publicacion->artistas->nombre}}</td>
                                    <td>{{ $publicacion->created_at}}</td>
                                    <td>{{ $publicacion->updated_at}}</td>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="{{route('publicacionEditar',$publicacion->id)}}" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                            <li><a href="{{route('eliminarPub',$publicacion->id)}}" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-sm-6 col-xs-6">Mostrando <b>{{ $publicaciones->count() }}</b> de <b>{{ $publicaciones->total() }}</b> entradas</div>
                            <div class="col-sm-6 col-xs-6">
                                {{$publicaciones->withQueryString()->links('vendor.pagination.bootstrap-4')}}
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
