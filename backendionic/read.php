<?php
    include "config.php";
    $input = file_get_contents('php://input'); //no sería necesario esto?
    $response = array();
    $pokemons = array(); 
    try {
    		$db = new PDO("mysql:host=localhost;dbname=app_pokemon", "adrian", "adrian");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = "SELECT * FROM pokemons";
                $statement= $db->prepare($consulta);
                $statement->execute(array());
                $cuenta = $statement->rowCount();   //numero de pokemons encontrados
                while ($fila=$statement->fetch(PDO::FETCH_ASSOC)){
                    $pokemon = array("id"=>$fila['id'], "nombre"=>$fila['nombre'], "tipo"=>$fila['tipo'], "altura"=>$fila['altura'], "peso"=>$fila['peso']);
                    array_push($response, $pokemon);
                }
                $statement->closeCursor();
            }
            catch (PDOException $e) {
            die ($e->getMessage());
            }
            //array_push($response, $cuenta); AÑADE EL NUMERO DE POKEMONS AL ARRAY (se utilizará para indicar cuantos pokemons se han encontrado)
            echo json_encode($response);
?>
