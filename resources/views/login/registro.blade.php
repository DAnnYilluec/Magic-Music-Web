<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/img/img-login/ControlHead icon.png"/>
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/util.css">
	<link rel="stylesheet" type="text/css" href="/CSS/css-login/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-picr js-tilt" data-tilt>
                    <div id="imageElement"></div>
                    <script>
                        // Lista de nombres de las imágenes
                        var images = ["ControlHead Grande1.png", "ControlHead Grande2.png", "ControlHead Grande3.png", "ControlHead Grande4.png"];
                        // Selecciona una imagen aleatoria de la lista cada vez que se recarga la página
                        var selectedImage = images[Math.floor(Math.random() * images.length)];
                        // Inserta la imagen seleccionada en el elemento HTML deseado
                        document.getElementById("imageElement").innerHTML = '<img class= "text-center" src="/img/img-login/' + selectedImage + '" alt="ControlHead">';
                    </script>
				</div>

                <!--INICIO-->
				<form class="login100-form validate-form" method="post" action="/login/registro" enctype="multipart/form-data">
                    @csrf
					<span class="login100-form-title">
						Crear Cuenta
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
					<div class="container-login100-form-btn" >
						<button class="login100-form-btn" style="background-color: lightblue; color: white" name="btnRegistrarse">
							Crear Cuenta
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="index">
							¿Ya está registrado? Inicia sesión
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
                <!--FIN-->
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="/CSS/css-login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/CSS/css-login/vendor/bootstrap/js/popper.js"></script>
	<script src="/CSS/css-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/CSS/css-login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/CSS/css-login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/js/js-login/main.js"></script>

</body>
</html>
