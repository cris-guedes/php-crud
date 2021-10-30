<?php 
 

class ClienteDao{
    private $pdo;
    public function __construct(PDO $driver){
        $this->pdo =$driver;
    }

    
    public function create(Cliente $cliente){

       /* public $id;
        public $nome;
        public $endereco;
        public $cep;
        public $bairro;
        public $cpf;
        public $nascimento;
        public $data_vencimento;
        public $unidade_consumidora;
        public $kwh;
        public $valor_total;*/

        $sql = $this->pdo->prepare("INSERT INTO clientes (nome,endereco,cep,bairro,cpf,nascimento,data_vencimento,sexo,unidade_consumidora,kwh,valor_total) VALUES (:nome,:endereco,:cep,:bairro,:cpf,:nascimento,:data_vencimento,:sexo,:unidade_consumidora,:kwh,:valor_total)");
        $sql->bindValue(':nome',$cliente->nome);
        $sql->bindValue(':endereco',$cliente->endereco);
        $sql->bindValue(':cep',$cliente->cep);
        $sql->bindValue(':bairro',$cliente->bairro);
        $sql->bindValue(':cpf',$cliente->cpf);
        $sql->bindValue(':nascimento',$cliente->nascimento);
        $sql->bindValue(':data_vencimento',$cliente->data_vencimento);
        $sql->bindValue(':sexo',$cliente->sexo);
        $sql->bindValue(':unidade_consumidora',$cliente->unidade_consumidora);
        $sql->bindValue(':kwh',$cliente->kwh);
        $sql->bindValue(':valor_total',$cliente->valor_total);
        $sql->execute();



    }
   public function read(){
      $sql = $this->pdo->query("SELECT * FROM clientes");
      if($sql->rowCount()>0){
        $allClientes = $sql->fetchAll(PDO::FETCH_ASSOC);


        return $allClientes;
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
