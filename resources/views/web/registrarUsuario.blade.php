@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Magical Music Web')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/img-login/ControlHead icon.png"/>
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/util.css">
    <link rel="stylesheet" type="text/css" href="/CSS/css-login/main.css">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="
    width: auto;
    padding: 60px;
">
                <!--INICIO-->
				<form class="login100-form validate-form" method="post" action="/web/registrarUsuario" enctype="multipart/form-data">
                    @csrf
					<span class="login100-form-title">
						Crear Usuario
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nombre" placeholder="Nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="nombre_usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="correo" placeholder="Correo Electrónico">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="contrasena" placeholder="Contraseña">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="contrasena_confirmation" placeholder="Repita Contraseña">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input type="file" class="form-control" name="imagen" value="">
                        <span class="focus-input100"></span>
                    </div>
					<div class="container-login100-form-btn">
						<button class="" name="btnRegistrarse">
							Crear Cuenta
						</button>
					</div>
				</form>
                <!--FIN-->
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="/CSS/css-web/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/CSS/css-web/vendor/bootstrap/js/popper.js"></script>
	<script src="/CSS/css-web/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/CSS/css-web/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/CSS/css-web/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

    </script>

@endsection
