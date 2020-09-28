<?php

header("content-type: application-json; charset=utf-8");

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

    $email = test_input($data->email);
    $pass = test_input($data->password);

    if (empty($email) and empty($pass)) $json['erro'] = 'error';
    else if (empty($email)) $json['erro'] = 'error-email';
    else if (empty($pass)) $json['erro'] = 'error-pass';
    else {
        // faz load em array do ficheiro de configuração
        $config = parse_ini_file('private/config.ini');

        require "libraries/connect_db/connect.php";

        $stmt = $conn->prepare("SELECT getLogin(:email,:pass)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();

        $result = $stmt->fetch();

        $json['login'] = $result["getlogin"];
        $json['erro'] = 'none';
    }

    echo json_encode($json);
    
} catch (PDOException $e) {
    $json['erro'] = 'exception';
    echo json_encode($json);
}