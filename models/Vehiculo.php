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

     public function eliminarVehiculo($idvehiculo){
        $sql = "DELETE FROM vehiculos WHERE idvehiculo = ?";
        $stmt = $this->accesoBD->prepare($sql);
        $stmt->bindParam(1, $idvehiculo, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }
    
      }

    