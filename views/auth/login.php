<h1 class="nombre-pagina">Inicia Sesión</h1>
<p class="descripcion-pagina">Administre el historial de sus pacientes</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email" 
            id="emai" 
            placeholder="Ingrese su Email" 
            name="email" 
        />
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
            type="password" 
            id="password" 
            placeholder="Ingrese su Contraseña" 
            name="password" 
        />
    </div>
    <input 
        value="Iniciar Sesión"
        class="boton" 
        type="submit" 
    />
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? <span>Crear Una</span></a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>