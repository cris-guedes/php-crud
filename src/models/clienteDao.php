<?php 
 require './src/entities/Cliente.php';

class ClienteDao{
    private $pdo;
    public function __construct($driver){
        $this->pdo =$driver;
    }

    public function create(){}
    public function read(){
      $sql = $this->pdo->query("SELECT * FROM cliente");
      if($sql->rowCount()>0){
        $listaUsuarios = array();
        $allClientes = $sql->fetchAll();

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
            $listaUsuarios[] = $cliente;
        }
        return $listaUsuarios;
      }
    }
    public function update(){}
    public function delete(){}







    /*public function create($usuario){
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome,email) VALUES (:nome,:email)");
        $sql->bindValue(':nome',$usuario->getNome());
        $sql->bindValue(':email',$usuario->getEmail());
        $sql->execute();



    }
    public function read(){
        $sql = $this->pdo->query("SELECT * FROM cliente");
        if($sql->rowCount()>0){
            $usuariosDb =$sql->fetchAll();
            foreach($usuariosDb as $dadosDb){
                $novoUsuario = new Usuario();
                $novoUsuario->setId($dadosDb['id']);
                $novoUsuario->setNome($dadosDb['nome']);
                $novoUsuario->setEmail($dadosDb['email']);

                $listaUsuarios[] = $novoUsuario;

            }
            return $listaUsuarios;
        }
        
    }
    public function readByEmail($email){
        $sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE email =:email");
        $sql->bindValue(":email",$email);
        $sql->execute();
        
        if($sql->rowCount()<=0){
            return false;
        }else{
            $usuario = $sql->fetch();
            return $usuario;
            
        }
    }
    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id =:id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }
    public function readById($id){
        $sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE id =:id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        
        if($sql->rowCount()<=0){
            return false;
        }else{
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);
            return $usuario;
            
        }
        
    }
    public function update($usuario){
        $sql = $this->pdo->prepare("UPDATE usuarios SET email = :email,nome=:nome WHERE id = :id");
        $sql->bindValue(":id",$usuario->getId());
        $sql->bindValue(":nome",$usuario->getNome());
        $sql->bindValue(":email",$usuario->getEmail());
        $sql->execute();

    }*/
        
    

}
