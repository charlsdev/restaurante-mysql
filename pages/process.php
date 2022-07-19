<?php
   include '../config/DBFunctions.php';

   $fnt = new DBFuntions();

   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
   $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
   $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
   $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
   $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
   $genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
   $fechNacimiento = (isset($_POST['fechNacimiento'])) ? $_POST['fechNacimiento'] : '';

   $idPlato = (isset($_POST['idPlato'])) ? $_POST['idPlato'] : '';
   $nombrePlato = (isset($_POST['nombrePlato'])) ? $_POST['nombrePlato'] : '';
   $precioPlato = (isset($_POST['precioPlato'])) ? $_POST['precioPlato'] : '';
   $tipoPlato = (isset($_POST['tipoPlato'])) ? $_POST['tipoPlato'] : '';
   
   $idVenta = (isset($_POST['idVenta'])) ? $_POST['idVenta'] : '';
   $cedCliente = (isset($_POST['cedCliente'])) ? $_POST['cedCliente'] : '';
   $discapacidad = (isset($_POST['discapacidad'])) ? $_POST['discapacidad'] : '';
   $mayorEdad = (isset($_POST['mayorEdad'])) ? $_POST['mayorEdad'] : '';
   $cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
   $tipoPago = (isset($_POST['tipoPago'])) ? $_POST['tipoPago'] : '';
   $descuento = (isset($_POST['descuento'])) ? $_POST['descuento'] : '';
   $subtotal = (isset($_POST['subtotal'])) ? $_POST['subtotal'] : '';
   $iva = (isset($_POST['iva'])) ? $_POST['iva'] : '';
   $total = (isset($_POST['total'])) ? $_POST['total'] : '';

   switch($opcion) {
      case 1:        
            $data = $fnt->allUsers();  
            echo $data;

         break;

      case 2:
            if ($fnt->deleteUser($cedula)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 3:        
            if ($fnt->verifyUser($cedula)) {
               echo 'exits';
            } else {
               if (
                  $fnt->saveUser( $cedula, $apellidos, $nombres, $telefono, $direccion, $genero, $cedula)
               ) {
                  echo 'true';
               } else {
                  echo 'false';
               }
            }  

         break;

      case 4:        
            $data = $fnt->allClients();  
            echo $data;

         break;

      case 5:        
            if ($fnt->verifyClient($cedula)) {
               echo 'exits';
            } else {
               if (
                  $fnt->saveClient($cedula, $apellidos, $nombres, $telefono, $direccion, $genero, $fechNacimiento)
               ) {
                  echo 'true';
               } else {
                  echo 'false';
               }
            }  

         break;

      case 6:
            if ($fnt->deleteClient($cedula)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 7:
            if ($fnt->updateClient($cedula, $apellidos, $nombres, $telefono, $direccion, $genero, $fechNacimiento)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 8:        
            $data = $fnt->allPLatos();  
            echo $data;

         break;

      case 9:
            if (
               $fnt->savePlato($nombrePlato, $precioPlato, $tipoPlato)
            ) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 10:
            if ($fnt->deletePlato($idPlato)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 11:
            if ($fnt->updatePlato($idPlato, $nombrePlato, $precioPlato, $tipoPlato)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 12:        
            $data = $fnt->allVentas();  
            echo $data;

         break;
      
      case 13:
            if (
               $fnt->saveVenta($idPlato, $cedCliente, $discapacidad, $mayorEdad, $cantidad, $tipoPago, $descuento, $subtotal, $iva, $total)
            ) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 14:
            if ($fnt->deleteVenta($idVenta)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;

      case 15:        
            $data = $fnt->rankingPlatos();  
            echo $data;

         break;
   }