$(document).ready(function() {
    $("#tabela").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "php/listaPedidos.php",
            "type": "POST",
            "dataType": "json",
            "success": function(data){
                var table = "";

                $.each(data.pedidos, function(i, value) {
                    if (value.data_processamento == null) {
                        $processamento = "<td>-</td>\n"
                    } else {
                        $processamento = "<td>" + value.data_processamento + "</td>\n"
                    };
    
                    if (value.data_envio == null) {
                        $envio = "<td>-</td>\n"
                    } else {
                        $envio = "<td>" + value.data_envio + "</td>\n"
                    };
    
                    if (value.data_efetivacao == null) {
                        $efetivacao = "<td>-</td>\n"
                    } else {
                        $efetivacao = "<td>" + value.data_efetivacao + "</td>\n"
                    };

                    table += "<tbody>" +
                    "<tr id=\"row=" + i + "\">\n" + 
                    "<td>" + value.tipopedido + "</td>\n" +
                    "<td>" + value.empresa + "</td>\n" +
                    $envio +
                    $processamento +
                    $efetivacao +
                    "<td>" + value.estado_pedido + "</td>\n" +
                    "<td><span class=\"icons glyphicon glyphicon-remove-sign\" aria-hidden=\"true\"></span></td>\n" +
                    "<td><span class=\"icons glyphicon glyphicon-cog\" aria-hidden=\"true\"></span></td>\n" +
                    "<td>Ver detalhes</td>\n" +
                    "</tr>" +
                    "</tbody>";
                });

                $("#tabela tbody").html(table);
            },
            "error": function() {
                $("tbody").html("Erro de comunicação com o server");
            }
        },
        "language": {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    });

    /*------------------------
        Modal body changes
    ------------------------*/
    $(".modal-body").append("<p>Tipo: Manutenção</p>\n" +
                            "<p>Número de pedido: 2729</p>\n" +
                            "<p>Referência da máquina: 3578374</p>\n" +
                            "<p>Cliente: Prio</p>\n" +
                            "<p>Contacto: 204919191</p>\n" +
                            "<p>Estado da máquina: Funcional</p>\n" +
                            "<p>Módulos: 2</p>\n" +
                            "<p>\n" + 
                                "Localização:<br />\n" +
                                "Distrito: Aveiro <br />\n" +
                                "Concelho: Estarreja <br />\n" +
                                "Freguesia: Avanca <br />\n" +
                                "Código-Postal: 2021-020 <br />\n" +
                                "Rua: S. Lourenço\n" +
                            "</p>\n" +
                            "<p>Data de última manutenção: 10/06/2014</p>\n" +
                            "<p>Data de envio: 10/10/2012</p>\n" +
                            "<p>\n" +
                                "Motivo:\n" +
                                "<input type=\"text\">\n" +
                            "</p>");

    if ($("#continue").click(function() {
        $(".modal-body").empty();
        $(".modal-body").append("<p>Esta ação é irreversível.</p>\n" +
                                "<p>Tem a certeza que quer continuar?</p>");
        
        if ($("#continue").click(function() {
            $(".modal-body").empty();
            $(".modal-body").append("<p>O pedido de manutenção foi cancelado com sucesso.</p>\n" +
                                    "<p><button type=\"button\" class=\"glyphicon glyphicon-ok\" id=\"ok\" aria-hidden=\"true\" style=\"text-align: center\"></button></p>");
            $(".modal-footer").hide();
        }));
    }));

    $("#ok").click(function() {
        // $("#modal-1").css("display","none");
        alert("HI");
    });

    function getPedidos() {
        $.ajax({
            url: "php/listaPedidos.php",
            type: "post",
            dataType: "json",
            cache: false,
            success: function(data){
                var table = "";

                $.each(data.pedidos, function(i, value) {
                    if (value.data_processamento == null) {
                        $processamento = "<td>-</td>\n"
                    } else {
                        $processamento = "<td>" + value.data_processamento + "</td>\n"
                    };
    
                    if (value.data_envio == null) {
                        $envio = "<td>-</td>\n"
                    } else {
                        $envio = "<td>" + value.data_envio + "</td>\n"
                    };
    
                    if (value.data_efetivacao == null) {
                        $efetivacao = "<td>-</td>\n"
                    } else {
                        $efetivacao = "<td>" + value.data_efetivacao + "</td>\n"
                    };

                    table += "<tbody>" +
                    "<tr id=\"row=" + i + "\">\n" + 
                    "<td>" + value.tipopedido + "</td>\n" +
                    "<td>" + value.empresa + "</td>\n" +
                    $envio +
                    $processamento +
                    $efetivacao +
                    "<td>" + value.estado_pedido + "</td>\n" +
                    "<td><span class=\"icons glyphicon glyphicon-remove-sign\" aria-hidden=\"true\"></span></td>\n" +
                    "<td><span class=\"icons glyphicon glyphicon-cog\" aria-hidden=\"true\"></span></td>\n" +
                    "<td>Ver detalhes</td>\n" +
                    "</tr>" +
                    "</tbody>";
                });

                $("#tabela tbody").html(table);
            },
            error: function() {
                $("tbody").html("Erro de comunicação com o server");
            }
        });
    }
})