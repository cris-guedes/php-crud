<?php
require_once "../../env.php";
 require "$ENV_DIR/src/entities/cliente.php";
 require "$ENV_DIR/src/models/clienteDao.php";
 require "$ENV_DIR/src/pdo.php";

if (isset($_POST['nome'])) {
    $cliente = new Cliente();
    $dao = new ClienteDao($pdo);
    $cliente->id = $_POST['id'];
    $cliente->nome = $_POST['nome'];
    $cliente->endereco = $_POST['endereco'];
    $cliente->cep = $_POST['cep'];
    $cliente->bairro = $_POST['bairro'];
    $cliente->cpf = $_POST['cpf'];
    $cliente->nascimento = $_POST['nascimento'];
    $cliente->data_vencimento = $_POST['data_vencimento'];
    $cliente->unidade_consumidora = $_POST['unidade_consumidora'];
    $cliente->kwh = $_POST['kwh'];
    $cliente->valor_total = $_POST['valor_total'];
    $cliente->sexo =$_POST['sexo'];
    
   $status=$dao->update($cliente);
   
    header("Location: ../../atualizar.php?status=$status&id=$cliente->id");
  
}