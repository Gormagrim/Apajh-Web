// Afficher / Masquer le password

$(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
    $("#show_hide_password_verification a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password_verification input').attr("type") == "text") {
            $('#show_hide_password_verification input').attr('type', 'password');
            $('#show_hide_password_verification i').addClass("fa-eye-slash");
            $('#show_hide_password_verification i').removeClass("fa-eye");
        } else if ($('#show_hide_password_verification input').attr("type") == "password") {
            $('#show_hide_password_verification input').attr('type', 'text');
            $('#show_hide_password_verification i').removeClass("fa-eye-slash");
            $('#show_hide_password_verification i').addClass("fa-eye");
        }
    });
    $("#show_hide_password_current a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password_current input').attr("type") == "text") {
            $('#show_hide_password_current input').attr('type', 'password');
            $('#show_hide_password_current i').addClass("fa-eye-slash");
            $('#show_hide_password_current i').removeClass("fa-eye");
        } else if ($('#show_hide_password_current input').attr("type") == "password") {
            $('#show_hide_password_current input').attr('type', 'text');
            $('#show_hide_password_current i').removeClass("fa-eye-slash");
            $('#show_hide_password_current i').addClass("fa-eye");
        }
    });
});

// Afficher / Masquer la modification de profil
$(document).ready(function () {
    $("#modification").on('click', function (event) {
        $('#spanFirstname').hide();
        $('#spanLastname').hide();
        $('#spanCity').hide();
        $('#spanJob').hide();

        $('#firstname').attr('type', 'text');
        $('#lastname').attr('type', 'text');
        $('#city').attr('type', 'text');
        $('#job').attr('type', 'text');
        $('#modification').css('visibility', 'hidden');
        $('#modificationValidation').css('visibility', 'visible');
    });
    $("#modificationValidation").on('click', function (event) {
        $('#modification').css('visibility', 'hidden');
    });
});

