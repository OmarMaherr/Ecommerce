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



    $("form[name='login_form']").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "*",
                email: "*"
            },
            password: {
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
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                url: loginRoute,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    email: email,
                    password: password,
                },
                success: function (response) {
                    console.log(response.message)
                    if (response.message === "Authentication successful") {
                        form.submit();
                    } else {
                        console.log(response.message);
                        $(".login_error").text(response.message).addClass("show");
                        // $(".login_error").addClass("show");
                    }
                }
            });


        }
    });



    $.validator.addMethod("checkEmail", function(value, element) {
        var email = $("#email").val();
        var result = false;
        $.ajax({
            url: CheckEmailRoute,
            type: 'post',
            async: false, // Ensure synchronous request
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                email: value,
            },
            success: function(response) {
                result = !response.exists;
            }
        });
        return result;
    }, "This Email Already Used");



    $("form[name='register_form']").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 40
            },
            email: {
                required: true,
                email: true,
                checkEmail: true
            },
            password: {
                required: true,
                minlength: 3,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            }
        },
        messages: {
            name: {
                required: "*",
                minlength: "*",
                maxlength: "*"
            },
            email: {
                required: "*",
                email: "*"
            },
            password: {
                required: "*",
                minlength: "*",
            },
            password_confirmation: {
                required: "*",
                equalTo: "Please Confirm Password Correctly"
            }
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
