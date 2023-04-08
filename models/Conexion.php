<?php
class Conexion{

    private $host = "localhost";
    private $port = "3306";
    private $database = "vehiculos";
    private $charset = "UTF8";
    private $user = "root";
    private $password ="";

    private $pdo;

    private function conectarServidor(){

         $conexion = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}", $this->user, $this->password);

         return $conexion; 
 }


 // retorna el acceso
 public function getConexion(){
    try{
//pasaremos la conexion al atributo/objeto pdo

$this->pdo = $this->conectarServidor();


$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//retornamos la conexion al modelo que lo necesite

      return $this->pdo;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>