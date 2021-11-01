<?php
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    
    //http://localhost/sistema_php/api/consultar.php
    $conexion = new mysqli('localhost', 'root', '', 'sistema') or die ('not connected' .mysqli_connect_error());
    
    $sql = "SELECT * FROM `clientes`";

    $result = mysqli_query($conexion, $sql);
    
    $clientes = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($clientes, $row);
    }

    echo json_encode($clientes);
    
    mysqli_free_result($result);
    mysqli_close($conexion);
?>