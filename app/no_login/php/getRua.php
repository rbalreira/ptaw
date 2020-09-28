<?php

header("content-type: application/json; charset=utf-8");

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

    $data = json_decode($_POST['myData']);

    $c = test_input($data->codpostal);

    // faz load em array do ficheiro de configuração
    $config = parse_ini_file('../../private/config.ini');

    require "../../libraries/connect_db/connect.php";

    $stmt = $conn->prepare("SELECT id, nome_localidade, rua FROM codpostais WHERE codpostal = :c");
    $stmt->bindParam(':c', $c);
    $stmt->execute();

    $rows = $stmt->rowCount();

    if ($rows > 0) {
        if($rows > 1) $json['results'] = 'upper';
        $json['ruas'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json['error'] = "none";
    } else $json['error'] = 'no_results';

    echo json_encode($json);
} catch (PDOException $e) {
    $json['error'] = 'exception';
    echo json_encode($json);
}
