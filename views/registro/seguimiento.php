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
<h3 class="descripcion-pagina">Evolución curación</h3>

<?php
    include_once __DIR__ . "/../templates/alertas.php";

//Conexión base de datos y consulta para el select de VACAB
    $basededatos = mysqli_connect('localhost', 'root', '', 'UsuariosLpp');
    $consulta = "SELECT * FROM vacab" ;
    $resultado = mysqli_query($basededatos, $consulta);

    $vacabId = '';

?>

<form method="POST" action="/seguimiento" enctype="multipart/form-data" class="formulario">
    <div class="campo">
        <label for="rut">Rut</label>
        <input type="text" id="rut" name="rut" placeholder="1234567-8" value="<?php echo s($seguimiento->rut); ?>">
        <input class="boton" type="search" value="Buscar">
    </div>
    <div class="campo">
        <label for="fecha">Fecha Curación</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo s($seguimiento->fecha); ?>">
    </div>
    <div class="campo">
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres" value="<?php echo s($seguimiento->nombres); ?>">
    </div>
    <div class="campo">
        <label for="apellidos">Apellidos</label>
        <input type=" text" id="apellidos" name="apellidos" value="<?php echo s($seguimiento->apellidos); ?>">
    </div>
    <div class="campo">
        <label for="vacabId">VACAB</label>
        <select class="formulario_campo input" name="vacabId" id="vacabId">
            <option disabled selected>-- Carga Bacteriana --</option>
            <?php while ($vacab = mysqli_fetch_assoc($resultado)): ?>
                <option <?php echo $vacabId === $vacab['id'] ? 'selected' : ''; ?> value="<?php echo $vacab['id']; ?>"><?php echo $vacab['VACAB'] ?></option>
            <?php endwhile ?>
        </select>
    </div>
    <div class="campo">
        <label for="evolucion">Evolución</label>
        <textarea class="input" id="evolucion" name="evolucion"><?php echo s($seguimiento->evolucion); ?></textarea>
    </div>
    <div class="campo">
        <label for="imagen">Registro Fotográfico</label>
        <input type="file" class="boton" id="imagen" name="imagen" accept="image/jpge, image/png">
        <picture>
            <img src="<?php echo $_ENV['HOST'] . '/img/heridas/' . $seguimiento->imagen; ?>.png" alt="Imagen Ponente">
        </picture>
    </div>
    <div class="flex">
        <input class="boton" type="submit" value="Guardar Evolución">
    </div>
</form>

<div class="paginacion">
    <a href="/registro" class="boton"> &laquo; Volver</a>
</div>