let paso = 1;
const pasoInicial = 1;
const pasoFinal = 2;

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
        const url = "http://localhost:3000/api/pacientes";
        const resultado = await fetch(url);
        const pacientes = await resultado.json();
        mostrarPacientes(pacientes);
    } catch (error) {
        console.log(error);
    }
}

async function buscarPaciente() {
    const formPaciente = document.querySelector("#buscarPaciente");
    const nombrePacienteInpt = document.querySelector('#nombrePaciente');

    try {
        const url = "http://localhost:3000/api/pacientes";
        const resultado = await fetch(url);
        const pacientes = await resultado.json();
    } catch (error) {
        console.log(error);
    }
    
    nombrePacienteInpt.addEventListener('input', e => {
        console.log(e.target.value);
    });

    formPaciente.addEventListener('submit', e => {
        e.preventDefault();
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