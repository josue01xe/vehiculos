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
if($_POST['operacion']== 'registrar'){

    //Paso 1: recoger los datos que nos envia la vista (FORM, utilizando AJAX)
    //$_POST : esto es lo que nos envia desde FORM
    $datosForm = [
      "marca"        => $_POST['marca'],
      "modelo"       => $_POST['modelo'],
      "año        "  => $_POST['año'],
      "tipocombustible"  => $_POST['tipocombustible'],
      "color"       => $_POST['color'],
      "numeroplaca"  => $_POST['numeroplaca'],
      "transmision"  => $_POST['transmision'],
      "kilometraje"  => $_POST['kilometraje'],
      "tipovehiculo"  => $_POST['tipovehiculo'],
      "fechacompra"  => $_POST['fechacompra']
    ];
  
    //paso 2: enviar el arreglo como parametro del metodo registrar
    $vehiculo->registrarVehiculo($datosForm);
  
   
  
  }
}

