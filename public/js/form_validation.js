//Check Out Form

$(function () {
    $("form[name='checkout_form']").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            city: {
                required: true,
            },
        },
        messages: {
            first_name: {
                required: "*",
            },
            last_name: {
                required: "*",
            },
            phone_number: {
                required: "*",
            },
            email: {
                required: "*",
                email: "*"
            },
            city: {
                required: "*",
            },
        },

        errorPlacement: function (error, element) {
            var label = element.closest('.form-group').find('label');

            error.insertAfter(label);


        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("invalid").removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("invalid").addClass(validClass);
        },
        submitHandler: function (form) {
                form.submit();
        }
    });
});
