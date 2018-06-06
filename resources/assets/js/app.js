require('./bootstrap');
$(window).resize(function(){
    var width = $("#ul-menu").width();
    var liw = 0;
    $("#ul-menu li").each(function(){
        liw = liw + parseInt($(this).width());
    });
    var ml = (width - liw) / 8 - 5;
    $("#ul-menu li").css('margin-left', ml + 'px');
    $("#ul-menu li:first").css('margin-left', '0px');
});
$(document).ready(() => {
    $(document).foundation();
    $(".black-fixed").click(function () {
        $(this).fadeOut(500)
    });
    var width = $("#ul-menu").width();
    var liw = 0;
    $("#ul-menu li").each(function(){
        liw = liw + parseInt($(this).width());
    });
    var ml = (width - liw) / 8 - 5;
    $("#ul-menu li").css('margin-left', ml + 'px');
    $("#ul-menu li:first").css('margin-left', '0px');
    $(".hover-cat").mouseenter(function (e) {
        $(this).find(".cat-hover").stop().animate({
            top: 0,
            left: 0,
            opacity: 1
        }, 300);
    });

    $(".hover-cat").mouseleave(function (e) {
        $(this).find(".cat-hover").stop().animate({
            top: 100,
            left: -100,
            opacity: 0
        }, 300);
    });

    // $(".a-menu").mouseenter(function (e) {
    //     $(".menu-contain").css('opacity', 0).css('z-index', -1);
    //     $("#"+$(this).attr('data-id')).css('z-index', 2).animate({opacity: 1}, 300);
    // });
    //
    // $(".menu-contain").mouseleave( function () {
    //     $(this).css('opacity', 0).css('z-index', -1);
    // });

    $("#m-account, #m-account-2").click(function () {
        $(".opc-account").fadeToggle(300)
        $(".menu-contain").css('opacity', 0).css('z-index', -1);
    });

    $(document).on("formvalid.zf.abide", function(ev,frm) {
        if (ev.target.id === 'account') {
            $.ajax({
                type: "POST",
                url: '/client-updated',
                dataType: 'json',
                data: $("#account").serialize(),
                statusCode: {
                    201: function () {
                        swal({
                                title: "Actualización Exitosa!",
                                text: "",
                                confirmButtonText: "Ir al carrito",
                                showCancelButton: true,
                                cancelButtonText: "Ir al inicio",
                                animation: "slide-from-top"
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    location.href="/carrito";
                                } else {
                                    location.href="/";
                                }
                            });

                    },
                    501: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                    },
                    500: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                    }
                }
            });
        }

        if (ev.target.id === 'address') {
            $.ajax({
                type: "POST",
                url: '/address',
                dataType: 'json',
                data: $("#address").serialize(),
                statusCode: {
                    201: function () {
                        swal({
                                title: "Solicitud exitosa!",
                                text: "",
                                confirmButtonText: "OK",
                                animation: "slide-from-top"
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    location.href="/direcciones";
                                }
                            });

                    },
                    501: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                    },
                    500: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                    }
                }
            });
        }

        if (ev.target.id === 'changePassword') {
            $.ajax({
                type: "POST",
                url: '/change-password',
                dataType: 'json',
                data: $("#changePassword").serialize(),
                statusCode: {
                    201: function (data) {
                        console.log(data);
                        swal({
                                title: data.Message,
                                text: "",
                                confirmButtonText: "OK",
                                animation: "slide-from-top"
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });

                    },
                    501: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                    },
                    500: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                    }
                }
            });
        }


    }).on('submit', function (e) {
        if (e.target.id !== 'register' && e.target.id !== 'login') {
            e.preventDefault();
        }


    });

    $("#finish").click( function (e) {
        $.ajax({
            type: "POST",
            url: '/buy',
            dataType: 'json',
            data: 'address_id='+$("#address").val(),
            statusCode: {
                200: function (data) {
                    cargar(data.reference);

                },
                409: function () {
                    swal('¡Lo sentimos!', 'La dirección seleccionada no es de su propiedad.');
                },
                501: function () {
                    swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                },
                500: function () {
                    swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                }
            }
        });
    });

    $(".delete_address").click( function (e) {
        $.ajax({
            type: "POST",
            url: '/address',
            dataType: 'json',
            data: "id="+$(this).attr('data-id')+"&action=delete",
            statusCode: {
                201: function () {
                    swal({
                            title: "Se eliminó la dirección exitosamente!",
                            text: "",
                            confirmButtonText: "OK",
                            animation: "slide-from-top"
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });

                },
                501: function () {
                    swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                },
                500: function () {
                    swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.');
                }
            }
        });
    });

    $("#country").change(function(){
        var country= $(this).val();
        $.ajax({
            async:true,
            type: "POST",
            dataType: "json",
            url:"/country",
            data:{id:country,action:'distric'},
            success:function(datos){
                $('.opciones_d .opcioneD').remove();
                $.each(datos, function(index, d) {
                    $('.opciones_d').append('<option class="opcioneD" value="'+d.id+'">'+d.DisNombre+'</option> ');
                });
            }
        });
    });
    $("#distric").change(function(){
        var distric= $(this).val();
        $.ajax({
            async:true,
            type: "POST",
            dataType: "json",
            url:"/country",
            data:{id:distric,action:'city'},
            success:function(datos){
                $('.opciones_c .opcioneV').remove();
                $.each(datos, function(index, c) {
                    $('.opciones_c').append('<option class="opcioneV" value="'+c.id+'">'+c.CiuNombre+'</option> ');
                });
            }
        });
    });
    $("[name=radioAddress]").click(function () {
        if ($(this).is(":checked")) {
            $(".continue").attr("href", "/pagar/"+$(this).val());
        }
    });
    $(".info-address").click(function () {
        $(this).find('.radio').attr('checked', true);
        $(".continue").attr("href", "/pagar/"+$(this).attr('data-id'));
    });

});



