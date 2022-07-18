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

      public function generateID($initials, $table, $campo)
      {
         $uuid = $initials . uniqid();

         $stmt = $this->con->prepare("SELECT * FROM " . $table  . " WHERE " . $campo . " = ?");
         $stmt->bind_param('s', $uuid);
         $stmt->execute();
         $result = $stmt->get_result();

         if($result->num_rows === 1){
            $this->generateID($initials, $table, $campo);
         }else{
            return $uuid;
         }
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

      public function Login(
         $cedula, $password
      ) {
         $stmt = $this->con->prepare("SELECT * FROM login WHERE cedula = ?");
         $stmt->bind_param('s', $cedula);
         $stmt->execute();
         $result = $stmt->get_result();
         $data = $result->fetch_all(MYSQLI_ASSOC);
         
         // Verify array is not empty
         if (!empty($data)) {

            foreach ($data as $user) {
               $res = Security::VerifyPassword($password, $user['password']);
            }
            
            if ($res) {
               $this->userSession->setCurrentUser($data);
               
               return true;
            }

            return false;
         } else {
            return false;
         }
      }

      public function allUsers()
      {
         $stmt = $this->con->prepare("SELECT cedula, apellidos, nombres, telefono, direccion, genero FROM login WHERE NOT cedula = ?");
         $stmt->bind_param('s', $_SESSION['user'][0]['cedula']);
         $stmt->execute();
         $result = $stmt->get_result();
         $data = $result->fetch_all(MYSQLI_ASSOC);

         return json_encode($data);
      }

      public function deleteUser(
         $cedula
      ) {
         $stmt = $this->con->prepare("DELETE FROM login WHERE cedula = ?");
         $stmt->bind_param('s', $cedula);

         if ($stmt->execute()) return true;

         return false;
      }

      public function allClients()
      {
         $stmt = $this->con->prepare("SELECT cedula, apellidos, nombres, telefono, direccion, genero, fechNacimiento FROM clientes");
         $stmt->execute();
         $result = $stmt->get_result();
         $data = $result->fetch_all(MYSQLI_ASSOC);

         return json_encode($data);
      }

      public function verifyClient(
         $cedula
      ) {
         $stmt = $this->con->prepare("SELECT cedula FROM clientes WHERE cedula = ?");
         $stmt->bind_param('s', $cedula);
         $stmt->execute();
         $result = $stmt->get_result();

         if ($result->num_rows === 1) return true;

         return false;
      }

      public function saveClient(
         $cedula,
         $apellidos,
         $nombres,
         $telefono,
         $direccion,
         $genero,
         $fechNacimiento
      ) {         
         $stmt = $this->con->prepare("INSERT INTO clientes(cedula, apellidos, nombres, telefono, direccion, genero, fechNacimiento) VALUES (?, ?, ?, ?, ?, ?, ?)");
         $stmt->bind_param('sssssss', $cedula, $apellidos, $nombres, $telefono, $direccion, $genero, $fechNacimiento);

         if ($stmt->execute()) return true;

         return false;
      }

      public function deleteClient(
         $cedula
      ) {
         $stmt = $this->con->prepare("DELETE FROM clientes WHERE cedula = ?");
         $stmt->bind_param('s', $cedula);

         if ($stmt->execute()) return true;

         return false;
      }

      public function updateClient(
         $cedula,
         $apellidos,
         $nombres,
         $telefono,
         $direccion,
         $genero,
         $fechNacimiento
      ) {
         $stmt = $this->con->prepare("UPDATE clientes SET apellidos = ?, nombres = ?, telefono = ?, direccion = ?, genero = ?, fechNacimiento = ? WHERE cedula = ?");
         $stmt->bind_param('sssssss', $apellidos, $nombres, $telefono, $direccion, $genero, $fechNacimiento, $cedula);

         if ($stmt->execute()) return true;

         return false;
      }

      public function allPLatos()
      {
         $stmt = $this->con->prepare("SELECT * FROM platos");
         $stmt->execute();
         $result = $stmt->get_result();
         $data = $result->fetch_all(MYSQLI_ASSOC);

         return json_encode($data);
      }

      public function savePlato(
         $nombrePlato,
         $precioPlato,
         $tipoPlato
      ) {       
         $ID = $this->generateID('PLA', 'platos', 'idPlato');
         
         $stmt = $this->con->prepare("INSERT INTO platos(idPlato, nombrePlato, precioPlato, tipoPlato) VALUES (?, ?, ?, ?)");
         $stmt->bind_param('ssds', $ID, $nombrePlato, $precioPlato, $tipoPlato);

         if ($stmt->execute()) return true;

         return false;
      }

      public function deletePlato(
         $idPlato
      ) {
         $stmt = $this->con->prepare("DELETE FROM platos WHERE idPlato = ?");
         $stmt->bind_param('s', $idPlato);

         if ($stmt->execute()) return true;

         return false;
      }

      public function updatePlato(
         $idPlato,
         $nombrePlato,
         $precioPlato,
         $tipoPlato
      ) {
         $stmt = $this->con->prepare("UPDATE platos SET nombrePlato = ?, precioPlato = ?, tipoPlato = ? WHERE idPlato = ?");
         $stmt->bind_param('sdss', $nombrePlato, $precioPlato, $tipoPlato, $idPlato);

         if ($stmt->execute()) return true;

         return false;
      }
   }
   