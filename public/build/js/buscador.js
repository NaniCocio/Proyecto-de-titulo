document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});


function iniciarApp() {
    filtrarRut();
}

function filtrarRut(){
    const rutInput = document.querySelector('#rut');

    if (rutInput){
        let rut = [];
        let rutFiltrado =[];

        obtenerRut();

        async function obtenerRut (){
            const url = `/api/registros`;
            const respuesta = await fetch(url);
            const resultados = await respuesta.json();

            formatearRut(resultados);
        }
    }

    function formatearRut(arrayRut = []){
        rut = arrayRut.map( registros => {
            return {
                rut: registros.rut,
            }
        })
    }

    function buscarRut (e){
        const busqueda = e.target.value;

        if(busqueda.length > 3){
            const expresion = new RegExp(busqueda, "i");
            rutFiltrado = rut.filter(registros => {
                if(registros.rut.search(expresion) != -1){
                    return registros
                }
            })

            console.log(rutFiltrado)
        }
    }

    


}



