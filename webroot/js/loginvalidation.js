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

}); 
