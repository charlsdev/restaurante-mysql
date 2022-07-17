      <?php
         include "../config/InSession.php";

         include dirname(__FILE__) . './layouts/header.php';
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
                        <img src="./libs/img/login.png" alt="Login" class="mx-auto imgLogin" />
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
                     <button class="btn btn-outline-danger btn-sm btnLogin" onclick="loginUser();" >Iniciar Sesión</button>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php
         include dirname(__FILE__) . './layouts/footer.php';
      ?>
   </body>
</html>