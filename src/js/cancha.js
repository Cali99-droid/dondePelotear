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
    if (e.target.classList.contains("submit-nueva-tarea")) {
      const nombreTarea = document.querySelector("#nombre").value.trim();
      if (nombreTarea === "") {
        //mostrar Alerta
        mostrarAlerta(
          "El nombre de la tarea es obligatorio",
          "error",
          document.querySelector(".formulario legend")
        );
        return;
      }

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
