function loading(type){
    if(parseInt(type) === 1){
        $('.ajax-loading').show()
    }
    else{
        $('.ajax-loading').hide();
    }
}
$(document).ready(function(){
    $("#show-submenu").click(function(){
        console.log(1);
        if($(this).hasClass("fa-chevron-down")){
            $(this).removeClass("fa-chevron-down");
            $(this).addClass("fa-chevron-up");
        }
        else{
            $(this).addClass("fa-chevron-down");
            $(this).removeClass("fa-chevron-up");
        }
        $(this).parent().find('.sub-menu').toggle();
    });
    $(".open-form-register").click(function () {
        $("#modal-sign-in").modal("hide");
        $("#modal-register").modal("show");
    });
    $(".open-form-login").click(function () {
        $("#modal-register").modal("hide");
        $("#modal-sign-in").modal("show");
    });
    $('.carousel-product').owlCarousel({
        margin:0,
        padding: 100,
        nav:false,
        autoplay:true,
        autoplayTimeout:4000,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
    $('.carousel-detail').owlCarousel({
        loop:true,
        margin:0,
        padding: 100,
        nav:false,
        autoplay:true,
        autoplayTimeout:4000,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('.carousel-top').owlCarousel({
        loop:true,
        margin:0,
        padding: 100,
        nav:false,
        autoplay:true,
        autoplayTimeout:3000,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('.carousel-category').owlCarousel({
        loop:true,
        margin:0,
        padding: 100,
        nav:false,
        autoplay:true,
        autoplayTimeout:4000,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    });
    $('.carousel-new').owlCarousel({
        margin:0,
        padding: 100,
        nav:false,
        autoplay:true,
        autoplayTimeout:4000,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $("#add-to-favorites").click(function () {
        loading(1);
        $.ajax({
            url: urlAdd,
            type: 'POST',
            data: {product_id: $(this).val()},
            success: function (res) {
                loading();
                let data = JSON.parse(res);
                $("#modalMessage .modal-body h4").text(data.message);
                $("#modalMessage .modal-footer a").attr('data-dismiss', 'modal');
                $("#modalMessage").modal("show");
            }
        })
    });
    $(".delete-favorites").click(function () {
        loading(1);
        $.ajax({
            url: urlRemove,
            type: 'POST',
            data: {product_id: $(this).val()},
            success: function (res) {
                console.log(res);
                loading();
                let data = JSON.parse(res);
                $("#modalMessage .modal-body h4").text(data.message);
                $("#modalMessage .modal-footer a").click(function () {
                    window.location.reload();
                })
                $("#modalMessage").modal("show");
            }
        })
    });
    $("#confirm-order").click(function () {
        if ($("#form-order").valid()){
            loading(1);
            $.ajax({
                url: urlMail,
                type : 'POST',
                data: {email: $(this).parent().find('input').val(), id: $("#order").val()},
                success: function (res) {
                    loading();
                    let data = JSON.parse(res);
                    $("#modal-order").modal("show");
                    $("#modalMessage .modal-body h4").text(data.message);
                    $("#modalMessage .modal-footer a").attr('data-dismiss', 'modal');
                    $("#modalMessage").modal("show");
                }
            })
        }
    })
});