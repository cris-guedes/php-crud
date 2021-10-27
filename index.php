<?php
require 'config.php';

$sql = $pdo->query("SELECT * FROM cliente");
 $usuariosDb = $sql->fetchAll();

    foreach($usuariosDb as $dadosDb){
        print_r($dadosDb['nome']);
      
    }
   

/*$usuarioDao = new UsuariosDao($pdo);
$lista = $usuarioDao->read();



?>
<a href="crud/create.html">adicionar usuario</a>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario):?>
    <tr>
        <td><?= $usuario->getId();?></td>
        <td><?= $usuario->getNome();?></td>
        <td><?= $usuario->getEmail();?></td>
        <td><a href="crud/update.php?id=<?= $usuario->getId();?>">[Editar]</a>
            <a href="crud/delete.php?id=<?= $usuario->getId();?>">[Excluir]</a>
        </td>
    </tr>
    <?php endforeach;?>
    



</table>*/
?>