import { API } from './api.js'

document.addEventListener('DOMContentLoaded', (event) => {
    // Obtener todos los elementos de artista y canción
    const artistas = document.querySelector('#artista');
    const canciones = document.querySelectorAll('.cancion');
    const botones = document.querySelectorAll('.botoncito');
    const resultados = document.querySelectorAll('.resultado');

    // Iterar sobre cada canción
    for (let i = 0; i < canciones.length; i++) {
        // Obtener los nombres del artista y la canción
        const artista = artistas.textContent;
        const cancion = canciones[i].textContent;

        // Añadir un evento de escucha al botón
        botones[i].addEventListener('click', () => {
            const collapseExample = document.getElementById(`collapseExample${i}`);
            const collapseLetra = document.getElementById(`collapseLetra${i}`);
            
            // Realizar consulta a la API
            const api = new API(artista, cancion);
            api.consultarAPI()
                .then(data => {
                    if (data.respuesta.lyrics) {
                        // La canción existe
                        const letra = data.respuesta.lyrics;
                        resultados[i].textContent = letra;
                        collapseLetra.classList.add('show');
                    } else {
                        // La canción no existe
                        resultados[i].innerHTML = 'La canción no existe, prueba con otra búsqueda';
                        resultados[i].classList.add('error');
                        setTimeout(() => {
                            resultados[i].innerHTML = '';
                            resultados[i].classList.remove('error');
                        }, 2000);
                    }
                });

            // Añadir evento para ocultar la letra cuando el colapso se cierra
            collapseExample.addEventListener('hidden.bs.collapse', () => {
                collapseLetra.classList.remove('show');
                resultados[i].innerHTML = '';
            });
        });
    }
});

