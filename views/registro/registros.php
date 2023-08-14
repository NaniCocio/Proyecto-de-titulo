<picture class="red">
    <source srcset="build/img/Magallanes.webp" type="image/webp">
    <source srcset="build/img/Magallanes.jpg" type="image/jpg">
    <img loading="lazy" src="build/img/Magallanes.jpg" alt="icono inicio">
</picture>

<div class="barra">
<?

    include_once __DIR__ . "/../templates/alertas.php";
     
?>
    <p>Bienvenido: <strong><?php echo $nombre ?? ''; ?></strong></p>

    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<h2 class="nombre-pagina">Seguimiento Lesiones por Presión Usuario</h2>
<h3 class="descripcion-pagina">Registros Usuario</h3>

<div class="busqueda">
    <form class="formulario" action="">
        <div class="campo">
            <label for="rut">Rut</label>
            <input class="input" 
            type="text" 
            name="rut" 
            id="rut"
            value="<?php echo $rut; ?>"
            placeholder="xxxxxxxxxx"> 
            <ul id="listado-rut" class="listado-rut"></ul>
        </div>
        
    </form>
</div>

<?php
    if (count($evoluciones) === 0){
        echo "<h2> No hay Registros asociados en el sistema </h2>";
    }

?>

<div id="evoluciones">
    <table class="table">
        <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Id</th>
                    <th scope="col" class="table__th">RUT</th>
                    <th scope="col" class="table__th">Fecha</th>
                    <th scope="col" class="table__th">Usuario</th>
                    <th scope="col" class="table__th">Vacab</th>
                    <th scope="col" class="table__th">Imagen</th>
                    <th scope="col" class="table__th">Acción</th>
                </tr>
        </thead>

        <tbody class="table__tbody">
            <?php 
                $idEvolucion = 0;
                foreach($evoluciones as $evolucion ){
                    if($idEvolucion !== $evolucion->id){
                        $idEvolucion = $evolucion->id;          
            ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $evolucion->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evolucion->rut ; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evolucion->fecha; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evolucion->Usuario; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evolucion->VACAB; ?>
                        </td>
                        <td class="table__td">
                            <img src="/img/heridas/<?php echo $evolucion->imagen; ?>.png" class="imagen-tabla">
                        
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--ver" href="/ver?id=<?php echo $evolucion->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#01625e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />  
                                </svg>
                                Ver Registro
                            </a>
                        </td>

                    </tr>
                <?php  } //Fin de if?>
            <?php } ?> 
        </tbody>
    </table>
</div>

<div class="paginacion">
    <a href="/registro" class="boton">&laquo; Volver</a>
</div>

<script src='build/js/buscador2.js'></script>

