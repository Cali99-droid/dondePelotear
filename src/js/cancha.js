imagen();

const nuevaTareaBtn = document.querySelector("#agregar-cancha");
nuevaTareaBtn.addEventListener("click", function () {
  mostrarFormulario(false);
});

function mostrarFormulario(editar = false, tarea = {}) {
  const modal = document.querySelector("#nueva-cancha");

  setTimeout(() => {
    const formulario = document.querySelector(".formulario");
    formulario.classList.add("animar");
  }, 0);
  modal.style.display = "block";
  const btnCerrarModal = document.querySelector(".cerrar-modal");

  modal.addEventListener("click", function (e) {
    if (e.target.classList.contains("cerrar-modal")) {
      const formulario = document.querySelector(".formulario");
      formulario.classList.add("cerrar");
      setTimeout(() => {
        formulario.classList.remove("cerrar");
        modal.style.display = "none";
      }, 500);
    }
    if (e.target.classList.contains("submit-nueva-cancha")) {
     
    validarCancha();
   
      // const nombreTarea = document.querySelector("#nombre").value.trim();
      // if (nombreTarea === "") {
      //   //mostrar Alerta
      //   mostrarAlerta(
      //     "El nombre de la tarea es obligatorio",
      //     "error",
      //     document.querySelector(".formulario legend")
      //   ); return; }
     
       

      // if (editar) {
      //   tarea.nombre = nombreTarea;
      //   actualizarTarea(tarea);
      // } else {
      //   agregarTarea(nombreTarea);
      // }
    }
  });
  document.querySelector(".dashboard").appendChild(modal);
}

function mostrarAlerta(mensaje, tipo, referencia) {
  //para que no se repitan las alertas
  const alertaPrevia = document.querySelector(".alerta");
  if (alertaPrevia) {
    alertaPrevia.remove();
  }
  const alerta = document.createElement("DIV");
  alerta.classList.add("alerta", tipo);
  alerta.textContent = mensaje;

  referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);
  //eliminar la alerta despues de 5 segundos
  setTimeout(() => {
    alerta.remove();
  }, 5000);
}




async function validarCancha(){
  const nombre = document.querySelector('#nombre').value.trim();
  const descripcion = document.querySelector('#descripcion').value.trim();
  const telefono = document.querySelector('#telefono').value.trim();
  const precio = document.querySelector('#precio').value.trim();
  const direccion = document.querySelector('#direccion').value.trim();
  const desde = document.querySelector('#desde').value.trim();
  const hasta = document.querySelector('#hasta').value.trim();
  const imagen = document.querySelector('#imagen');
  const categoria = document.querySelector('#categoria').value.trim();
  const distrito = document.querySelector('#distrito').value.trim();
  if (nombre === "") {
      //mostrar Alerta
      mostrarAlerta(
        "El nombre es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }

    if (descripcion === "") {
      //mostrar Alerta
      mostrarAlerta(
        "La descripcion es obligatoria",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }
    if (telefono === "") {
      //mostrar Alerta
      mostrarAlerta(
        "El telefono es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }
    if (precio === "") {
      //mostrar Alerta
      mostrarAlerta(
        "El precio es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }

    if (direccion === "") {
      //mostrar Alerta
      mostrarAlerta(
        "La direccion es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }
    if (desde === "") {
      //mostrar Alerta
      mostrarAlerta(
        "El horario es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }

    if (hasta === "") {
      //mostrar Alerta
      mostrarAlerta(
        "El horario es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }
    if (imagen === "") {
      //mostrar Alerta
      mostrarAlerta(
        "La imagen es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      ); 
      return; 
    }


  datos = new FormData();
  datos.append("nombre", nombre);
  datos.append("descripcion", descripcion);
  datos.append("telefono", telefono);
  datos.append("precio", precio);
  datos.append("direccion", direccion);
  datos.append("horario[desde]", desde);
  datos.append("horario[hasta]", hasta);
  datos.append("imagen", imagen.files[0]);
  datos.append("distrito_id", distrito);
  datos.append("categoria_id", categoria);

  try {
    //Peticion hacia la api
    const url = "http://localhost:3000/api/set-cancha";
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });
    const resultado = await respuesta.json();
    console.log(resultado.id);
   
    if (resultado.resultado) {
      Swal.fire({
        icon: "success",
        text: "Cancha Creada Correctamente!",
      });
      const cerrar = document .querySelector(".cerrar-modal");
      cerrar.click();
     
      //** Puedo manejarlo en memoria o nuevamente consultar al servidor para obtener los datos actualizados */
      // const derObj = {
      //   id: String(resultado.id),
      //   nombreBen: der.nombreBen,
      //   descripcion: descripcion.value,
      //   estado: estado.value,
      //   fecha_efectiva: resultado.fecha,
      // };

      //** consultando al servidor para actualizar los datos */
     // obtenerDatos();
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Hubo un error!",
      });
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Hubo un error al guardar !",
    });
  }

    

}


function imagen(){
    // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
  }
}
