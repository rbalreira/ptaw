<?php

try {
    // faz load em array do ficheiro de configuração
    $config = parse_ini_file('../../private/config.ini');

    require "../../libraries/connect_db/connect.php";

    $sql = $conn->prepare("SELECT nome AS tipopedido FROM tipopedido WHERE nome NOT ILIKE '%conta%' ORDER BY nome");
    $sql->execute();

    $json['tipopedidos'] = $sql->fetchAll(PDO::FETCH_ASSOC);
    $json['error'] = 'none';
    echo json_encode($json);

} catch (Exception $e) {
    $json['error'] = 'exception';
    echo json_encode($json);
}