$(document).ready(function () {

    $("#btnLogin").click(function () {
        loading(1);
        let email = $("#inputEmail").val();
        let password = $("#inputPassword").val();
        let checked = $("#remember").is(":checked");
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email, password: password, remember: checked},
            success: function (res) {
                loading();
                $(".alert-danger").hide();
                $("#errorPassword").hide();
                $("#errorEmail").hide();
                $("#failed-login").hide();
                let data = JSON.parse(res);
                if (data.status) {
                    window.location.replace(data.response.url);
                }
                if (data.response.error_email !== "") {
                    $("#errorEmail").show();
                    $("#errorEmail").text(data.response.error_email);
                    $("#inputPassword").val("");
                }
                if (data.response.error_password !== "") {
                    $("#errorPassword").show();
                    $("#errorPassword").text(data.response.error_password);
                }
                if (data.message !== "") {
                    $("#failed-login").show();
                    $("#failed-login").text(data.message);
                }
            },
            error: function (request, status, error) {
                loading();
                $(".alert-danger").show();
                $(".alert-danger").text("Có lỗi xảy ra vui lòng thử lại !");
            }
        });
    });

    $("#add-category").click(function () {
        if ($("#form-add-category").valid()){
            loading(1);
            $.ajax({
                url : urlCreate,
                type: 'POST',
                data: {name : $(this).parent().parent().find("input#inputName").val()},
                success: function (res) {
                    loading();
                    let data = JSON.parse(res);
                    $("#modalAdd").modal("hide");
                    $("#modalMessage .modal-body h4").text(data.message);
                    if (data.status) {
                        $("#modalMessage .modal-footer a").click(function () {
                            window.location.reload();
                        })
                    } else {
                        $("#modalMessage .modal-footer a").attr('data-dismiss', 'modal');
                    }
                    $("#modalMessage").modal("show");
                }
            });
        }
    })

    $(".update-category").click(function () {
        let parent = $(this).parent().parent().parent();
        let val = parent.find('input').val();
        let id = $(this).val();
        if (val.replace(' ', "") == ""){
            parent.find('span').text('Không được rỗng !');
        }
        else{
            loading(1);
            $.ajax({
                url: urlUpdate,
                type: 'POST',
                data: {id: id, name: val},
                success: function (res) {
                    loading();
                    let data = JSON.parse(res);
                    $("#modalMessage .modal-body h4").text(data.message);
                    if (data.status) {
                        $("#modalMessage .modal-footer a").click(function () {
                            window.location.reload();
                        })
                    } else {
                        $("#modalMessage .modal-footer a").attr('data-dismiss', 'modal');
                    }
                    $("#modalMessage").modal("show");
                }
            })
        }
    });

    $(".delete-category").click(function () {
        loading(1);
        $.ajax({
            url: urlDelete,
            type: 'POST',
            data: {id: $(this).val()},
            success: function (res) {
                loading();
                let data = JSON.parse(res);
                $("#modalMessage .modal-body h4").text(data.message);
                if (data.status) {
                    $("#modalMessage .modal-footer a").click(function () {
                        window.location.reload();
                    })
                } else {
                    $("#modalMessage .modal-footer a").attr('data-dismiss', 'modal');
                }
                $("#modalMessage").modal("show");
            }
        })
    });

    $(".delete-post").click(function () {
        loading(1);
        $.ajax({
            url: urlDelete,
            type: 'POST',
            data: {id: $(this).val()},
            success: function (res) {
                loading();
                let data = JSON.parse(res);
                $("#modalMessage .modal-body h4").text(data.message);
                if (data.status) {
                    $("#modalMessage .modal-footer a").click(function () {
                        window.location.reload();
                    })
                } else {
                    $("#modalMessage .modal-footer a").attr('data-dismiss', 'modal');
                }
                $("#modalMessage").modal("show");
            }
        })
    });



});