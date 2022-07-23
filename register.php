      <?php
         include './layouts/header.php';
      ?>
   </head>

   <body>
      <div class="container">
         <div class="row rowLogin">
            <div class="col-md-11 mx-auto my-auto">
               <div class="formLogin">
                  <div class="row">
                     <div class="col-md-12 mx-auto text-center">
                        <div class="tittleLogin">Registrarse</div>
                        <img src="./libs/img/register.png" alt="Login" class="mx-auto imgLogin" />
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Cédula</label>
                        <input type="text" class="form-control iptLogin" id="cedula" maxlength="10" placeholder="Ingrese su cédula"/>
                     </div>
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Apellidos</label>
                        <input type="text" class="form-control iptLogin" id="apellidos"  placeholder="Ingrese su apellido"/>
                     </div>
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Nombres</label>
                        <input type="text" class="form-control iptLogin" id="nombres"  placeholder="Ingrese su nombre"/>
                     </div>
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Teléfono</label>
                        <input type="text" class="form-control iptLogin" id="telefono"  placeholder="Ingrese su teléfono" maxlength="10"/>
                     </div>
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Dirección</label>
                        <input type="text" class="form-control iptLogin" id="direccion"  placeholder="Ingrese su dirección"/>
                     </div>
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Género</label>
                        <select id="genero" class="form-control iptLogin">
                           <option value="" disabled selected>Seleccionar...</option>
                           <option value="Masculino">Masculino</option>
                           <option value="Femenino">Femenino</option>
                           <option value="No definido">No definido</option>
                        </select>
                     </div>
                     <div class="col-md-4 mb-2">
                        <label for="" class="form-label lblLogin">Contraseña</label>
                        <input type="password" class="form-control iptLogin" id="password" placeholder="Ingrese su contraseña"/>
                     </div>
                     <div class="mb-3 text-end">
                        <a class="lblURL" href="./">Tienes una cuenta? ¡Iniciar Sesión!</a>
                     </div>
                     <div class="mb-2 text-end">
                        <button type="button" class="btn btn-outline-primary btn-sm btnLogin" onclick="saveUser();">
                           <i class="fa-solid fa-floppy-disk"></i>
                           Registrarse
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php
         include './layouts/footer.php';
      ?>

      <script>
         const saveUser = () => {
            let opcion = 1;

            cedula = $.trim($('#cedula').val());    
            apellidos = $.trim($('#apellidos').val());
            nombres = $.trim($('#nombres').val());    
            telefono = $.trim($('#telefono').val());    
            direccion = $.trim($('#direccion').val());
            genero = $.trim($('#genero').val());                            
            password = $.trim($('#password').val());
            
            if (
               opcion === '' ||
               cedula === '' ||
               apellidos === '' ||
               nombres === '' ||
               telefono === '' ||
               direccion === '' ||
               genero === '' ||
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
                     apellidos: apellidos,
                     nombres: nombres,
                     telefono: telefono,
                     direccion: direccion,
                     genero: genero,
                     password: password
                  },
               })
               .done(function(respuesta){
                  if (respuesta === 'true') {
                     swal({
                        title: 'Registro exitoso!',
                        text: "Se ha registrado con éxito...",
                        icon: 'success',
                        button: 'OK!'
                     }).then((value) => {
                        if (value) {
                           window.location="./";
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Usuario no registrado!',
                           text: "Upss! No se ha posido registrar al usuario...",
                           icon: 'info',
                           button: 'OK!'
                        }).then((value) => {
                           if (value) {
                              window.location="./";
                           }
                        })
                     } else {
                        swal({
                           title: 'Usuario existente!',
                           text: "El usuario ya existe...",
                           icon: 'error',
                           button: 'OK!',
                           allowOutsideClick: false
                        }).then((value) => {
                           if (value) {
                              window.location="./";
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