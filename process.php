<?php
   require dirname(__FILE__) . '/config/DBFunctions.php';

   $fnt = new DBFuntions();

   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
   $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
   $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
   $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
   $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
   $genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
   $password = (isset($_POST['password'])) ? $_POST['password'] : '';

   switch($opcion) {
      case 1:        
            if ($fnt->verifyUser($cedula)) {
               echo 'exits';
            } else {
               if (
                  $fnt->saveUser( $cedula, $apellidos, $nombres, $telefono, $direccion, $genero, $password)
               ) {
                  echo 'true';
               } else {
                  echo 'false';
               }
            }  

         break;

      case 2:
            if ($fnt->Login($cedula, $password)) {
               echo 'true';
            } else {
               echo 'false';
            }

         break;
   }