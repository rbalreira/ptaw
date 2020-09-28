$(document).ready(function () {

    function addEmailClass() {
        document.getElementById("email_login").classList.add("is-invalid");
    }

    function addPassClass() {
        document.getElementById("pass_login").classList.add("is-invalid");
    }

    function rmEmailClass() {
        document.getElementById("email_login").classList.remove("is-invalid");
    }

    function rmPassClass() {
        document.getElementById("pass_login").classList.remove("is-invalid");
    }

    function invalid(x) {
        document.getElementsByClassName("alert")[0].style.visibility = x;
    }

    // altera o display dos campos obrigatórios pelo parâmetros do URL que são enviados pelo parent
    var url = new URL(window.location.href);
    var email = url.searchParams.get("e");
    var pass = url.searchParams.get("p");
    var inv = url.searchParams.get("i");

    if (inv != null) invalid("visible");
    else {
        if (email !== null) addEmailClass();
        if (pass !== null) addPassClass();
    }


    $(document).on("submit", "#login_form", function (e) {
        // impede o refresh da página
        e.preventDefault();

        var json = {
            "email": $('#email_login').val(),
            "password": $('#pass_login').val()
        };

        $.ajax({
            url: 'php/getLogin.php',
            type: 'POST',
            data: {
                myData: JSON.stringify(json),
            },
            dataType: 'json',
            cache: false,
            success: function (response) {
                var e = response.erro,
                    c = response.login;
                switch (e) {
                    case "error":
                        invalid("hidden");
                        addEmailClass();
                        addPassClass();
                        break;
                    case "error-email":
                        invalid("hidden");
                        addEmailClass();
                        rmPassClass();
                        break;
                    case "error-pass":
                        invalid("hidden");
                        rmEmailClass();
                        addPassClass();
                        break;
                    case "exception":
                        Swal.fire({
                            type: 'error',
                            title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                        })
                        break;
                    default:
                        if (c === 0) window.open("../admin/estatistica.php", "_self");
                        else if (c === 1) console.log("cliente");
                        else {
                            invalid("visible");
                            rmEmailClass();
                            rmPassClass();
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