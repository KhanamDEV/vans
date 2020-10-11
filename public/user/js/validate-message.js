jQuery.extend(jQuery.validator.messages, {
    equalTo: "Mật khẩu xác nhận không chính xác !",
    required: "Vui lòng không để trống !",
    email: "Vui lòng nhập đúng định dạng email !",
    extension: "Vui lòng chọn đúng định dạng ảnh !",
    number: "Vui lòng chỉ nhập số !",
    minlength: jQuery.validator.format("Vui lòng nhập trên {0} kí tự !"),
    length: jQuery.validator.format("Vui lòng nhập đúng {0} kí tự !"),
});