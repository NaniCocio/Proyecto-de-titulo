<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<h2 class="nombre-pagina">Crear Cuenta</h2>
<h3 class="descripcion-pagina">Llena el siguiente formulario</h3>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/crear-cuenta">
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input 
            type="text"
            id= "nombre"
            name= "nombre"
            placeholder="Tu nombre"
            value = "<?php echo s($usuario -> nombre);?>"
            >
            
    </div>
    <div class="campo">
        <label for="apellido">Apellidos:</label>
        <input 
            type="text"
            id= "apellido"
            name= "apellidos"
            placeholder="Tus Apellidos"
            value = "<?php echo s($usuario -> apellidos);?>"
            >
    </div>
    <div class="campo">
        <label for="email">E-mail:</label>
        <input 
            type="email"
            id= "email"
            name= "email"
            placeholder="Correo Institucional"
            value = "<?php echo s($usuario -> email);?>"
            >
    </div>

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input 
            type="password"
            id= "password"
            name= "password"
            placeholder="Ingresa tu Contraseña">
    </div>

    <input type="submit" value="Crear mi Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>