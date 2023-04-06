<?php

require_once '../models/Vehiculo.php';

if(isset($_POST['operacion'])){

    $vehiculo = new Vehiculo();

if($_POST['operacion']== 'listar'){

    $datosObtenidos = $vehiculo->listarVehiculos();

    if ($datosObtenidos){
        $numeroFila = 1;

        foreach($datosObtenidos as $vehiculo){

            echo"
           <tr>
           <td>{$numeroFila}</td>
           <td>{$vehiculo['marca']}</td>
           <td>{$vehiculo['modelo']}</td>
           <td>{$vehiculo['año']}</td>
           <td>{$vehiculo['tipocombustible']}</td>
           <td>{$vehiculo['color']}</td>
           <td>{$vehiculo['numeroplaca']}</td>
           <td>{$vehiculo['transmision']}</td>
           <td>{$vehiculo['kilometraje']}</td>
           <td>{$vehiculo['tipovehiculo']}</td>
           <td>{$vehiculo['fechacompra']}</td>
           <td>

           <a href='#' data-idvehiculo='{$vehiculo['idvehiculo']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash-fill'></i></a>
           <a href='#' data-idvehiculo='{$vehiculo['idvehiculo']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
           </td>
           </tr>
          ";
          $numeroFila++;
    }
  }


}
}

