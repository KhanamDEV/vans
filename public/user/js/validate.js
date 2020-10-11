$(document).ready(function () {
    $("#form-order").validate({
        rules:{
            email:{
                required: true,
                email: true,
            }
        }
    });

})