<?php

    try {
        // faz load em array do ficheiro de configuração
        $config = parse_ini_file('../../private/config.ini');

        require "../../libraries/connect_db/connect.php";

        // $sql = $conn->prepare("INSERT INTO ")
    } catch (PDOException $e) {

    }

?>