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
                                <h4 class="title">Tabla de <span>Usuarios</span></h4>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                                <div class="btn_group">
                                    <form action="{{ route('busquedaUsu') }}" method="GET">
                                    <input type="text" class="form-control" placeholder="Buscar Usuario"  name="q">
                                    </form>
                                    <button class="btn btn-default" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                    <button class="btn btn-default" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                    <button class="btn btn-default" title="Excel"><i class="fas fa-file-excel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary tm-btn-big" href="{{route('pagCrearUsuarioAd')}}">Crear Nuevo Usuario</a>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Admin</th>
                                <th>Correo</th>
                                <th>Fecha</th>
                                <th>.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->nombre_usuario }}</td>
                                <td>@livewire('mostrar-admin', ['usuarioId' => $usuario->id])</td>
                                <td>{{ $usuario->correo }}</td>
                                <td>{{ $usuario->created_at }}</td>
                                <td>
                                    <ul class="action-list">
                                        @if($usuario->nombre_usuario != "DAnnYilluec")
                                        <li><button href="{{route('eliminar',$usuario->id)}}" data-tip="delete"><i class="fa fa-trash"></i></button></li>
                                            @livewire('cambiar-admin', ['usuarioId' => $usuario->id])
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-sm-6 col-xs-6">Mostrando <b>{{ $usuarios->count() }}</b> de <b>{{ $usuarios->total() }}</b> entradas</div>
                            <div class="col-sm-6 col-xs-6">
                                {{$usuarios->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                            </div>
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
