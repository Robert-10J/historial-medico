<h1 class="nombre-pagina">Olvide Contraseña</h1>
<p class="descripcion-pagina">Reestablezca su contraseña con su email</p>

<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Tu Email</label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu email" />
    </div>
    <input type="submit" class="boton" value="Enviar Instrucciones" />
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? <span>Inicia Sesión</span></a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? <span>Crea Una</span></a>
</div>