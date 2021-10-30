<?php
require 'config.php';
require 'src/models/ClienteDao.php';
require 'src/entities/cliente.php';

$clienteDao =  new ClienteDao($pdo);
$allClientes = $clienteDao->read();
$listaClientes = array();
foreach($allClientes as $clienteDb){
    $cliente = new Cliente();
    $cliente->id = $clienteDb['id'];
    $cliente->nome = $clienteDb['nome'];
    $cliente->endereco = $clienteDb['endereco'];
    $cliente->cep = $clienteDb['cep'];
    $cliente->bairro = $clienteDb['bairro'];
    $cliente->cpf = $clienteDb['cpf'];
    $cliente->nascimento = $clienteDb['nascimento'];
    $cliente->data_vencimento = $clienteDb['data_vencimento'];
    $cliente->unidade_consumidora = $clienteDb['unidade_consumidora'];
    $cliente->kwh = $clienteDb['kwh'];
    $cliente->valor_total = $clienteDb['valor_total'];
    $listaClientes[] = $cliente;
}
?>
<?php require './src/partials/header.php' ?>
<header class="display-2 headerHome" > Lista De Clientes </header>
<div class="homeArea">
<a href="cadastrar.php"><button type="button" class="btn btn-success">Cadastrar Cliente ➕</button></a>
    <table class="table table-dark table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Cep</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cpf</th>
                <th scope="col">Nascimento</th>
                <th scope="col">Data Vencimento</th>
                <th scope="col">Unidade Consumidora</th>
                <th scope="col">Kwh</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaClientes as $cliente) : ?>
                <tr>
                    <td><?= $cliente->id; ?></td>
                    <td><?= $cliente->nome; ?></td>
                    <td><?= $cliente->endereco; ?></td>
                    <td><?= $cliente->cep; ?></td>
                    <td><?= $cliente->bairro; ?></td>
                    <td><?= $cliente->cpf; ?></td>
                    <td><?= $cliente->nascimento; ?></td>
                    <td><?= $cliente->data_vencimento; ?></td>
                    <td><?= $cliente->unidade_consumidora; ?></td>
                    <td><?= $cliente->kwh; ?></td>
                    <td><?= $cliente->valor_total; ?></td>
                    <td>
                        <a href="./src/actions/update.php?id=<? $cliente->id; ?>"><button type="button" class="btn btn-primary ">Editar</button></a>
                        <a href="./src/actions/delete.php?id=<? $cliente->id; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require './src/partials/footer.php' ?>