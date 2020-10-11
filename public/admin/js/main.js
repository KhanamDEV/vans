function loading(type){
    if(parseInt(type) === 1){
        $('.ajax-loading').show()
    }
    else{
        $('.ajax-loading').hide();
    }
}
$(document).ready(function () {
    $(".reload").click(function () {
        window.location.reload();
    });
    // $(".button-submit-modal").click(function () {
    //     $(this).parent().parent().find('form').submit();
    // });

    function checkFooter() {
        let footer = $('#wrap-footer-admin-login');
        let main = $('#wrap-login-admin');
        let header = $('#wrap-header');
        let heightDevice = document.documentElement.clientHeight;
        if (footer.outerHeight() + main.outerHeight() + header.outerHeight()  < heightDevice){
            footer.addClass('position');
        }
        else{
            footer.removeClass('position');
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log('.preview' + $(input).attr('id') + 'img');
            reader.onload = function (e) {
                $('.preview' + $(input).attr('id') + 'img')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.form-control-file').change(function () {
        readURL($(this));
    });
    checkFooter();
    $(window).resize(function () {
        checkFooter();
    });
});