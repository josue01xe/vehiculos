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

    public function registrarVehiculo($marca, $modelo, $año, $tipocombustible, $color, $numeroplaca, $transmision, $kilometraje, $tipovehiculo, $fechacompra) {
        try {
          // Conectar a la base de datos
          $conexion = (new Conexion())->getConexion();
    
          // Preparar la consulta SQL
          $query = "INSERT INTO vehiculos (marca, modelo, anio, tipo_combustible, color, numero_placa, transmision, kilometraje, tipo_vehiculo, fecha_compra)
                    VALUES (:marca, :modelo, :anio, :tipo_combustible, :color, :numero_placa, :transmision, :kilometraje, :tipo_vehiculo, :fecha_compra)";
          $statement = $conexion->prepare($query);
    
          // Vincular los parámetros de la consulta SQL
          $statement->bindParam(':marca', $marca);
          $statement->bindParam(':modelo', $modelo);
          $statement->bindParam(':anio', $año);
          $statement->bindParam(':tipo_combustible', $tipocombustible);
          $statement->bindParam(':color', $color);
          $statement->bindParam(':numero_placa', $numeroplaca);
          $statement->bindParam(':transmision', $transmision);
          $statement->bindParam(':kilometraje', $kilometraje);
          $statement->bindParam(':tipo_vehiculo', $tipovehiculo);
          $statement->bindParam(':fecha_compra', $fechacompra);
    
          // Ejecutar la consulta SQL
          $statement->execute();
    
          // Cerrar la conexión a la base de datos
          $conexion = null;
    
          // Retornar una cadena vacía para indicar que el vehículo se registró correctamente
          return '';
        } catch (Exception $e) {
          // Retornar un mensaje de error para indicar que hubo un problema al registrar el vehículo
          return 'Error al registrar el vehículo: ' . $e->getMessage();
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

    }