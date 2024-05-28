<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CambiarController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MostrarController;
use App\Http\Controllers\RegistroController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    /*Admin*/
    Route::get('web/administrador', [AdminController::class, 'mostrarPagAdmin'])->name('panelAdmin')->middleware(AdminMiddleware::class);
    Route::get('web/administradorUsuarios', [AdminController::class, 'mostrarUsuariosAdmin'])->name('panelAdminUsu')->middleware(AdminMiddleware::class);
    Route::get('web/administradorPub', [AdminController::class, 'mostrarPublicAdmin'])->name('panelAdminPublic')->middleware(AdminMiddleware::class);
    Route::get('web/administradorDisc', [AdminController::class, 'mostrarDiscusionesAdmin'])->name('panelAdminDiscu')->middleware(AdminMiddleware::class);
    Route::get('web/administradorMusica', [AdminController::class, 'mostrarMusicaAdmin'])->name('panelAdminMusica')->middleware(AdminMiddleware::class);
    Route::get('/eliminar/{id}', [AdminController::class, 'destroyad'])->name('eliminar')->middleware(AdminMiddleware::class);
    Route::get('/eliminarPub/{id}', [AdminController::class, 'destroyPubad'])->name('eliminarPub')->middleware(AdminMiddleware::class);
    Route::get('/eliminarDis/{id}', [AdminController::class, 'destroyDisad'])->name('eliminarDis')->middleware(AdminMiddleware::class);
    Route::get('/eliminarMus/{id}', [AdminController::class, 'destroyMusad'])->name('eliminarMus')->middleware(AdminMiddleware::class);
    Route::get('/eliminarArt/{id}', [AdminController::class, 'destroyArtad'])->name('eliminarArt')->middleware(AdminMiddleware::class);
    Route::get('web/publicacionEditar/{id}', [MostrarController::class, 'muestraEditarPublicacion'])->name('publicacionEditar')->middleware(AdminMiddleware::class);
    Route::put('web/publicacionEditar/{id}', [CambiarController::class, 'editarPublicacion'])->name('editarPublicacion')->middleware(AdminMiddleware::class);
    Route::get('web/discusionEditar/{id}', [MostrarController::class, 'muestraEditarDiscusion'])->name('discusionEditar')->middleware(AdminMiddleware::class);
    Route::put('web/discusionEditar/{id}', [CambiarController::class, 'editarDiscusion'])->name('editarDiscusion')->middleware(AdminMiddleware::class);
    Route::get('web/musicaEditar/{id}', [MostrarController::class, 'muestraEditarMusica'])->name('musicaEditar')->middleware(AdminMiddleware::class);
    Route::put('web/musicaEditar/{id}', [CambiarController::class, 'editarMusica'])->name('editarMusica')->middleware(AdminMiddleware::class);
    Route::get('web/editarArtista/{id}', [MostrarController::class, 'muestraEditarArtista'])->name('artistaEditar')->middleware(AdminMiddleware::class);
    Route::put('web/editarArtista/{id}', [CambiarController::class, 'editarArtista'])->name('editarArtista')->middleware(AdminMiddleware::class);
    Route::get('web/registrarUsuario', [MostrarController::class, 'mostrarRegistrarUsuarioAd'])->name('pagCrearUsuarioAd')->middleware(AdminMiddleware::class);
    Route::post('web/registrarUsuario', [RegistroController::class, 'crearRegistrarUsuarioAd'])->name('crearUsuarioAd')->middleware(AdminMiddleware::class);
    Route::post('/cambiar/{id}', [AdminController::class, 'cambiarAdmin'])->name('cambiarAdmin');
    /*web*/
//miPerfil
    Route::get('web/miPerfil/{id}', [MostrarController::class, 'muestraUsuario'])->name('miPerfil');
    Route::get('web/miPerfilEditar/{id}', [MostrarController::class, 'muestraEditarUsuario'])->name('miPerfilEditar');
    Route::put('web/miPerfilEditar/{id}', [CambiarController::class, 'editarUsuario'])->name('editarUsuario');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('web/cambiarContraseña/{id}', [MostrarController::class, 'muestraCambiarContraseña'])->name('mostrarCambiarContraseña');
    Route::post('web/cambiarContraseña', [CambiarController::class, 'cambiarContraseña'])->name('cambiarContraseña');
    Route::get('web/stalker/{id}',[MostrarController::class,'stalker'])->name('stalker');

//Busqueda
    Route::get('web/paginaDeBusqueda', [InicioController::class, 'busqueda'])->name('busqueda');
    Route::get('/busquedaUsu', [AdminController::class, 'busquedaUsu'])->name('busquedaUsu');
    Route::get('/busquedaDis', [AdminController::class, 'busquedaDis'])->name('busquedaDis');
    Route::get('/busquedaPub', [AdminController::class, 'busquedaPub'])->name('busquedaPub');
    Route::get('/busquedaMusica', [AdminController::class, 'busquedaMusica'])->name('busquedaMusica');

//Inicio
    Route::get('web/index', [InicioController::class, 'muestraPag'])->name('inicio');

//Publicaciones
    Route::get('web/publicaciones', [InicioController::class, 'muestraPagPublicaciones'])->name('pagPublicaciones');
    Route::get('web/publicacion/{publicacionId}', [MostrarController::class, 'mostrarPublicacion'])->name('pagPublicacion');
    Route::get('web/crearPublicacion', [MostrarController::class, 'mostrarCrearPublicacion'])->name('pagCrearPublicacion')->middleware(AdminMiddleware::class);
    Route::post('web/crearPublicacion', [RegistroController::class, 'crearPublicacion'])->name('crearPublicacion')->middleware(AdminMiddleware::class);


//Discusiones
    Route::get('web/discusiones', [InicioController::class, 'muestraPagDiscusiones'])->name('pagDiscusiones');
    Route::get('web/discusion/{discusionId}', [MostrarController::class, 'mostrarDiscusion'])->name('pagDiscusion');
    Route::get('web/crearDiscusion', [MostrarController::class, 'mostrarCrearDiscusion'])->name('pagCrearDiscusion');
    Route::post('web/crearDiscusion', [RegistroController::class, 'crearDiscusion'])->name('crearDiscusion');
//Artistas
    Route::get('web/artistas', [InicioController::class, 'muestraPagArtistas'])->name('pagArtistas');
    Route::get('web/perfilArtista/{artistaId}', [MostrarController::class, 'mostrarArtista'])->name('pagArtista');
    Route::get('web/crearArtista', [MostrarController::class, 'mostrarCrearArtista'])->name('pagCrearArtista')->middleware(AdminMiddleware::class);
    Route::post('web/crearArtista', [RegistroController::class, 'crearArtista'])->name('crearArtista')->middleware(AdminMiddleware::class);

//Musica
    Route::get('web/crearMusica', [MostrarController::class, 'mostrarCrearMusica'])->name('pagCrearMusica')->middleware(AdminMiddleware::class);
    Route::post('web/crearMusica', [RegistroController::class, 'crearMusica'])->name('crearMusica')->middleware(AdminMiddleware::class);
});
/*Login Register*/
//Login
Route::get('login/index',function (){
    return view('login/index');
})->name('index');
Route::post('login/index', [LoginController::class, 'authenticate'])->name('autenticarse');
Route::get('/eliminame/{id}', [LoginController::class,'destroy'])->name('eliminame');

//Register
Route::get('login/registro',function (){
    return view('login/registro');
})->name('registro');
Route::post('login/registro', [RegistroController::class, 'crearUsuario'])->name('registrarse');
