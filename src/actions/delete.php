<?php 
require_once "../../env.php";
require "$ENV_DIR /src/models/clienteDao.php";
require "$ENV_DIR/src/pdo.php";
$id = filter_input(INPUT_GET,"id");

if($id){
    $dao = new ClienteDao($pdo);
    $dao->delete($id);
}
header('Location: ../../index.php');