// Afficher / Masquer le password

$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
    $("#show_hide_password_verification a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password_verification input').attr("type") == "text"){
            $('#show_hide_password_verification input').attr('type', 'password');
            $('#show_hide_password_verification i').addClass( "fa-eye-slash" );
            $('#show_hide_password_verification i').removeClass( "fa-eye" );
        }else if($('#show_hide_password_verification input').attr("type") == "password"){
            $('#show_hide_password_verification input').attr('type', 'text');
            $('#show_hide_password_verification i').removeClass( "fa-eye-slash" );
            $('#show_hide_password_verification i').addClass( "fa-eye" );
        }
    });
});