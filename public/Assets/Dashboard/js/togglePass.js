$(document).ready(function () {
    // old pass
    $("#togglePassword").on("click", function () {
        // Get the password field
        var passwordField = $("#current_password");
        // Get the current type of the password field
        var passwordFieldType = passwordField.attr("type");

        // Toggle the type attribute
        if (passwordFieldType === "password") {
            passwordField.attr("type", "text");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });

    // new pass
    $("#togglePasswordNew").on("click", function () {
        // Get the password field
        var passwordField = $("#new_password");
        // Get the current type of the password field
        var passwordFieldType = passwordField.attr("type");

        // Toggle the type attribute
        if (passwordFieldType === "password") {
            passwordField.attr("type", "text");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });

    // new pass
    $("#togglePasswordReNew").on("click", function () {
        // Get the password field
        var passwordField = $("#new_password_confirmation");
        // Get the current type of the password field
        var passwordFieldType = passwordField.attr("type");

        // Toggle the type attribute
        if (passwordFieldType === "password") {
            passwordField.attr("type", "text");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });
});
