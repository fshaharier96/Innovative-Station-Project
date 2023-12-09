(function ($) {
    // 'use strict';
    $(document).ready(function () {
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true

                },

                password: {
                    required: true,
                    minlength: 6,
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email"
                },

                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 6 characters long",
                }
            },
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                error.appendTo(element.parent());
            },

        });


    });

}(jQuery));