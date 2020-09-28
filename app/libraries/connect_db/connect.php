<?php

date_default_timezone_set('Europe/Lisbon');

$host = $config['host'];
$port = $config['port'];
$db = $username = $config['db_user'];
$password = $config['password'];

// conexão à BD
$db_conn = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";

$conn = new PDO($db_conn);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
