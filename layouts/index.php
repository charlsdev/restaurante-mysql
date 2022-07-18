<?php 
   session_start();
   
   if(!array_key_exists('user', $_SESSION)){
      header("location: ../");
   } else {
      if($_SESSION['user']) header("location: ../pages");
   }