<?php 
   session_start();
   
   // $_SESSION['user']['privilegio'] === "Usuario";

   // Verificamos is existe la variable USER en el ARRAY
   if(!array_key_exists('user', $_SESSION)){
      
   } else {
      if($_SESSION['user']) header("location: ./pages");
   }