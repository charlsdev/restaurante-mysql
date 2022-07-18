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
            if ($fnt->updatePLato($idPlato, $nombrePlato, $precioPlato, $tipoPlato)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;
   }