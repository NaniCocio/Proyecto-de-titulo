<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<div class="barra">
    <p>Bienvenido: <strong>
            <?php echo $nombre ?? ''; ?>
        </strong></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<h2 class="nombre-pagina">Seguimiento Lesiones por Presión Usuario</h2>
<h3 class="descripcion-pagina">Registro Curaciones Paciente</h3>

<form method="POST" enctype="multipart/form-data" class="formulario">
    <div class="campo">
        <label for="rut">Rut</label>
        <input type="text" id="rut" name="rut" placeholder="1234567-8" value="<?php echo s($registros->rut); ?>" disabled>
    </div>
    <div class="campo">
        <label for="fecha">Fecha Curación</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo s($registros->fecha); ?>" disabled>
    </div>
    <div class="campo">
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres" value="<?php echo s($registros->nombres); ?>" disabled>
    </div>
    <div class="campo">
        <label for="apellidos">Apellidos</label>
        <input type=" text" id="apellidos" name="apellidos" value="<?php echo s($registros->apellidos); ?>" disabled>
    </div>
    <div class="campo">
        <label for="vacabId">VACAB</label>
        <input class="formulario_campo input" name="vacabId" id="vacabId" value="<?php echo s($registros->vacabId); ?>" disabled>
    </div>
    <div class="campo">
        <label for="evolucion">Evolución</label>
        <textarea class="input" id="evolucion" name="evolucion" disabled><?php echo s($registros->evolucion); ?></textarea>
    </div>
    
    <?php if(isset($registros->imagen_actual)){ ?>
            <p class="formulario__texto">Registro de la curación:</p>
            <div class="formulario__imagen">
                <picture>
                    <source src=src="<?php echo $_ENV['HOST'] . '/img/heridas/' . $registros->imagen ; ?>.webp" type="image/webp">
                    <source src=src="<?php echo $_ENV['HOST'] . '/img/heridas/' . $registros->imagen ; ?>.png" type="image/png">
                    <img src="<?php echo $_ENV['HOST'] . '/img/heridas/' . $registros->imagen ; ?>.png" alt="Imagen LPP">
                </picture>
            </div>

    <?php } ?>

    
</form>

<div class="paginacion">
    <a href="/registros" class="boton"> &laquo; Volver</a>
</div>