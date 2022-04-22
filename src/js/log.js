obtenerCanchas();
let canchas = [];
async function obtenerCanchas() {
  try {
    const url = "api/get-canchas";
    const respuesta = await fetch(url);
    const resultado = await respuesta.json();
    canchas = resultado.canchas;
    console.log(canchas);
   
    mostrarCanchas();
  } catch (error) {
    console.log(error);
  }
}

function mostrarCanchas(){
  const arrayCancha = canchas;
  const contenedorGrupos = document.querySelector("#contenedor-grupos");
  arrayCancha.forEach((cancha) => {
    // * card cancha
    const contenedorCancha = document.createElement("DIV");
    contenedorCancha.classList.add('anuncio');

    // enlace de la cancha
    const enlaceCancha = document.createElement("A");
    enlaceCancha.setAttribute("href", "/cancha?id=" + cancha.id);
    // * imagen 
    const imagen = document.createElement("IMG");
    imagen.setAttribute("src", "/imagenes/" + cancha.imagen);
    imagen.classList.add("img-anuncio");

    // DIV anuncio
    const canchaDatos = document.createElement("DIV");
    canchaDatos.classList.add("contenido-anuncio");

    
    enlaceCancha.appendChild(imagen);
    contenedorCancha.appendChild(enlaceCancha);
    console.log(contenedorCancha);
  });
}




