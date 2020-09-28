<?php

// faz load em array do ficheiro de configuração
$config = parse_ini_file('../../private/config.ini');

$host = $config['host'];
$port = $config['port'];
$db = $username = $config['db_user'];
$password = $config['password'];

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'ver_pedidos';
 
// Table's primary key
$primaryKey = 'referencia';
 
/* Array of database columns which should be read and sent back to DataTables. 
The `db` parameter represents the column name in the database, 
while the `dt` parameter represents the DataTables column identifier. 
In this case simple indexes */
$columns = array(
    array( 'db' => 'tipopedido', 'dt' => 'tipopedido' ),
    array( 'db' => 'empresa',  'dt' => 'empresa' ),
    array( 'db' => 'data_envio', 'dt' => 'data_envio' ),
    array( 'db' => 'data_processamento', 'dt' => 'data_processamento' ),
    array( 'db' => 'data_efetivacao', 'dt' => 'data_efetivacao' ),
    array( 'db' => 'estado_pedido', 'dt' => 'estado_pedido' ),
    array( 'db' => 'referencia', 'dt' => 'num_pedido' ),
    array( 'db' => 'ref_maquina', 'dt' => 'num_maquina' ),
    array( 'db' => 'estado_maquina', 'dt' => 'estado_maquina' ),
    array( 'db' => 'modulos', 'dt' => 'modulos' ),
    array( 'db' => 'distrito', 'dt' => 'distrito' ),
    array( 'db' => 'concelho', 'dt' => 'concelho' ),
    array( 'db' => 'nome_localidade', 'dt' => 'localidade' ),
    array( 'db' => 'codpostal', 'dt' => 'codpostal' ),
    array( 'db' => 'ultima_manutencao', 'dt' => 'ultima_manutencao' ),
    array( 'db' => 'motivo', 'dt' => 'motivo' ),
    array( 'db' => 'contacto', 'dt' => 'contacto')
);
 
// SQL server connection information
$sql_details = array(
    'user' => $username,
    'pass' => $password,
    'db'   => $db,
    'host' => $host
);
  
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

// header("content-type: application/json; charset=utf-8");

// try {

//     // faz load em array do ficheiro de configuração
//     $config = parse_ini_file('../../private/config.ini');

//     require "../../libraries/connect_db/connect.php";

//     $statement = $conn->prepare("SELECT tipopedido, empresa, data_envio, data_processamento, data_efetivacao, estado_pedido
//                                  FROM ver_pedidos");
//     $statement->execute();

    

//     $json['pedidos'] = $statement->fetchAll(PDO::FETCH_BOTH);
//     // while ($json['pedidos'] = $statement->fetchAll(PDO::FETCH_BOTH)) {
//     //     $recordsTotal = $json['pedidos']->rowCount();
//     // }

//     echo json_encode($json);
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }

?>