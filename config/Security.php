<?php
   class Security
   {
      static function EncryptPassword($password)
      {
         return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
      }

      static function VerifyPassword($password, $passEncrypt)
      {
         return password_verify($password, $passEncrypt);
      }
   }
   