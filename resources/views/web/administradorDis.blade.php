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
                                <h4 class="title">Tabla de <span>Discusiones</span></h4>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                                <div class="btn_group">
                                    <form action="{{ route('busquedaDis') }}" method="GET">
                                    <input type="text" class="form-control" placeholder="Buscar Discusion"  name="q">
                                    </form>
                                    <button class="btn btn-default" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                    <button class="btn btn-default" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                    <button class="btn btn-default" title="Excel"><i class="fas fa-file-excel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Id Usuario</th>
                                <th>Usuario</th>
                                <th>Texto</th>
                                <th>Fecha</th>
                                <th>.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discusiones as $discusion)
                            <tr>
                                <td>{{ $discusion->id }}</td>
                                <td>{{ $discusion->titulo }}</td>
                                <td>{{ $discusion->id_usuario}}</td>
                                <td>{{ $discusion->usuario->nombre_usuario}}</td>
                                <td>{{ $discusion->texto }}</td>
                                <td>{{ $discusion->created_at }}</td>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="{{route('discusionEditar',$discusion->id)}}" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="{{route('eliminarDis',$discusion->id)}}" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-sm-6 col-xs-6">Mostrando <b>{{ $discusiones->count() }}</b> de <b>{{ $discusiones->total() }}</b> entradas</div>
                            <div class="col-sm-6 col-xs-6">
                                {{$discusiones->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            <!--
            <div class="row tm-mb-90 tm-gallery">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="/img/img-web/USUARIOS.png" alt="Image" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Usuarios</h2>
                                <a href="">Ver Más</a>
                            </figcaption>
                        </figure>
                    </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="/img/img-web/PUYART.png" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Publicaciones y Artistas</h2>
                            <a href="">Ver Más</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="/img/img-web/DISCUSIONES1.png" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Discusiones</h2>
                            <a href="">Ver Más</a>
                        </figcaption>
                    </figure>
                </div>
        </div>
        </div>
        FIN admin-->

    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection
