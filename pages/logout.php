<?php

   include_once '../config/UserSession.php';

   $userSession = new UserSession();
   $userSession->closeSession();

   header("location: ../");

?>