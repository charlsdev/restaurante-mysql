<?php
   session_start();
   if($_SESSION['user']){
      // Se mostraran los datos en un array
      // var_dump($_SESSION['user'][0]['cedula']);
      // header("location: ./logout.php");
   }else{
      header("location: ../");
   }