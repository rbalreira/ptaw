$(document).ready(function () {

    //line
    var machines = document.getElementById("maquinas_chart").getContext('2d');
    var canvas = document.getElementsByTagName('canvas')[0];
    canvas.height = 80;

    var myChartLine = new Chart(machines, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Máquinas por distrito',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            }, ]
        },
        options: {
            responsive: true
        }
    });

    // gera os tipos de pedido nas máquinas
    $.ajax({
        url: 'php/getTipoPedido.php',
        type: 'POST',
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response.error === 'none') {
                var txt;
                $.each(response.tipopedidos, function (i, item) {
                    txt += "<option>" + item.tipopedido + "</option>";
                });
                $("#select_maquinas").append(txt);
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