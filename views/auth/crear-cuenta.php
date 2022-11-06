<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llene el formulario para crear una cuenta</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/crear-cuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Tu nombre</label>
        <input 
            type="text" 
            id="nombre" 
            name="nombre" 
            placeholder="Ingrese su Nombre" 
            value="<?php echo s($doctor->nombre); ?>"
        />
    </div>
    <div class="campo">
        <label for="apellido">Tus Apellidos</label>
        <input 
            type="text" 
            id="apellido" 
            name="apellidos" 
            placeholder="Ingrese sus Apellidos" 
            value="<?php echo s($doctor->apellidos); ?>"
        />
    </div>
    <div class="campo">
        <label for="email">Tu Email</label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            placeholder="Ingrese su Email" 
            value="<?php echo s($doctor->email); ?>"
        />
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
            type="password" 
            id="password" 
            name="password" 
            placeholder="Ingrese su Contraseña" 
        />
    </div>
    <input 
        value="Registrarse" 
        class="boton" 
        type="submit" 
    />
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta?<span>Inicia Sesión</span></a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>