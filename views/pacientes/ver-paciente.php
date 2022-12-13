<h1>Paciente</h1>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form method="POST" class="formulario" id="registro-paciente">
    <div class="campo">
        <input type="hidden" name="id" value="<?php echo $datosPaciente['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input 
            type="text" 
            id="nombre" 
            name="nombre" 
            disabled
            value="<?php echo $datosPaciente['nombre']; ?>"
            placeholder="Ingrese el nombre del paciente" />
    </div>
    <div class="campo">
        <label for="apellidos">Apellidos:</label>
        <input 
            type="text" 
            id="apellidos" 
            name="apellidos" 
            disabled
            value="<?php echo $datosPaciente['apellidos']; ?>"
            placeholder="Ingrese los apellidos del paciente" />
    </div>
    <div class="campo">
        <label for="sexo">Sexo:</label>
        <input 
            type="text" 
            id="sexo" 
            name="sexo" 
            disabled
            value="<?php echo $datosPaciente['sexo']; ?>" />
    </div>
    <div class="campo">
        <label for="fechaNacimiento">Fecha Nacimiento:</label>
        <input 
            type="text" 
            id="fechaNacimiento" 
            name="fechaNacimiento" 
            disabled
            value="<?php echo $datosPaciente['fechaNacimiento']; ?>" />
    </div>
    <div class="campo">
        <label for="ultimaCita">Ultima Cita</label>
        <input 
            type="date" 
            id="ultimaCita" 
            name="ultimaCita" 
            value="<?php echo $datosPaciente['ultimaCita']; ?>"
            placeholder="Ultima cita del paciente" />
    </div>
    <div class="campo">
        <label for="antecedentePersonal">Antecedente Personal:</label>
        <textarea 
            name="antecedentePersonal" 
            placeholder="Antecedentes personales del paciente" 
            id="" cols="10" rows="5"><?php echo $datosPaciente['antecedentePersonal']; ?></textarea>
    </div>
    <div class="campo">
        <label for="enfermedadActual">Enfermedad Actual:</label>
        <textarea 
            name="enfermedadActual" 
            placeholder="Enfermedad actual del paciente" 
            id="" cols="10" rows="5"><?php echo $datosPaciente['enfermedadActual']; ?></textarea>
    </div>
    <div class="campo">
        <label for="antecedenteEnfermedad">Antecedente Enfermedad:</label>
        <textarea 
            name="antecedenteEnfermedad" 
            placeholder="Antecedente de la enfermedad del paciente" 
            id="" cols="10" rows="5"><?php echo $datosPaciente['antecedenteEnfermedad']; ?></textarea>
    </div>
    <div class="campo">
        <label for="antecedenteFamiliar">Antecedente Familiar:</label>
        <textarea 
            name="antecedenteFamiliar" 
            placeholder="Antecedentes familiares del paciente" 
            id="" cols="10" rows="5"><?php echo $datosPaciente['antecedenteFamiliar']; ?></textarea>
    </div>
    <input type="submit" value="Guardar" class="boton" />
    <div class="acciones">
        <a href="/pacientes"><span>Regresar</span></a>
    </div>
</form>