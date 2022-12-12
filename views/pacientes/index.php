<h1 class="nombre-pagina">Historial Médico</h1>
<p class="descripcion-pagina">Registre y tenga acceso a los datos de sus pacientes</p>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Registrar Paciente</button>
        <button type="button" data-paso="2">Pacientes</button>
        <!-- <button type="button" data-paso="3">Registrar Paciente</button> -->
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Registre un paciente</h2>
        <p class="text-center">Y su historia medica</p>

        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

        <form method="POST" class="formulario" id="registro-paciente">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del paciente" />
            </div>
            <div class="campo">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos del paciente" />
            </div>
            <div class="campo">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="campo">
                <label for="fechaNacimiento">Fecha Nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" placeholder="Ingrese el nombre del paciente" />
            </div>
            <div class="campo">
                <label for="antecedentePersonal">Antecedente Personal:</label>
                <textarea name="antecedentePersonal" placeholder="Antecedentes personales del paciente" id="" cols="10" rows="5"></textarea>
            </div>
            <div class="campo">
                <label for="enfermedadActual">Enfermedad Actual:</label>
                <textarea name="enfermedadActual" placeholder="Enfermedad actual del paciente" id="" cols="10" rows="5"></textarea>
            </div>
            <div class="campo">
                <label for="antecedenteEnfermedad">Antecedente Enfermedad:</label>
                <textarea name="antecedenteEnfermedad" placeholder="Antecedente de la enfermedad del paciente" id="" cols="10" rows="5"></textarea>
            </div>
            <div class="campo">
                <label for="antecedenteFamiliar">Antecedente Familiar:</label>
                <textarea name="antecedenteFamiliar" placeholder="Antecedentes familiares del paciente" id="" cols="10" rows="5"></textarea>
            </div>
            <input type="submit" value="Registrar Paciente" class="boton" />
        </form>
    </div>

    <div id="paso-2" class="seccion">
        <h2>Listado de sus pacientes</h2>
        <p class="text-center">Acceso a datos de sus pacientes</p>
        <form action="" id="buscarPaciente">
            <div class="campo">
                <label for="nombrePaciente">Busque un paciente</label>
                <input 
                    type="text"
                    id="nombrePaciente"
                    placeholder="Apellidos del paciente"
                />
            </div>
            <input type="submit" value="Buscar Paciente" class="boton" />
        </form>
        <div id="paciente-buscado" class="listado-pacientes"></div>
        <div id="pacientes" class="listado-pacientes"></div>
    </div>

    <!--     <div id="paso-3" class="seccion">
        <h2>Consulta paciente</h2>
        <p class="text-center">Historial médico de sus pacientes</p>
    </div> -->

    <div class="paginacion">
        <button id="anterior" class="boton">&laquo; Anterior</button>
        <button id="siguiente" class="boton">Siguiente &raquo;</button>
    </div>
</div>

<?php
$script = "
        <script src='build/js/app.js'></script>
    ";
?>