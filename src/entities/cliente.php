<?php 
class Usuario{
    private $id;
    Private $nome;
    private $endereco;
    private $cep;
    private $bairro;
    
    public function setId($si){
        $this->id = $si;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($sn){
        $this->nome = $sn;
    }
    public function getNome(){
        return $this->nome;
    
    }
    public function setEmail($se){
        $this->email = $se;
    }
    public function getEmail(){
        return $this->email;
    }
}



?>