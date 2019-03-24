$(document).ready(function () {
    $('#loginForm').validate({
        rules: {
            email_phone: {
                required: true,
                email: false,
                maxlength: 20
            },
            password: {required: true},
        }
    });
    $('#userForm').validate({
        rules: {
            email_phone: {
                required: true,
                maxlength: 20
            },
            name: {
                required: true,
            },
            surname: {
                required: true,
            },

            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#password",
            },
        }
    });

}); 
