<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img  loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<h2 class="nombre-pagina">Recuperar Contraseña</h2>
<h3 class="descripcion-pagina">Coloca tu nueva contraseña</h3>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>
<?php
    if($error) return null;
?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Nueva Contraseña">
    </div>

    <input type="submit" class="boton" value="Guardar Nueva Contraseña">

</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
</div>
