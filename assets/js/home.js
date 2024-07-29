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

$('#dropdownTop').click(function () {
    $('#dropdownTopButton svg').toggleClass('rotate-45');
});

//?funcion para obtener el total
function obtenerTotal() {
    $.ajax({
        url: '../backend/apicalculos.php?f=total',
        type: 'POST',
        data:{token: $('#token').val()},
        success: function (e) {
            let data = JSON.parse(e);
            if(data.response == 'success'){
                $('#lblTotal').html('S./ ' + data.total);
                $('#llbIngresos').html(data.ingresos);
                $('#lblEgresos').html(data.egresos);
            }else{
                alertDanger('Error al obtener el total');
                $('#total').html('S./ 0.00');
                $('#llbIngresos').html('0.00');
                $('#lblEgresos').html('0.00');
            }
        }
    });
}

obtenerTotal();

//?funciion para cargar home
function cargarHome() {
    obtenerTotal();
    $('#contenido').addClass('hidden');
    $('#conthome').removeClass('hidden');
    setupChart();
}

function cargarIngresos() {
    $('#conthome').addClass('hidden');
    $('#contenido').removeClass('hidden');
    $.ajax({
        url: '../backend/ingresos.php?f=listar',
        type: 'POST',
        success: function (data) {
            document.getElementById('contenido').innerHTML = data;

            var menuButton = document.querySelector('.menu-button');
            var openMenu = function () {
                swiper.slidePrev();
            };
            var swiper = new Swiper('.swiper', {
                slidesPerView: 'auto',
                initialSlide: 1,
                resistanceRatio: 0,
                slideToClickedSlide: true,
                on: {
                    slideChangeTransitionStart: function () {
                        var slider = this;
                        if (slider.activeIndex === 0) {
                            menuButton.classList.add('cross');
                            // required because of slideToClickedSlide
                            menuButton.removeEventListener('click', openMenu, true);
                        } else {
                            menuButton.classList.remove('cross');
                        }
                    },
                    slideChangeTransitionEnd: function () {
                        var slider = this;
                        if (slider.activeIndex === 1) {
                            menuButton.addEventListener('click', openMenu, true);
                        }
                    },
                },
            });
        }
    });
}

function cargarEgresos() {
    $('#conthome').addClass('hidden');
    $('#contenido').removeClass('hidden');
    $.ajax({
        url: '../backend/egresos.php?f=listar',
        type: 'GET',
        success: function (data) {
            document.getElementById('contenido').innerHTML = data;

            var menuButton = document.querySelector('.menu-button');
            var openMenu = function () {
                swiper.slidePrev();
            };
            var swiper = new Swiper('.swiper', {
                slidesPerView: 'auto',
                initialSlide: 1,
                resistanceRatio: 0,
                slideToClickedSlide: true,
                on: {
                    slideChangeTransitionStart: function () {
                        var slider = this;
                        if (slider.activeIndex === 0) {
                            menuButton.classList.add('cross');
                            // required because of slideToClickedSlide
                            menuButton.removeEventListener('click', openMenu, true);
                        } else {
                            menuButton.classList.remove('cross');
                        }
                    },
                    slideChangeTransitionEnd: function () {
                        var slider = this;
                        if (slider.activeIndex === 1) {
                            menuButton.addEventListener('click', openMenu, true);
                        }
                    },
                },
            });

        }
    });
}

//?funcion para eliminar un registro
function eliminarIngreso(id) {
    alertDelete('Eliminar Ingreso','¿Desea eliminar el registro seleccionado?');
    $('#btnEliminar').click(function () {
        let token = $('#token').val();
        $.ajax({
            url: '../backend/ingresos.php?f=delete',
            type: 'POST',
            data: { token: token, id: id },
            success: function (e) {
                let data = JSON.parse(e);
                if(data.response == 'success'){
                    alertSuccess(data.message);
                    cargarIngresos();
                }else{
                    alertWarning(data.message);
                }
            },
            error: function () {
                alertDanger('Ocurrio un error');
            }
        });
    });
}

function eliminarEgreso(id) {
    alertDelete('Eliminar Egreso','¿Desea eliminar el registro seleccionado?');
    $('#btnEliminar').click(function () {
        let token = $('#token').val();
        $.ajax({
            url: '../backend/egresos.php?f=delete',
            type: 'POST',
            data: { token: token, id: id },
            success: function (e) {
                let data = JSON.parse(e);
                if(data.response == 'success'){
                    alertSuccess(data.message);
                    cargarEgresos();
                }else{
                    alertWarning(data.message);
                }
            },
            error: function () {
                alertDanger('Ocurrio un error');
            }
        });
    });
}


//?funcion para cerrar el modal
function cerrarModal(modal) {
    $(modal).addClass('hidden');
}

function limpiarInsertarE() {
    $('#detallee').val('');
    $('#dineroe').val('');
    $('#fechae').val('');
}

$(document).ready(function () {
    $('#btnInsertE').click(function () {
        let detalle = $('#detallee').val();
        let dinero = $('#dineroe').val();
        let fecha = $('#fechae').val();
        let token = $('#token').val();
        $.ajax({
            url: '../backend/egresos.php?f=insert',
            type: 'POST',
            data: { token:token, detalle: detalle, dinero: dinero, fecha: fecha },
            beforeSend: function () {
                $('#btnInsertE').html('Enviando...');
                $('#btnInsertE').attr('disabled', true);
            },
            success: function (e) {
                $('#btnInsertE').html('Agregar Egreso');
                $('#btnInsertE').attr('disabled', false);

                let data = JSON.parse(e);
                if(data.response == 'success'){
                alertSuccess(data.message);
                limpiarInsertarE();
                cargarEgresos();
                }else{
                    alertWarning(data.message);
                }
            },
            error: function () {
                alertDanger('Ocurrio un error');
                $('#btnInsertE').html('Agregar Egreso');
                $('#btnInsertE').attr('disabled', false);
            }
        });
        return false;

    });
});


function limpiarInsertarI() {
    $('#detallei').val('');
    $('#dineroi').val('');
    $('#fechai').val('');
}

$(document).ready(function () {
    $('#btnInsertI').click(function () {
        let detalle = $('#detallei').val();
        let dinero = $('#dineroi').val();
        let fecha = $('#fechai').val();
        let token = $('#token').val();
        $.ajax({
            url: '../backend/ingresos.php?f=insert',
            type: 'POST',
            data: { token:token, detalle: detalle, dinero: dinero, fecha: fecha },
            beforeSend: function () {
                $('#btnInsertI').html('Enviando...');
                $('#btnInsertI').attr('disabled', true);
            },
            success: function (e) {
                $('#btnInsertI').html('Agregar Ingreso');
                $('#btnInsertI').attr('disabled', false);

                let data = JSON.parse(e);
                if(data.response == 'success'){
                alertSuccess(data.message);
                limpiarInsertarI();
                cargarIngresos();
                }else{
                    alertWarning(data.message);
                }
            },
            error: function () {
                alertDanger('Ocurrio un error');
                $('#btnInsertI').html('Agregar Ingreso');
                $('#btnInsertI').attr('disabled', false);
            }
        });
        return false;

    });
});


