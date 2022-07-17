<?php
   include_once dirname(__FILE__) . '/Security.php';
   include_once dirname(__FILE__) . '/UserSession.php';

   class DBFuntions
   {
      private $con;
      private $userSession;

		function __construct()
		{
			require_once dirname(__FILE__) . '/DBConnect.php';
			$db = new DBConnect();
			$this->con = $db->connect();

         $session = new UserSession();
         $this->userSession = $session;
		}

      public function verifyUser(
         $cedula
      ) {
         $stmt = $this->con->prepare("SELECT cedula FROM login WHERE cedula = ?");
         $stmt->bind_param('s', $cedula);
         $stmt->execute();
         $result = $stmt->get_result();

         if ($result->num_rows === 1) return true;

         return false;
      }

      public function saveUser(
         $cedula,
         $apellidos,
         $nombres,
         $telefono,
         $direccion,
         $genero,
         $password
      ) {
         $pass = Security::EncryptPassword($password);
         
         $stmt = $this->con->prepare("INSERT INTO login(cedula, apellidos, nombres, telefono, direccion, genero, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
         $stmt->bind_param('sssssss', $cedula, $apellidos, $nombres, $telefono, $direccion, $genero, $pass);

         if ($stmt->execute()) return true;

         return false;
      }

      public function Login($cedula, $password)
      {
         $stmt = $this->con->prepare("SELECT * FROM login WHERE cedula = ?");
         $stmt->bind_param('s', $cedula);
         
         if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($data as $user) {
               $res = Security::VerifyPassword($password, $user['password']);
            }
            
            if ($res) {
               // $this->setCurrentUser($data);

               $this->userSession->setCurrentUser($data);
               
               return true;
            }

            return false;
         } else {
            return false;
         }
         
         

      }
   }
   