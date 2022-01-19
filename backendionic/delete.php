<?php
    include "config.php";
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $response = array();

    $id = $data["id"];
    $response["message"] = $id;
    
    try {
        $db = new PDO("mysql:host=localhost;dbname=app_pokemon", "adrian", "adrian");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "DELETE FROM pokemons WHERE id=?";
        $statement= $db->prepare($consulta);
        $statement->execute(array($id));
        $statement->closeCursor();
        $response["message"] = "OK";
    }
    catch (PDOException $e) {
        $response["message"] = "KO";
    die ($e->getMessage());
    }
    echo json_encode($response);
?>
