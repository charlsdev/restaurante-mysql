      <?php
         include './layouts/header.php';
      ?>
   </head>
   
   <body>
      <div class="container">
         <div class="row rowLogin">
            <div class="col-md-5 mx-auto my-auto">
               <div class="formLogin">
                  <div class="row">
                     <div class="col-md-12 mx-auto text-center">
                        <div class="tittleLogin">Inicio de Sesión</div>
                        <img src="./libs/img/restaurant.png" alt="Login" class="mx-auto imgLogin" />
                     </div>
                  </div>
                  
                  <div class="mb-2">
                     <label for="" class="form-label lblLogin">Cédula</label>
                     <input type="text" class="form-control iptLogin" id="cedula" maxlength="10" placeholder="Ingrese su cédula"/>
                  </div>
                  <div class="mb-2">
                     <label for="" class="form-label lblLogin">Contraseña</label>
                     <input type="password" class="form-control iptLogin" id="password" placeholder="Ingrese su contraseña"/>
                  </div>
                  <div class="mb-3 text-end">
                     <a class="lblURL" href="register.php">No tienes una cuenta? ¡Registrate!</a>
                  </div>
                  <div class="mb-2 text-end">
                     <button class="btn btn-outline-danger btn-sm btnLogin" onclick="loginUser();" >
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Iniciar Sesión
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php
         include './layouts/footer.php';
      ?>

      <script>
         const loginUser = () => {
            let opcion = 2;

            cedula = $.trim($('#cedula').val());                           
            password = $.trim($('#password').val());
            
            if (
               opcion === '' ||
               cedula === '' ||
               password === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               $.ajax({
                  url: 'process.php',
                  type: 'POST',
                  datatype: 'JSON',    
                  data: {
                     opcion: opcion,
                     cedula: cedula,
                     password: password
                  },
               })
               .done(function(respuesta) {
                  if (respuesta === 'true') {
                     swal({
                        title: 'Login Correcto!',
                        text: "Iniciando Sessión...",
                        icon: 'success',
                        button: 'OK!'
                     }).then((value) => {
                        if (value) {
                           window.location="./pages/";
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Datos no válidos!',
                           text: "Upss! Usuario o Contraseña incorrectas...",
                           icon: 'info',
                           button: 'OK!'
                        })
                     } else {
                        swal({
                           title: 'Error Server!',
                           text: "Ohhh¡ Error interno del server...",
                           icon: 'error',
                           button: 'OK!'
                        }).then((value) => {
                           if (value) {
                              location.reload();
                           }
                        })
                     }
                  }
               })
               .fail(function(){
                  console.log("Error");
               });
            }
            
         }
      </script>
   </body>
</html>