<?php

class ClienteDao{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function create(Cliente $cliente){
        $alreadyExist = $this->findByCpf($cliente->cpf);
        if ($alreadyExist == false) {
            $sql = $this->pdo->prepare("INSERT INTO clientes (nome,endereco,cep,bairro,cpf,nascimento,data_vencimento,sexo,unidade_consumidora,kwh,valor_total) VALUES (:nome,:endereco,:cep,:bairro,:cpf,:nascimento,:data_vencimento,:sexo,:unidade_consumidora,:kwh,:valor_total)");
            $sql->bindValue(':nome', $cliente->nome);
            $sql->bindValue(':endereco', $cliente->endereco);
            $sql->bindValue(':cep', $cliente->cep);
            $sql->bindValue(':bairro', $cliente->bairro);
            $sql->bindValue(':cpf', $cliente->cpf);
            $sql->bindValue(':nascimento', $cliente->nascimento);
            $sql->bindValue(':data_vencimento', $cliente->data_vencimento);
            $sql->bindValue(':sexo', $cliente->sexo);
            $sql->bindValue(':unidade_consumidora', $cliente->unidade_consumidora);
            $sql->bindValue(':kwh', $cliente->kwh);
            $sql->bindValue(':valor_total', $cliente->valor_total);
            $sql->execute();
            return true;
        }else{
            return false;
        }
    }
    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        $result = $sql->fetch();
        if ($sql->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function findByCpf($cpf){
        $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        $sql->fetch();
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read(){
        $sql = $this->pdo->query("SELECT * FROM clientes");
        $lista =  $sql->fetchAll();
        return $lista;
    }

    public function update($cliente){
        $alreadyExist = false;
        $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
        $sql->bindValue(':cpf', $cliente->cpf);
        $sql->execute();
       $cadastros = $sql->fetchAll();
        foreach($cadastros as $cadastro){
            if($cadastro['id'] != $cliente->id){
                $alreadyExist = true;
                print_r($cadastro['id']);
                break;
            }
        }
       
        
        if ($alreadyExist == false) {
        $sql = $this->pdo->prepare("UPDATE clientes SET nome=:nome,endereco=:endereco,cep=:cep,bairro=:bairro,cpf=:cpf,nascimento=:nascimento,data_vencimento=:data_vencimento,sexo=:sexo,unidade_consumidora=:unidade_consumidora,kwh=:kwh,valor_total=:valor_total WHERE id = :id");
        $sql->bindValue(':nome', $cliente->nome);
        $sql->bindValue(':endereco', $cliente->endereco);
        $sql->bindValue(':cep', $cliente->cep);
        $sql->bindValue(':bairro', $cliente->bairro);
        $sql->bindValue(':cpf', $cliente->cpf);
        $sql->bindValue(':nascimento', $cliente->nascimento);
        $sql->bindValue(':data_vencimento', $cliente->data_vencimento);
        $sql->bindValue(':sexo', $cliente->sexo);
        $sql->bindValue(':unidade_consumidora', $cliente->unidade_consumidora);
        $sql->bindValue(':kwh', $cliente->kwh);
        $sql->bindValue(':valor_total', $cliente->valor_total);
        $sql->bindValue(':id', $cliente->id);
        $sql->execute();
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM clientes WHERE id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
