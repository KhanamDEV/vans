$(document).ready(function () {

    $("#form-add-category").validate({
        ignore: [],
        rules: {
            name: {
                required: true
            }
        },
    });
    $("#form-new-product").validate({
        ignore: [],
        rules: {
            name: "required",
            price: {
                required: true,
                number: true
            },
            image_one: {
                required: true,
                extension: "png|jpg|jpeg"
            },
            image_two: {
                required: true,
                extension: "png|jpg|jpeg"
            },
            image_three: {
                required: true,
                extension: "png|jpg|jpeg"
            },
            image_four: {
                required: true,
                extension: "png|jpg|jpeg"
            },
            content: {
                required: true,
                minlength: 10
            }
        },
    });
    $("#form-new-product").validate({
        ignore: [],
        rules: {
            name: "required",
            price: {
                required: true,
                number: true
            },
            image_one: {
                required: true,
            },
            image_two: {
                required: true,
            },
            image_three: {
                required: true,
            },
            image_four: {
                required: true,
            },
            content: {
                required: true,
                minlength: 10
            }
        },
    });
    $("#form-new-post").validate({
        ignore: [],
        rules: {
            title: "required",
            thumbnail: {
                required: true,
                extension: "png|jpg|jpeg"
            },
            description: {
                required: true,
            },
            content: {
                required: function(textarea) {
                    CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                    return editorcontent.length === 0;
                },
                minlength: 10
            }
        }
    })
})