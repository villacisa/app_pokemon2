<?php
    include "config.php";
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $response = array();

    $nombre = $data["nombre"];
    $tipo = $data["tipo"];
    $altura = $data["altura"];
    $peso = $data["peso"];
    $sql = mysqli_query($con, "insert into pokemons(nombre, tipo, altura, peso) VALUES ('$nombre', '$tipo', '$altura', '$peso');");
    if($sql){
        $response["message"] = "OK";
    }else{
        $response["message"] = "KO";
    }
    echo json_encode($response);
?>

