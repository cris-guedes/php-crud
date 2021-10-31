<?php
   $config =[
    "dbname" => "consumo_energia",
    "host" => "localhost",
    "user" => "root",
    "password" => "root" 
];
global $pdo;

extract($config);
try{
  $pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$password);
}catch(PDOEXception $e){
    echo $e->getMessage();
}  
?>