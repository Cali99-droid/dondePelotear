imagen();const nuevaTareaBtn=document.querySelector("#agregar-cancha");function mostrarFormulario(e=!1,r={}){const o=document.querySelector("#nueva-cancha");setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),o.style.display="block";document.querySelector(".cerrar-modal");o.addEventListener("click",(function(e){if(e.target.classList.contains("cerrar-modal")){const e=document.querySelector(".formulario");e.classList.add("cerrar"),setTimeout(()=>{e.classList.remove("cerrar"),o.style.display="none"},500)}e.target.classList.contains("submit-nueva-cancha")&&validarCancha()})),document.querySelector(".dashboard").appendChild(o)}function mostrarAlerta(e,r,o){const t=document.querySelector(".alerta");t&&t.remove();const a=document.createElement("DIV");a.classList.add("alerta",r),a.textContent=e,o.parentElement.insertBefore(a,o.nextElementSibling),setTimeout(()=>{a.remove()},5e3)}async function validarCancha(){const e=document.querySelector("#nombre").value.trim(),r=document.querySelector("#descripcion").value.trim(),o=document.querySelector("#telefono").value.trim(),t=document.querySelector("#precio").value.trim(),a=document.querySelector("#direccion").value.trim(),n=document.querySelector("#desde").value.trim(),c=document.querySelector("#hasta").value.trim(),l=document.querySelector("#imagen"),i=document.querySelector("#categoria").value.trim(),d=document.querySelector("#distrito").value.trim();if(""!==e)if(""!==r)if(""!==o)if(""!==t)if(""!==a)if(""!==n)if(""!==c)if(""!==l){datos=new FormData,datos.append("nombre",e),datos.append("descripcion",r),datos.append("telefono",o),datos.append("precio",t),datos.append("direccion",a),datos.append("horario[desde]",n),datos.append("horario[hasta]",c),datos.append("imagen",l.files[0]),datos.append("distrito_id",d),datos.append("categoria_id",i);try{const e="http://localhost:3000/api/set-cancha",r=await fetch(e,{method:"POST",body:datos}),o=await r.json();if(console.log(o.id),o.resultado){Swal.fire({icon:"success",text:"Cancha Creada Correctamente!"});document.querySelector(".cerrar-modal").click()}else Swal.fire({icon:"error",title:"Error",text:"Hubo un error!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar !"})}}else mostrarAlerta("La imagen es obligatorio","error",document.querySelector(".formulario legend"));else mostrarAlerta("El horario es obligatorio","error",document.querySelector(".formulario legend"));else mostrarAlerta("El horario es obligatorio","error",document.querySelector(".formulario legend"));else mostrarAlerta("La direccion es obligatorio","error",document.querySelector(".formulario legend"));else mostrarAlerta("El precio es obligatorio","error",document.querySelector(".formulario legend"));else mostrarAlerta("El telefono es obligatorio","error",document.querySelector(".formulario legend"));else mostrarAlerta("La descripcion es obligatoria","error",document.querySelector(".formulario legend"));else mostrarAlerta("El nombre es obligatorio","error",document.querySelector(".formulario legend"))}function imagen(){var e=document.getElementById("myModal"),r=document.getElementById("myImg"),o=document.getElementById("img01"),t=document.getElementById("caption");r.onclick=function(){e.style.display="block",o.src=this.src,t.innerHTML=this.alt},document.getElementsByClassName("close")[0].onclick=function(){e.style.display="none"}}nuevaTareaBtn.addEventListener("click",(function(){mostrarFormulario(!1)}));