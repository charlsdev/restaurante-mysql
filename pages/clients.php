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
               Clientes registrados
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
               <table id="listClientes" class="table table-striped table-bordered" style="color: #000">
                  <thead>
                     <tr>
                        <th nowgrap scope="col">Cedula</th>
                        <th nowgrap scope="col">Apellidos</th>
                        <th nowgrap scope="col">Nombres</th>
                        <th nowgrap scope="col">Telefono</th>
                        <th nowgrap scope="col">Direccion</th>
                        <th nowgrap scope="col">Genero</th>
                        <th nowgrap scope="col">Fech. Nacimiento</th>
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

      <div class="modal fade" id="modalAddClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">REGISTRAR cliente</div>
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
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Fecha de nacimiento</label>
                        <input type="date" class="form-control iptLogin" id="fechNacimiento"/>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
                  <button type="button" class="btn btn-outline-success btn-sm btnLogin" onclick="saveClient();">
                     Guardar
                  </button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modalEditClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">Actualizar cliente</div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Cédula</label>
                        <input type="text" class="form-control iptLogin" id="cedulaEdit" maxlength="10" placeholder="Ingrese su cédula" disabled/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Apellidos</label>
                        <input type="text" class="form-control iptLogin" id="apellidosEdit"  placeholder="Ingrese su apellido"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Nombres</label>
                        <input type="text" class="form-control iptLogin" id="nombresEdit"  placeholder="Ingrese su nombre"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Teléfono</label>
                        <input type="text" class="form-control iptLogin" id="telefonoEdit"  placeholder="Ingrese su teléfono" maxlength="10"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Dirección</label>
                        <input type="text" class="form-control iptLogin" id="direccionEdit"  placeholder="Ingrese su dirección"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Género</label>
                        <select id="generoEdit" class="form-control iptLogin">
                           <option value="" disabled selected>Seleccionar...</option>
                           <option value="Masculino">Masculino</option>
                           <option value="Femenino">Femenino</option>
                           <option value="No definido">No definido</option>
                        </select>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Fecha de nacimiento</label>
                        <input type="date" class="form-control iptLogin" id="fechNacimientoEdit"/>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
                  <button type="button" class="btn btn-outline-success btn-sm btnLogin" onclick="updateClient();">
                     Actualizar
                  </button>
               </div>
            </div>
         </div>
      </div>

      <script>
         $(document).ready(function() {
            var opcion;
            opcion = 4;

            listClientes = $("#listClientes").DataTable({
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
                  {"data": "fechNacimiento"},
                  {"data": null,
                     render: function (data, type, row) {
                        return `<center><button type='button' class='btn btn-outline-primary bt-sm btnProcess' onclick="modalOpenEdit('${row.cedula}', '${row.apellidos}', '${row.nombres}', '${row.telefono}', '${row.direccion}', '${row.genero}', '${row.fechNacimiento}');"><i class="fa-solid fa-pen-to-square" style="font-size: 13px;"></i></button>
                        <button type='button' class='btn btn-outline-danger bt-sm btnProcess' onclick="deleteClient('${row.cedula}', '${row.apellidos}', '${row.nombres}');"><i class="fa-solid fa-trash-can" style="font-size: 13px;"></i></button></center>`
                     }
                  }
               ],
               "language": idioma,
               "responsive": "true"
            });
         });

         const modalOpen = () => {
            $('#cedula').val('');
            $('#apellidos').val('');
            $('#nombres').val('');
            $('#telefono').val('');
            $('#direccion').val('');
            $('#genero').val('');
            $('#fechNacimiento').val('');

            $('#modalAddClient').modal('show');
         }

         const saveClient = () => {
            let opcion = 5;

            cedula = $.trim($('#cedula').val());    
            apellidos = $.trim($('#apellidos').val());
            nombres = $.trim($('#nombres').val());    
            telefono = $.trim($('#telefono').val());    
            direccion = $.trim($('#direccion').val());
            genero = $.trim($('#genero').val());
            fechNacimiento = $.trim($('#fechNacimiento').val());
            
            if (
               opcion === '' ||
               cedula === '' ||
               apellidos === '' ||
               nombres === '' ||
               telefono === '' ||
               direccion === '' ||
               genero === '' ||
               fechNacimiento === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               $.ajax({
                  url: './process.php',
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
                     fechNacimiento: fechNacimiento
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
                           listClientes.ajax.reload(null, false);
                           $('#modalAddClient').modal('hide');
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Cliente no registrado!',
                           text: "Upss! No se ha posido registrar al cliente...",
                           icon: 'info',
                           button: 'OK!'
                        })
                     } else {
                        swal({
                           title: 'Cliente existente!',
                           text: "El cliente ya existe...",
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

         const deleteClient = (ced, ape, nom) => {
            let opcion = 6;

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
                  title: 'Eliminar cliente!',
                  text: `Desear eliminar el cliente ${nom} ${ape}?`,
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
                              title: 'Cliente eliminado!',
                              text: "Se ha eliminado al cliente con éxito...",
                              icon: 'success',
                              button: 'OK!'
                           }).then((value) => {
                              if (value) {
                                 listClientes.ajax.reload(null, false);
                              }
                           })
                        } else {
                           if (respuesta === 'false') {
                              swal({
                                 title: 'Cliente no eliminado!',
                                 text: "No se ha eliminado al cliente...",
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

         const modalOpenEdit = (cedula, apellidos, nombres, telefono, direccion, genero, fechNacimiento) => {
            $('#cedulaEdit').val(`${cedula}`);
            $('#apellidosEdit').val(`${apellidos}`);
            $('#nombresEdit').val(`${nombres}`);
            $('#telefonoEdit').val(`${telefono}`);
            $('#direccionEdit').val(`${direccion}`);
            $('#generoEdit').val(`${genero}`);
            $('#fechNacimientoEdit').val(`${fechNacimiento}`);

            $('#modalEditClient').modal('show');
         }

         const updateClient = () => {
            let opcion = 7;

            cedula = $.trim($('#cedulaEdit').val());    
            apellidos = $.trim($('#apellidosEdit').val());
            nombres = $.trim($('#nombresEdit').val());    
            telefono = $.trim($('#telefonoEdit').val());    
            direccion = $.trim($('#direccionEdit').val());
            genero = $.trim($('#generoEdit').val());
            fechNacimiento = $.trim($('#fechNacimientoEdit').val());
            
            if (
               opcion === '' ||
               cedula === '' ||
               apellidos === '' ||
               nombres === '' ||
               telefono === '' ||
               direccion === '' ||
               genero === '' ||
               fechNacimiento === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               $.ajax({
                  url: './process.php',
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
                     fechNacimiento: fechNacimiento
                  },
               })
               .done(function(respuesta){
                  if (respuesta === 'true') {
                     swal({
                        title: 'Registro actualizado!',
                        text: "Se ha actualizado con éxito el cliente...",
                        icon: 'success',
                        button: 'OK!'
                     }).then((value) => {
                        if (value) {
                           listClientes.ajax.reload(null, false);
                           $('#modalEditClient').modal('hide');
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Cliente no actualizado!',
                           text: "Upss! No se ha posido actualizar al cliente...",
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
         }

      </script>

   </body>

</html>