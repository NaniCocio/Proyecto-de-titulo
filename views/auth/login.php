<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img  loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<h2 class="nombre-pagina">Inicio de Sesión</h2>
<h3 class="descripcion-pagina">Ingresa tus datos</h3>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form method="POST" action="/" class="formulario">
    <div class="campo">
        <label for="email">E-mail</label>
        <br>
        <input 
            type="email" 
            id="email" 
            placeholder="Correo eléctronico" 
            name="email">
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <br>
        <input 
            type="password" 
            id="password"
            placeholder="Tu contraseña"
            name="password">
    </div>

    <input type="submit" class="boton" value="Ingresar">

</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>