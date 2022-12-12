let paso = 1;
const pasoInicial = 1;
const pasoFinal = 2;
let lista_pacientes;

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    mostrarSeccion();
    tabs();
    botonesPaginador();
    paginaSiguiente();
    paginaAnterior();
    consultarPacientes();
    buscarPaciente();
    
}


async function consultarPacientes() {
    try {
        const url = `${location.origin}/api/pacientes`;
        const resultado = await fetch(url);
        const pacientes = await resultado.json();
        mostrarPacientes(pacientes);
    } catch (error) {
        console.log(error);
    }
}

async function buscarPaciente() {
    const formPaciente = document.querySelector("#buscarPaciente");
    const firstChild = document.querySelector('#paciente-buscado');

    try {
        const url = `${location.origin}/api/pacientes`;
        const resultado = await fetch(url);
        const pacientes = await resultado.json();
        lista_pacientes = pacientes;
        console.log(lista_pacientes);
    } catch (error) {
        console.log(error);
    }
    
    formPaciente.addEventListener('submit', e => {
        e.preventDefault();
        let nombrePacienteInpt = document.querySelector('#nombrePaciente').value;
        paciente_buscado = lista_pacientes.filter(function(paciente_buscado) {
            return paciente_buscado.apellidos === nombrePacienteInpt;
        });
        
        if ( !nombrePacienteInpt ) {
            alert('Ingrese los apellidos de un paciente')
            return
        }
        if ( paciente_buscado.length === 0 ) {
            alert('Paciente no encontrado')
        }

        mostrarPaciente(paciente_buscado)        
        if( firstChild.childNodes.length >= 2 ) {
            document.querySelector('#paciente-buscado').removeChild(firstChild.childNodes[0])
        }
    });
}

function mostrarSeccion() {
    const seccionAnterior = document.querySelector('.mostrar');
    if( seccionAnterior ) {
        seccionAnterior.classList.remove('mostrar'); 
    }

    const seccion = document.querySelector(`#paso-${paso}`);
    seccion.classList.add('mostrar');

    const tabAnterior = document.querySelector('.actual');
    if( tabAnterior ) {
        tabAnterior.classList.remove('actual');
    }

    // Resalta el tab actual
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');
}

function tabs() {
    const botones = document.querySelectorAll('.tabs button');
    botones.forEach( boton => {
        boton.addEventListener('click', e => {
            paso = parseInt( e.target.dataset.paso );
            mostrarSeccion();
            botonesPaginador();
        });
    });
}

function botonesPaginador() {
    const paginaSiguiente = document.querySelector('#siguiente');
    const paginaAnterior = document.querySelector('#anterior');

    if( paso === 1 ) {
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    } else if ( paso === 2 ) {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');
    }

    mostrarSeccion();
}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', () => {
        if( paso <= pasoInicial ) return;
        paso--;
        botonesPaginador();
    });
}

function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', () => {
        if( paso >= pasoFinal ) return;
        paso++;
        botonesPaginador();
    });
}

function mostrarPacientes( pacientes ) {
    pacientes.forEach( paciente => {
        const { id, nombre, apellidos, sexo, fechaNacimiento} = paciente;

        const nombrePaciente = document.createElement('P');
        nombrePaciente.classList.add('nombre-paciente');
        nombrePaciente.innerHTML = `<span>Nombre:</span> ${nombre} ${apellidos}`;
        
        const sexoPaciente = document.createElement('P');
        sexoPaciente.classList.add("genero-paciente");
        sexoPaciente.innerHTML = `<span>Genero:</span> ${sexo}`;
        
        const fechaNacimientoPaciente = document.createElement('P');
        fechaNacimientoPaciente.classList.add("fechaNa-paciente");
        fechaNacimientoPaciente.innerHTML = `<span>Fecha Nacimiento:</span> ${fechaNacimiento}`;

        const pacienteDiv = document.createElement('DIV');
        pacienteDiv.classList.add('paciente');
        pacienteDiv.dataset.idPaciente = id;

        pacienteDiv.appendChild(nombrePaciente);
        pacienteDiv.appendChild(sexoPaciente);
        pacienteDiv.appendChild(fechaNacimientoPaciente);

        document.querySelector('#pacientes').appendChild( pacienteDiv );
    });
}

function mostrarPaciente( paciente ) {
    paciente.forEach ( datosPaciente => {
        const { id, nombre, apellidos, sexo, fechaNacimiento, antecedentePersonal, enfermedadActual, antecedenteEnfermedad, antecedenteFamiliar } = datosPaciente;

        const nombrePaciente = document.createElement('P');
        nombrePaciente.classList.add('nombre-paciente');
        nombrePaciente.innerHTML = `<span>Nombre:</span> ${nombre} ${apellidos}`;
            
        const sexoPaciente = document.createElement('P');
        sexoPaciente.classList.add("genero-paciente");
        sexoPaciente.innerHTML = `<span>Genero:</span> ${sexo}`;
            
        const fechaNacimientoPaciente = document.createElement('P');
        fechaNacimientoPaciente.classList.add("fechaNa-paciente");
        fechaNacimientoPaciente.innerHTML = `<span>Fecha Nacimiento:</span> ${fechaNacimiento}`;
    
        const antecedentePersonalPaciente = document.createElement('P');
        antecedentePersonalPaciente.classList.add("fechaNa-paciente");
        antecedentePersonalPaciente.innerHTML = `<span>Antecedente Personal:</span> ${antecedentePersonal}`;
    
        const enfermedadActualPaciente = document.createElement('P');
        enfermedadActualPaciente.classList.add("fechaNa-paciente");
        enfermedadActualPaciente.innerHTML = `<span>Enfermedad Actual:</span> ${enfermedadActual}`;
    
        const antecedenteEnfermedadPaciente = document.createElement('P');
        antecedenteEnfermedadPaciente.classList.add("fechaNa-paciente");
        antecedenteEnfermedadPaciente.innerHTML = `<span>Antecedente Enfermedad:</span> ${antecedenteEnfermedad}`;
        
        const antecedenteFamiliarPaciente = document.createElement('P');
        antecedenteFamiliarPaciente.classList.add("fechaNa-paciente");
        antecedenteFamiliarPaciente.innerHTML = `<span>Antecedente Familiar:</span> ${antecedenteFamiliar}`;
    
        const pacienteSearchDiv = document.createElement('DIV');
        pacienteSearchDiv.classList.add('paciente');
        pacienteSearchDiv.dataset.idPaciente = id;
    
        pacienteSearchDiv.appendChild(nombrePaciente);
        pacienteSearchDiv.appendChild(sexoPaciente);
        pacienteSearchDiv.appendChild(fechaNacimientoPaciente);
        pacienteSearchDiv.appendChild(antecedentePersonalPaciente);
        pacienteSearchDiv.appendChild(enfermedadActualPaciente);
        pacienteSearchDiv.appendChild(antecedenteEnfermedadPaciente);
        pacienteSearchDiv.appendChild(antecedenteFamiliarPaciente);
        
        document.querySelector('#paciente-buscado').appendChild( pacienteSearchDiv );
    });
}