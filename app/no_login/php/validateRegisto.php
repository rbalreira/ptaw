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

// função que verifica o código-postal
function checkCodPostal($cod)
{
    return preg_match("/^[0-9]{4}-[0-9]{3}$/", $cod) and between((int)substr($cod, 0, 4), 1000, 9999)
        and between((int)substr($cod, 5, 8), 100, 999);
}

function between($x, $min, $max)
{
    return $x >= $min and $x <= $max;
}

// função que verifica o nif
function checkNIF($nif, $ignoreFirst = true)
{
    if (!is_numeric($nif) || strlen($nif) != 9) return false;
    else {
        $nifSplit = str_split($nif);
        if (
            in_array($nifSplit[0], array(1, 2, 5, 6, 8, 9))
            ||
            $ignoreFirst
        ) {
            $checkDigit = 0;
            for ($i = 0; $i < 8; $i++) $checkDigit += $nifSplit[$i] * (10 - $i - 1);
            $checkDigit = 11 - ($checkDigit % 11);
            if ($checkDigit >= 10) $checkDigit = 0;
            if ($checkDigit == $nifSplit[8]) return true;
            else return false;
        } else return false;
    }
}

// função que verifica o email
function checkEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// função que verifica o contacto
function checkContacto($num)
{
    return is_numeric($num) and strlen($num) == 9;
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
    $codpostal = test_input($data->codpostal);
    $codpostal_id = $data->codpostal_id;
    $region = test_input($data->region);
    $invalid = false;

    if (empty($name)) {
        $json['name'] = 'empty';
        $invalid = true;
    }
    if (empty($email)) {
        $json['email'] = 'empty';
        $invalid = true;
    } else {
        if (!checkEmail($email)) {
            $json['email'] = 'invalid';
            $invalid = true;
        }
    }
    if (empty($nif)) {
        $json['nif'] = 'empty';
        $invalid = true;
    } else {
        if (!checkNIF($nif)) {
            $json['nif'] = 'invalid';
            $invalid = true;
        }
    }
    if (empty($num)) {
        $json['num'] = 'empty';
        $invalid = true;
    } else {
        if (!checkContacto($num)) {
            $json['num'] = 'invalid';
            $invalid = true;
        }
    }
    if (empty($codpostal_id)) {
        if (empty($codpostal)) {
            $json['codpostal'] = 'empty';
            $invalid = true;
        } else {
            if (checkCodPostal($codpostal) and (empty($region) or $region === 'Região')) {
                $json['region'] = 'empty';
                $invalid = true;
            } else {
                if (!checkCodPostal($codpostal)) {
                    $json['codpostal'] = 'invalid';
                    $invalid = true;
                }
            }
        }
    }

    if ($invalid) $json['error'] = 'invalid';
    else $json['error'] = 'none';

    echo json_encode($json);
} catch (Exception $e) {
    $json['error'] = 'exception';
    echo json_encode($json);
}
