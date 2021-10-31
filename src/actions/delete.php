<?php 
require '../models/clienteDao.php';

$id = filter_input(INPUT_GET,"id");

if($id){
    $dao = new ClienteDao();
    $dao->delete($id);
}