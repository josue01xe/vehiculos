<?php

require_once "Conexion.php";

class Vehiculo extends Conexion {

    private $accesoBD;

    public function __CONSTRUCT(){
        $this->accesoBD = parent::getConexion();
      }

      public function listarVehiculos(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_vehiculos_listar()");

            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch(Exception $e){
            die($e->getMessage());
    }  ¨
 }
}