let paso=1;const pasoInicial=1,pasoFinal=2;let lista_pacientes;function iniciarApp(){mostrarSeccion(),tabs(),botonesPaginador(),paginaSiguiente(),paginaAnterior(),consultarPacientes(),buscarPaciente()}async function consultarPacientes(){try{const e=location.origin+"/api/pacientes",a=await fetch(e);mostrarPacientes(await a.json())}catch(e){console.log(e)}}async function buscarPaciente(){const e=document.querySelector("#buscarPaciente"),a=document.querySelector("#paciente-buscado");try{const e=location.origin+"/api/pacientes",a=await fetch(e),n=await a.json();lista_pacientes=n,console.log(lista_pacientes)}catch(e){console.log(e)}e.addEventListener("submit",e=>{e.preventDefault();let n=document.querySelector("#nombrePaciente").value;paciente_buscado=lista_pacientes.filter((function(e){return e.apellidos===n})),n?(0===paciente_buscado.length&&alert("Paciente no encontrado"),mostrarPaciente(paciente_buscado),a.childNodes.length>=2&&document.querySelector("#paciente-buscado").removeChild(a.childNodes[0])):alert("Ingrese los apellidos de un paciente")})}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");document.querySelector("#paso-"+paso).classList.add("mostrar");const a=document.querySelector(".actual");a&&a.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach(e=>{e.addEventListener("click",e=>{paso=parseInt(e.target.dataset.paso),mostrarSeccion(),botonesPaginador()})})}function botonesPaginador(){const e=document.querySelector("#siguiente"),a=document.querySelector("#anterior");1===paso?(a.classList.add("ocultar"),e.classList.remove("ocultar")):2===paso&&(a.classList.remove("ocultar"),e.classList.add("ocultar")),mostrarSeccion()}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",()=>{paso<=1||(paso--,botonesPaginador())})}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",()=>{paso>=2||(paso++,botonesPaginador())})}function mostrarPacientes(e){e.forEach(e=>{const{id:a,nombre:n,apellidos:t,sexo:c,fechaNacimiento:s,ultimaCita:o}=e,i=document.createElement("P");i.classList.add("nombre-paciente"),i.innerHTML=`<span>Nombre:</span> ${n} ${t}`;const r=document.createElement("P");r.classList.add("genero-paciente"),r.innerHTML="<span>Genero:</span> "+c;const d=document.createElement("P");d.classList.add("fechaNa-paciente"),d.innerHTML="<span>Fecha Nacimiento:</span> "+s;const l=document.createElement("P");l.classList.add("fechaNa-paciente"),l.innerHTML="<span>Ultima Cita:</span> "+o;const p=document.createElement("DIV");p.classList.add("paciente"),p.dataset.idPaciente=a;const u=document.createElement("A");u.setAttribute("href","ver-paciente?id="+a),u.innerHTML="<span>Ver Informacion</span>",p.appendChild(i),p.appendChild(r),p.appendChild(d),p.appendChild(l),p.appendChild(u),document.querySelector("#pacientes").appendChild(p)})}function mostrarPaciente(e){e.forEach(e=>{const{id:a,nombre:n,apellidos:t,sexo:c,fechaNacimiento:s,antecedentePersonal:o,enfermedadActual:i,antecedenteEnfermedad:r,antecedenteFamiliar:d}=e,l=document.createElement("P");l.classList.add("nombre-paciente"),l.innerHTML=`<span>Nombre:</span> ${n} ${t}`;const p=document.createElement("P");p.classList.add("genero-paciente"),p.innerHTML="<span>Genero:</span> "+c;const u=document.createElement("P");u.classList.add("fechaNa-paciente"),u.innerHTML="<span>Fecha Nacimiento:</span> "+s;const m=document.createElement("P");m.classList.add("fechaNa-paciente"),m.innerHTML="<span>Antecedente Personal:</span> "+o;const L=document.createElement("P");L.classList.add("fechaNa-paciente"),L.innerHTML="<span>Enfermedad Actual:</span> "+i;const h=document.createElement("P");h.classList.add("fechaNa-paciente"),h.innerHTML="<span>Antecedente Enfermedad:</span> "+r;const f=document.createElement("P");f.classList.add("fechaNa-paciente"),f.innerHTML="<span>Antecedente Familiar:</span> "+d;const P=document.createElement("DIV");P.classList.add("paciente"),P.dataset.idPaciente=a,P.appendChild(l),P.appendChild(p),P.appendChild(u),P.appendChild(m),P.appendChild(L),P.appendChild(h),P.appendChild(f),document.querySelector("#paciente-buscado").appendChild(P)})}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));