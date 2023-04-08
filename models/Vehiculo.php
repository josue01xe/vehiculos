<?php

require_once "Conexion.php";

class Vehiculo extends Conexion {

    private $accesoBD;

    public function __CONSTRUCT() {
        $this->accesoBD = parent::getConexion();
    }

    public function listarVehiculos() {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_vehiculos_listar()");

            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarVehiculo($datos = []){
        try{
         //1.Preparamos la consulta
         $consulta = $this->accesoBD->prepare("CALL spu_vehiculos_registrar(?,?,?,?,?,?,?,?,?,?)");
         //2.Ejecutamos la consulta
         $consulta->execute(
           array(
             $datos["marca"],
             $datos["modelo"],
             $datos["año"],
             $datos["tipocombustible"],
             $datos["color"],
             $datos["numeroplaca"],
             $datos["transmision"],
             $datos["kilometraje"],
             $datos["tipovehiculo"],
             $datos["fechacompra"]
           )
         );
        }  
        catch(Exception $e){
         die($e->getMessage());
       }
   
     }

     public function eliminarVehiculo($idvehiculo = 0){

        try{
          $consulta = $this->accesoBD->prepare("CALL spu_vehiculos_eliminar(?)");
          $consulta->execute(array($idvehiculo));
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    
      }


      public function actualizarVehiculo($datos = []) {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_vehiculos_actualizar(?,?,?,?,?,?,?,?,?,?,?)");
            $consulta->execute(array(
                $datos["idvehiculo"],
                $datos["marca"],
                $datos["modelo"],
                $datos["año"],
                $datos["tipocombustible"],
                $datos["color"],
                $datos["numeroplaca"],
                $datos["transmision"],
                $datos["kilometraje"],
                $datos["tipovehiculo"],
                $datos["fechacompra"]
            ));
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}