$(document).ready(function () { 
    $('#login-signin input[type="submit"]').click(function () {
        resetErrors();
        data = {};
        data["email"] = $('#login-signin input[type="email"]').val();
        data["password"] = $('#login-signin input[type="password"]').val();
        data["validation"] = true;
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: 'process-login.php',
            data: data,
            success: function (resp) {
                if (resp === true) {
                    $('#login-signin').submit();
                    return false;
                } else {
                    $.each(resp, function (k, v) {
                        console.log(k + " => " + v);
                        var error_msg = '<span class="error">' + v + '</span>';
                        $('#login-signin input[name="' + k + '"]').after(error_msg);
                        return false;
                    });
                    var keys = Object.keys(resp);
                    $('#login-signin input[name="' + keys[0] + '"]').focus();
                }
            },
            error: function () {
                console.log('Algo ha petado');
            }
        });
        return false;
    });
});