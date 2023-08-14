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
<h3 class="descripcion-pagina">¿Qué deseas hacer?</h3>


<div class="contenedor-opciones">
        
    <div class="iconos">
        <a href="/ingreso">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#01625e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M16 19h6" />
                <path d="M19 16v6" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
            </svg>
            
            <p>Ingreso paciente</p>
        </a>
    </div>
        
    <div class="iconos">
        <a href="/seguimiento">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#01625e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                <line x1="11" y1="6" x2="20" y2="6" />
                <line x1="11" y1="12" x2="20" y2="12" />
                <line x1="11" y1="18" x2="20" y2="18" />
            </svg>

            <p>Evolución</p>
        </a>
    </div>

    <div class="iconos">
        <a href="/registros">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#01625e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                <path d="M10 12l4 0" />
            </svg>
            <p>Ver Registros</p>
        </a>
    </div>
                  
</div>

 