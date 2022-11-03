<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llene el formulario para crear una cuenta</p>

<form action="/crear-cuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Tu nombre</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ingrese su Nombre"
        />
    </div>
    <div class="campo">
        <label for="apellido">Tu Apellido</label>
        <input 
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Ingrese su Apellido"
        />
    </div>
</form>