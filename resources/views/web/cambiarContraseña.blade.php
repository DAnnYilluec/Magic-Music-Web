@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout')
@section('title',$id->nombre)
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <form id="cambiarContrasenaForm" method="post" action="/web/cambiarContraseña">
        @csrf
        <label for="contrasenaActual">Contraseña actual:</label>
        <input type="password" id="contrasenaActual" name="contrasenaActual">
        <label for="nuevaContrasena">Nueva contraseña:</label>
        <input type="password" id="nuevaContrasena" name="nuevaContrasena">
        <button type="submit">Cambiar contraseña</button>
    </form>


    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

        document.getElementById('cambiarContrasenaForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var contrasenaActual = document.getElementById('contrasenaActual').value;
            var nuevaContrasena = document.getElementById('nuevaContrasena').value;

            // Hacer una solicitud AJAX a /cambiarContraseña
            fetch('/web/cambiarContraseña', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // Asegúrate de incluir el token CSRF de Laravel en la solicitud
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ contrasenaActual: contrasenaActual, nuevaContrasena: nuevaContrasena })
            })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    if (data === 'La contraseña ha sido cambiada exitosamente') {
                        // Si la contraseña es correcta, redirigir al usuario a la página de perfil
                        window.location.href = '/web/miPerfil/' + {{$id->id}};  // Asegúrate de tener disponible el usuarioId
                    } else {
                        alert('La contraseña actual es incorrecta.');
                    }
                })

                .catch((error) => {
                    console.error('Error:', error);
                });
        });


    </script>

@endsection
