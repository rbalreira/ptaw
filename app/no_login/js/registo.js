$(document).ready(function () {

    var ruas = [];

    function checkEmpty(r) {
        return r.name === 'empty' || r.email === 'empty' || r.nif === 'empty' ||
            r.num === 'empty' || r.codpostal === 'empty' || r.region === 'empty';
    }

    function setVisible(id, visibility) {
        document.getElementById(id).style.visibility = visibility;
    }

    function addClass(id) {
        document.getElementById(id).classList.add("is-invalid");
    }

    function removeClass(id) {
        document.getElementById(id).classList.remove("is-invalid");
    }

    // quando clica no Iniciar sessão
    $("#login_button").click(function () {
        window.open("login.php", "_self");
    });

    // preenche o hífen de forma automática no keypress do código-postal
    $("#codpostal").keyup(function () {
        var value = $(this).val();

        $.ajax({
            url: 'php/getRua.php',
            type: 'POST',
            data: {
                myData: JSON.stringify({
                    "codpostal": value
                }),
            },
            dataType: 'json',
            cache: false,
            success: function (response) {
                if (response.error === 'none') {
                    var txt = "";
                    ruas = [];
                    $.each(response.ruas, function (i, item) {
                        ruas.push(item);
                        if (item.nome_localidade === null && item.rua !== null)
                            txt += "<option>" + item.rua + "</option>";
                        else if (item.nome_localidade !== null && item.rua === null)
                            txt += "<option>" + item.nome_localidade + "</option>";
                        else txt += "<option>" + item.rua + ", " + item.nome_localidade + "</option>";
                    });
                    if (response.results === 'upper') $("#region").html("<option>Região</option>" + txt);
                    else $("#region").html(txt);
                    if ($('#region').is(':disabled')) $('#region').prop('disabled', false);
                } else if (response.error === 'no_results') {
                    if ($('#region').is(':enabled')) {
                        $("#region").html("<option>Região</option>");
                        $('#region').prop('disabled', true);
                    }
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                    })
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

    function insert(codpostal_id) {

        var json = {
            "name": $('#name').val(),
            "email": $('#email').val(),
            "nif": $('#nif').val(),
            "num": $('#number').val(),
            "codpostal_id": codpostal_id,
        };

        $.ajax({
            url: 'php/registar.php',
            type: 'POST',
            data: {
                myData: JSON.stringify(json),
            },
            dataType: 'json',
            cache: false,
            success: function (response) {
                if (response.error === 'none')
                Swal.fire({
                    type: 'success',
                    title: 'O pedido foi submetido com sucesso!',
                    text: "Irá receber em breve um e-mail com a confirmação do registo de conta."
                }).then(function() {
                    window.open("../index.php", "_self");
                });
                else
                    Swal.fire({
                        type: 'error',
                        title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                    })
            },
            error: function () {
                Swal.fire({
                    type: 'error',
                    title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                })
            }
        });
    }

    $(document).on("submit", "#registo_form", function (e) {
        e.preventDefault();
        var region = $("#region").val(),
            codpostal_id = '';

        if (region !== 'Região') {
            if (ruas.length === 1) {
                codpostal_id = ruas[0].id;
            } else {
                for (var i = 0; i < ruas.length; i++) {
                    var local = ruas[i].nome_localidade,
                        rua = ruas[i].rua;
                    if (local !== null && rua !== null) {
                        if ((rua + ", " + local) == region) {
                            codpostal_id = ruas[i].id;
                            break;
                        }
                    } else {
                        if (local !== null) {
                            if (rua == region) {
                                codpostal_id = ruas[i].id;
                                break;
                            }
                        } else {
                            if (local == region) {
                                codpostal_id = ruas[i].id;
                                break;
                            }
                        }
                    }
                }
            }
        }

        var json = {
            "name": $('#name').val(),
            "email": $('#email').val(),
            "nif": $('#nif').val(),
            "num": $('#number').val(),
            "codpostal": $('#codpostal').val(),
            "codpostal_id": codpostal_id,
            "region": $('#region').val(),
        };

        $.ajax({
            url: 'php/validateRegisto.php',
            type: 'POST',
            data: {
                myData: JSON.stringify(json),
            },
            dataType: 'json',
            cache: false,
            success: function (response) {
                if (response.error === 'none') {
                    Swal.fire({
                        title: 'Tem a certeza?',
                        text: "Está prestes a submeter pedido de registo de conta. Tem a certeza de" +
                            " que quer continuar?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.value) insert(codpostal_id);
                    })
                } else if (response.error === 'exception') {
                    Swal.fire({
                        type: 'error',
                        title: 'Ocorreu um erro de comunicação. Por favor tente mais tarde.',
                    })
                } else {
                    if (checkEmpty(response))
                        document.getElementById("required_fields").style.visibility = 'visible';

                    if (response.name === 'empty') setVisible("empty_name", "visible");
                    else setVisible("empty_name", "hidden");
                    if (response.email === 'empty') {
                        removeClass("email");
                        setVisible("empty_email", "visible");
                    } else setVisible("empty_email", "hidden");
                    if (response.nif === 'empty') {
                        removeClass("nif");
                        setVisible("empty_nif", "visible");
                    } else setVisible("empty_nif", "hidden");
                    if (response.num === 'empty') {
                        removeClass("number");
                        setVisible("empty_num", "visible");
                    } else setVisible("empty_num", "hidden");
                    if (response.codpostal === 'empty') {
                        removeClass("codpostal");
                        setVisible("empty_codpostal", "visible");
                    } else setVisible("empty_codpostal", "hidden");
                    if (response.region === 'empty') setVisible("empty_region", "visible");
                    else setVisible("empty_region", "hidden");

                    if (!checkEmpty(response))
                        document.getElementById("required_fields").style.visibility = 'hidden';

                    if (response.email == 'invalid') {
                        setVisible("empty_email", "hidden");
                        addClass("email");
                    } else removeClass("email");
                    if (response.nif === 'invalid') {
                        setVisible("empty_nif", "hidden");
                        addClass("nif");
                    } else removeClass("nif");
                    if (response.num === 'invalid') {
                        setVisible("empty_num", "hidden");
                        addClass("number");
                    } else removeClass("number");
                    if (response.codpostal === 'invalid') {
                        setVisible("empty_codpostal", "hidden");
                        addClass("codpostal");
                    } else removeClass("codpostal");
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