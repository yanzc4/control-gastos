//?funcion para cambiar el color cuando se hace click en el boton
$(document).ready(function () {
    $('.relleno-btn').click(function () {
        $('.relleno-btn').find('svg').removeClass('active');
        //al svg hijo del boton agregarle la clase active
        $(this).find('svg').addClass('active');
    });
});

//?girar el icono + al clickear
$('#dropdownTopButton').click(function () {
    //aplicar al svg dentro del boton
    $('#dropdownTopButton svg').toggleClass('rotate-45');
});

//?funciion para cargar home
function cargarHome() {
    $.ajax({
        url: '../layouts/home/home.php',
        type: 'GET',
        success: function (data) {
            document.getElementById('contenido').innerHTML = data;
            renderizarGrafico();
        }
    });
}

function cargarIngresos() {
    $.ajax({
        url: '../layouts/home/ingresos.php',
        type: 'GET',
        success: function (data) {
            document.getElementById('contenido').innerHTML = data;
        }
    });
}

function cargarEgresos() {
    $.ajax({
        url: '../layouts/home/egresos.php',
        type: 'GET',
        success: function (data) {
            document.getElementById('contenido').innerHTML = data;
        }
    });
}



function registrar(id) {
    //abrira el modal
    $('#modal_registrar').removeClass('hidden');
    $('#idcitar').val(id);
}

function mostrar_cita(id) {
    $('#modal_mostrar_cita').removeClass('hidden');
    $('#idcitam').val(id);
}

function modalBuscar() {
    $('#modal_buscar').removeClass('hidden');
}

//?funcion para cerrar el modal
function cerrarModal(modal) {
    $(modal).addClass('hidden');
}


