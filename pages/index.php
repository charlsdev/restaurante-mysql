      <?php
         include './layouts/header.php';
      ?>

   </head>

   <body>
      <div class="container">
         <?php
            include './layouts/Navbar.php';
         ?>

         <br>

         <div class="row">
            <div class="col-md-12 titleInitials text-center">
               Usuarios Login
            </div>
         </div>

         <div class="row">
            <div class="col-md-5">            
               <button id="btnNuevo" type="button" class="btn btn-outline-danger btn-sm btnLogin" onclick="modalOpen();">
                  <i class="far fa-address-book"></i>&nbsp;&nbsp;<b>Registrar</b>
               </button>    
            </div>    
         </div>
         <br>

         <div class="row tableDesign">
            <div class="table-responsive">
               <table id="listUsuarios" class="table table-striped table-bordered" style="color: #000">
                  <thead>
                     <tr>
                        <th nowgrap scope="col">Cedula</th>
                        <th nowgrap scope="col">Apellidos</th>
                        <th nowgrap scope="col">Nombres</th>
                        <th nowgrap scope="col">Telefono</th>
                        <th nowgrap scope="col">Direccion</th>
                        <th nowgrap scope="col">Genero</th>
                        <th nowgrap scope="col">Procesos</th>
                     </tr>
                  </thead>

               </table>
            </div>
         </div>
      </div>

      <?php
         include './layouts/footer.php';
      ?>

      <div class="modal fade" id="modalAddUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">REGISTRAR USUARIO</div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Cédula</label>
                        <input type="text" class="form-control iptLogin" id="cedula" maxlength="10" placeholder="Ingrese su cédula"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Apellidos</label>
                        <input type="text" class="form-control iptLogin" id="apellidos"  placeholder="Ingrese su apellido"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Nombres</label>
                        <input type="text" class="form-control iptLogin" id="nombres"  placeholder="Ingrese su nombre"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Teléfono</label>
                        <input type="text" class="form-control iptLogin" id="telefono"  placeholder="Ingrese su teléfono" maxlength="10"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Dirección</label>
                        <input type="text" class="form-control iptLogin" id="direccion"  placeholder="Ingrese su dirección"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Género</label>
                        <select id="genero" class="form-control iptLogin">
                           <option value="" disabled selected>Seleccionar...</option>
                           <option value="Masculino">Masculino</option>
                           <option value="Femenino">Femenino</option>
                           <option value="No definido">No definido</option>
                        </select>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
                  <button type="button" class="btn btn-outline-success btn-sm btnLogin" onclick="saveUser();">
                     Guardar
                  </button>
               </div>
            </div>
         </div>
      </div>

      <script>
         // const saveUser = () => {
         //    $.ajax({
         //       url: './process.php',
         //       type: 'POST',
         //       datatype: 'JSON',    
         //       data: {
         //          opcion: opcion
         //       },
         //       dataSrc:""
         //    })
         //    .done(function(res){
         //       console.log(res);
         //    })
         //    .fail(function(){
         //       console.log("Error");
         //    });
         // }
         // saveUser();

         $(document).ready(function() {
            var opcion;
            opcion = 1;

            listUsuarios = $("#listUsuarios").DataTable({
               "destroy": true,
               "ajax": {
                  "method": "POST",
                  "url": "./process.php",
                  "data": { opcion:opcion },
                  "dataSrc":"" //Return PHP data [{}]
               },
               "columns": [
                  {"data": "cedula"},
                  {"data": "apellidos"},
                  {"data": "nombres"},
                  {"data": "telefono"},
                  {"data": "direccion"},
                  {"data": "genero"},
                  {"data": null,
                     render: function (data, type, row) {
                        return `<center><button type='button' class='btn btn-outline-danger bt-sm btnProcess' onclick="deleteUser('${row.cedula}', '${row.apellidos}', '${row.nombres}');"><i class="fa-solid fa-trash-can" style="font-size: 13px;"></i></button></center>`
                     }
                  }
               ],
               "language": idioma,
               "responsive": "true"
            });
         });

         const deleteUser = (ced, ape, nom) => {
            let opcion = 2;

            cedula = $.trim(ced);    
            apellidos = $.trim(ape);
            nombres = $.trim(nom);
            
            if (
               opcion === '' ||
               cedula === '' ||
               apellidos === '' ||
               nombres === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               swal({
                  title: 'Eliminar usuario!',
                  text: `Desear eliminar el usuario ${nom} ${ape}?`,
                  icon: 'info',
                  dangerMode: true,
                  buttons: true,
               }).then((value) => {
                  if (value) {
                     $.ajax({
                        url: './process.php',
                        type: 'POST',
                        datatype: 'JSON',    
                        data: {
                           opcion: opcion,
                           cedula: cedula
                        },
                     })
                     .done(function(respuesta){
                        if (respuesta === 'true') {
                           swal({
                              title: 'Usuario eliminado!',
                              text: "Se ha eliminado al usuario con éxito...",
                              icon: 'success',
                              button: 'OK!'
                           }).then((value) => {
                              if (value) {
                                 listUsuarios.ajax.reload(null, false);
                              }
                           })
                        } else {
                           if (respuesta === 'false') {
                              swal({
                                 title: 'Usuario no eliminado!',
                                 text: "No se ha eliminado al usuario...",
                                 icon: 'info',
                                 button: 'OK!'
                              })
                           } else {
                              swal({
                                 title: 'Error Server!',
                                 text: "Opps! Error 500, interno del server...",
                                 icon: 'error',
                                 button: 'OK!',
                                 allowOutsideClick: false
                              })
                           }
                        }
                     })
                     .fail(function(){
                        console.log("Error");
                     });
                  }
               })
            }
         }

         const modalOpen = () => {
            $('#cedula').val('');
            $('#apellidos').val('');
            $('#nombres').val('');
            $('#telefono').val('');
            $('#direccion').val('');
            $('#genero').val('');

            $('#modalAddUser').modal('show');
         }

         const saveUser = () => {
            let opcion = 3;

            cedula = $.trim($('#cedula').val());    
            apellidos = $.trim($('#apellidos').val());
            nombres = $.trim($('#nombres').val());    
            telefono = $.trim($('#telefono').val());    
            direccion = $.trim($('#direccion').val());
            genero = $.trim($('#genero').val());
            
            if (
               opcion === '' ||
               cedula === '' ||
               apellidos === '' ||
               nombres === '' ||
               telefono === '' ||
               direccion === '' ||
               genero === ''
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
                     genero: genero
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
                           listUsuarios.ajax.reload(null, false);
                           $('#modalAddUser').modal('hide');
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Usuario no registrado!',
                           text: "Upss! No se ha posido registrar al usuario...",
                           icon: 'info',
                           button: 'OK!'
                        })
                     } else {
                        swal({
                           title: 'Usuario existente!',
                           text: "El usuario ya existe...",
                           icon: 'error',
                           button: 'OK!',
                           allowOutsideClick: false
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