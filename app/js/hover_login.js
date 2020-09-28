$(document).ready(function () {

    $(document).on("submit", "#hover_login_form", function (e) {

        e.preventDefault();

        var json = {
            "email": $('#hover_email').val(),
            "password": $('#hover_pass').val()
        };

        $.ajax({
            url: 'no_login/php/getLogin.php',
            type: 'POST',
            data: {
                myData: JSON.stringify(json),
            },
            dataType: 'json',
            cache: false,
            success: function (response) {
                var e = response.erro,
                    c = response.login,
                    email = "required_email",
                    pass = "required_pass";
                switch (e) {
                    case "error":
                        w = window.open("no_login/login.php?e=" + email + "&p=" + pass, "_self");
                        break;
                    case "error-email":
                        w = window.open("no_login/login.php?e=" + email, "_self");
                        break;
                    case "error-pass":
                        w = window.open("no_login/login.php?p=" + pass, "_self");
                        break;
                    case "exception":
                        Swal.fire({
                            type: 'error',
                            title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                        })
                        break;
                    default:
                        if (c === 0) window.open("admin/estatistica.php", "_self");
                        else if (c === 1) console.log("cliente");
                        else {
                            w = window.open("no_login/login.php?i=alert", "_self");
                        }
                }

            },
            error: function () {
                Swal.fire({
                    type: 'error',
                    title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                })
            }
        });

    });
});