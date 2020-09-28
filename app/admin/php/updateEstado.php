<?php

    try {
        // faz load em array do ficheiro de configuração
        $config = parse_ini_file('../../private/config.ini');

        require "../../libraries/connect_db/connect.php";

        $id = $_POST['id'];

        $pid = intval($id);
        $sql = $conn->prepare("UPDATE pedido SET estadopedido_id = '2' WHERE id = :pid");
        $sql->execute(array(':pid' => $pid));

        $response['status'] = 'success';
        $response['message'] = "O pedido de ' + row.data().tipopedido + ' foi cancelado com sucesso";
        $response['error'] = 'none';

        echo json_encode($response);
    } catch (PDOException $e) {
        $response['error'] = $e->getMessage();
        $response['status'] = 'error';
        $response['message'] = 'Não foi possivel cancelar o pedido';
        
        echo json_encode($response);
    }

?>