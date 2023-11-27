<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/categoria.php");
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["ap"]){
        case "GetAll":
            $datos = $categoria-> get_categorias();
            echo json_encode($datos);
        break;

        case "GetId":
            $datos = $categoria-> get_categorias_x_id($body["cat_Id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            $datos = $categoria-> insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo "Agregado Exitosamente";
        break;

        case "update":
            $datos = $categoria-> update_categoria($body["cat_Id"],$body["cat_nom"],$body["cat_obs"]);
            echo "Registro modificado";
        break;

        case "delete":
            $datos = $categoria-> delete_categoria($body["cat_Id"]);
            echo "Eliminado Correctamente";
        break;
    }
?>