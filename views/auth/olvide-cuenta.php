<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img  loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<h2 class="nombre-pagina">Olvide Password</h2>
<h3 class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</h3>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" action="/olvide" method="POST">
    <div class="campo">
        <label for="email">E-mail:</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu correo institucional">
    </div>
    
    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
</div>