$(document).ready(function() {

    var table = $("#tabela").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "php/listaPedidos.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        },
        "lengthMenu": [ [5, 25, 50, -1], [5, 25, 50, "Todos"] ],
        "responsive": true,
        "select": true,
        "columns": [
            { "data": "tipopedido"},
            { "data": "empresa"},
            { "data": "data_envio"},
            { "data": "data_processamento"},
            { "data": "data_efetivacao"},
            { "data": "estado_pedido"}
        ],
        "columnDefs": [
            {
                "targets": 6,
                "data": null,
                "defaultContent": "<i class=\"fa fa-times\" id=\"cancel\"></i>"
            },
            {
                "targets": 7,
                "data": null,
                "defaultContent": "<i class=\"fa fa-cogs\" id=\"settings\"></i>"
            },
            {
                "targets": 8,
                "data": null,
                "defaultContent": "<a id=\"detalhes\">Ver Detalhes</a>"
            }
        ]
    });

    table.on("select", function(e, dt, type, indexes) {
        table.on('click', '#cancel', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var id = row.data().num_pedido;

            if (row.data().estado_pedido === 'Cancelado') {
                Swal.fire({
                    type: 'warning',
                    text: 'O pedido já foi cancelado'
                })
            } else if (row.data().estado_pedido === 'Aprovado') {
                Swal.fire({
                    type: 'warning',
                    text: 'Não é possível cancelar este pedido'
                })
            } else if (row.data().estado_pedido === 'Pendente') {
                Swal.fire({
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Continuar",
                    type: 'question',
                    html: cancelarPedido(row.data()),
                    title: 'Cancelar pedido',
                    input: 'textarea'
                }),
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "php/updateEstado.php",
                            type: "POST",
                            dataType: "json",
                            data: {id: id},
                            success: function(response) {
                                // if (response.error === 'none') {
                                    Swal.fire({
                                        type: response.status,
                                        text: response.message,
                                        timer: 3000
                                    })
                                // } else {
                                    // Swal.fire({
                                    //     type: response.status,
                                    //     text: response.message,
                                    //     timer: 3000
                                    // })
                                // }
                            }
                        })
                    }
                }
            }
        });

        table.on('click', '#detalhes', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            Swal.mixin({
                html: detalhesPedido(row.data()),
                title: 'Detalhes do pedido',
                confirmButtonText: "Ok!"
            })
        })
    })

    function cancelarPedido(d) {
        return  'Tipo de pedido: ' + d.tipopedido + '<br>' +
                'Número de pedido: ' + d.num_pedido + '<br>' +
                'Referência da máquina: ' + d.num_maquina + '<br>' +
                'Cliente: ' + d.empresa + '<br>' +
                'Contacto: ' + d.contacto + '<br>' +
                'Estado da máquina: ' + d.estado_maquina + '<br>' +
                'Módulos: ' + d.modulos + '<br><br>' +
                '<b><b>Localização</b></b><br>' +
                '<span style:\"text-indent: 50px\">Distrito: ' + d.distrito + '</span><br>' +
                '<span style:\"text-indent: 50px\">Concelho: ' + d.concelho + '</span><br>' +
                '<span style:\"text-indent: 50px\">Localidade: ' + d.localidade + '</span><br>' +
                '<span style:\"text-indent: 50px\">Código-Postal: ' + d.codpostal + '</span><br><br>' +
                'Data da última manutenção: ' + d.ultima_manutencao + '<br>' +
                'Data de envio: ' + d.data_envio + '<br><br>' +
                '<b><b>Motivo</b></b>: <br>'
    }

    function detalhesPedido(d) {
        return  'Tipo de pedido: ' + d.tipopedido + '<br>' +
                'Número de pedido: ' + d.num_pedido + '<br>' +
                'Referência da máquina: ' + d.num_maquina + '<br>' +
                'Cliente: ' + d.empresa + '<br>' +
                'Estado da máquina: ' + d.estado_maquina + '<br>' +
                'Módulos: ' + d.modulos + '<br><br>' +
                '<b><b>Localização</b></b><br>' +
                '<span style:\"text-indent: 50px\">Distrito: ' + d.distrito + '</span><br>' +
                '<span style:\"text-indent: 50px\">Concelho: ' + d.concelho + '</span><br>' +
                '<span style:\"text-indent: 50px\">Localidade: ' + d.localidade + '</span><br>' +
                '<span style:\"text-indent: 50px\">Código-Postal: ' + d.codpostal + '</span><br><br>' +
                'Data da última manutenção: ' + d.ultima_manutencao + '<br>' +
                'Data de envio: ' + d.data_envio + '<br><br>'
    }

})