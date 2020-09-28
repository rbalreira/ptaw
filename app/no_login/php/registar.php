<?php

header('content-type: application/json; charset=utf-8');

// valida o form
function test_input($data)
{
    // remove espaços em branco
    $data = trim($data);
    // remove os backslashes ("\")
    $data = stripslashes($data);
    // converte os caracteres especiais em HTML entities
    $data = htmlspecialchars($data);
    return $data;
}

try {
    // faz load em array do ficheiro de configuração
    $config = parse_ini_file('../../private/config.ini');

    require "../../libraries/connect_db/connect.php";

    $data = json_decode($_POST['myData']);
    $json;
    $name = test_input($data->name);
    $email = test_input($data->email);
    $nif = test_input($data->nif);
    $num = test_input($data->num);
    $codpostal_id = $data->codpostal_id;

    $stmt = $conn->prepare("SELECT id FROM tipopedido WHERE nome ILIKE '%Registo%'");
    $stmt->execute();

    $tipo = $stmt->fetch();

    $stmt = $conn->prepare("SELECT id FROM estadopedido WHERE nome ILIKE '%Pendente%'");
    $stmt->execute();

    $estado = $stmt->fetch();

    $stmt = $conn->prepare("INSERT INTO pedido (codpostais_id, estadopedido_id, 
            tipopedido_id, empresa_cliente, email_cliente, nif_cliente, contacto_cliente)
            VALUES (:codpostal, :estado, :tipo, :empresa, :email, :nif, :contacto)");

    $stmt->bindParam(':codpostal', $codpostal_id);
    $stmt->bindParam(':estado', $estado['id']);
    $stmt->bindParam(':tipo', $tipo['id']);
    $stmt->bindParam(':empresa', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nif', $nif);
    $stmt->bindParam(':contacto', $num);
    $stmt->execute();

    $result = $stmt->fetch();

    $json['error'] = 'none';

    echo json_encode($json);
} catch (Exception $e) {
    $json['error'] = 'exception';
    echo json_encode($json);
}
