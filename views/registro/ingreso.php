<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<div class="barra">
    <p>Bienvenido: <strong><?php echo $nombre ?? ''; ?></strong></p>

    <a class="boton" href="/logout">Cerrar Sesión</a>

</div>

<h2 class="nombre-pagina">Seguimiento Lesiones por Presión Usuario</h2>
<h3 class="descripcion-pagina">Ingreso nuevo paciente</h3>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form method="POST" action="/ingreso" class="formulario">
    <div class="campo">
        <label for="rut">Rut</label>
        <input type="text" 
            id="rut"
            name="rut"
            placeholder="xxxxxxxx-x"
            value = "<?php echo s($ingreso -> rut);?>">
    </div>                 
                    
    <div class="campo">
        <label for="admision">Admisión</label>
        <input type="number" 
            id="admision"
            name="admision"
            placeholder="Número de admisión usuario"
            value = "<?php echo s($ingreso -> admision);?>">
    </div>

    <div class="campo">
         <label for="nombres">Nombres</label>
        <input type="text" 
            id="nombres"
            name="nombres"
            value = "<?php echo s($ingreso -> nombres);?>">
    </div>
    <div class="campo">
         <label for="apellidos">Apellidos</label>
        <input type="text" 
            id="apellidos"
            name="apellidos"
            value = "<?php echo s($ingreso -> apellidos);?>">
    </div>

    <div class="campo">
        <label for="nacimiento">Fecha de nacimiento</label>
        <input type="date" 
        id="nacimiento"
        name="nacimiento"
        value="<?php echo s($ingreso -> nacimiento);?>">
    </div> 

    <div class="campo">
        <label for="braden">Ptje Escala de Braden</label>
        <input type="number" 
            id="braden"
            name="braden"
            value = "<?php echo s($ingreso -> braden);?>">
    </div>
    <div class="campo">
        <label for="diagrama">Ptje diagrama de valoración</label>
        <input type="number" 
            id="diagrama"
            name="diagrama"
            value = "<?php echo s($ingreso -> diagrama);?>">
        
    </div>
    
    <input class="boton" type="submit" value="Ingresar">                 
</form>


<div class="paginacion">
    <a href="/registro" class="boton">&laquo; Volver</a>
</div>