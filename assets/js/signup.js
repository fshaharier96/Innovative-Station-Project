(function ($) {
    // 'use strict';
    $(document).ready(function () {
        $("#signupForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true

                },

                first_name: {
                    required: true,
                },

                last_name: {
                    required: true,
                },

                password: {
                    required: true,
                    minlength: 6,
                },

                confirm_password: {
                    required: true,
                    minlength: 6,
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email"
                },
                first_name:{
                    required: "Please enter your first name"
                },

                last_name:{
                    required: "Please enter your last name"
                },

                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 6 characters long",
                },
                confirm_password: {
                    required: "Please enter  confirm password",
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