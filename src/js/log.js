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
  const contenedorCanchas = document.querySelector("#contenedor-anuncios");
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

    //detalles
    const nombreCancha = document.createElement("H3");
    nombreCancha.textContent = cancha.nombre;
    const descripcion = document.createElement("P");
    descripcion.textContent = cancha.descripcion;
    const direccion = document.createElement("P");
    direccion.textContent = cancha.direccion + ' - ' + cancha.distrito;
    const precio = document.createElement("P");
    precio.classList.add('precio')
    precio.textContent = "S/" + cancha.precio;
    
    //boton de reserva
    const botonReserva = document.createElement("A");
    botonReserva.setAttribute("href", "/reservar?id=" + cancha.id);
    botonReserva.classList.add('btn');
    botonReserva.textContent = "Reservar Ahora";    
    canchaDatos.appendChild(nombreCancha);
    canchaDatos.appendChild(descripcion);
    canchaDatos.appendChild(direccion);
    canchaDatos.appendChild(precio);
    canchaDatos.appendChild(botonReserva);

    //agregando hijos
    enlaceCancha.appendChild(imagen);
    enlaceCancha.appendChild(canchaDatos);
    contenedorCancha.appendChild(enlaceCancha);

    contenedorCanchas.appendChild(contenedorCancha);
  });
}




