      <?php
         include dirname(__FILE__) . './layouts/header.php';
      ?>

   </head>

   <body>
      <div class="container">
         <?php
            include dirname(__FILE__) . './layouts/Navbar.php';
         ?>

         <br>

         <div class="row">
            <div class="col-md-12 titleInitials text-center">
               Listado de Platos
            </div>
         </div>

         <div class="row">
            <div class="col-md-5">            
               <button id="btnNuevo" type="button" class="btn btn-outline-danger btn-sm btnLogin" onclick="modalOpen();">
                  <i class="far fa-address-book"></i>&nbsp;&nbsp;<b>Añadir</b>
               </button>    
            </div>    
         </div>
         <br>

         <div class="row tableDesign">
            <div class="table-responsive">
               <table id="listPlatos" class="table table-striped table-bordered" style="color: #000">
                  <thead>
                     <tr>
                        <th nowgrap scope="col">ID</th>
                        <th nowgrap scope="col">Plato</th>
                        <th nowgrap scope="col">Precio</th>
                        <th nowgrap scope="col">Tipo</th>
                        <th nowgrap scope="col">Procesos</th>
                     </tr>
                  </thead>

               </table>
            </div>
         </div>
      </div>

      <?php
         include dirname(__FILE__) . './layouts/footer.php';
      ?>

      <div class="modal fade" id="modalAddPlato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">REGISTRAR PLATO</div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Nombre</label>
                        <input type="text" class="form-control iptLogin" id="nombrePlato"  placeholder="Ingrese nombre del plato" />
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Precio</label>
                        <input type="text" class="form-control iptLogin" id="precioPlato"  placeholder="Ingrese precio del plato"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Tipo</label>
                        <select id="tipoPlato" class="form-control iptLogin">
                           <option value="" disabled selected>Seleccionar...</option>
                           <option value="Normal">Normal</option>
                           <option value="A la Carta">A la Carta</option>
                           <option value="Medium">Medium</option>
                        </select>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
                  <button type="button" class="btn btn-outline-success btn-sm btnLogin" onclick="savePlato();">
                     Guardar
                  </button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modalEditPlato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">EDITAR PLATO</div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">ID</label>
                        <input type="text" class="form-control iptLogin" id="idPLatoEdit"  placeholder="ID plato" disabled/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Nombre</label>
                        <input type="text" class="form-control iptLogin" id="nombrePlatoEdit"  placeholder="Ingrese nombre del plato" />
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Precio</label>
                        <input type="text" class="form-control iptLogin" id="precioPlatoEdit"  placeholder="Ingrese precio del plato"/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Tipo</label>
                        <select id="tipoPlatoEdit" class="form-control iptLogin">
                           <option value="" disabled selected>Seleccionar...</option>
                           <option value="Normal">Normal</option>
                           <option value="A la Carta">A la Carta</option>
                           <option value="Medium">Medium</option>
                        </select>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
                  <button type="button" class="btn btn-outline-success btn-sm btnLogin" onclick="updatePlato();">
                     Actualizar
                  </button>
               </div>
            </div>
         </div>
      </div>

      <script>
         $(document).ready(function() {
            var opcion;
            opcion = 8;

            listPlatos = $("#listPlatos").DataTable({
               "destroy": true,
               "ajax": {
                  "method": "POST",
                  "url": "./process.php",
                  "data": { opcion:opcion },
                  "dataSrc":"" //Return PHP data [{}]
               },
               "columns": [
                  {"data": "idPlato"},
                  {"data": "nombrePlato"},
                  {"data": "precioPlato"},
                  {"data": "tipoPlato"},
                  {"data": null,
                     render: function (data, type, row) {
                        return `<center><button type='button' class='btn btn-outline-primary bt-sm btnProcess' onclick="modalOpenEdit('${row.idPlato}', '${row.nombrePlato}', '${row.precioPlato}', '${row.tipoPlato}');"><i class="fa-solid fa-pen-to-square" style="font-size: 13px;"></i></button>
                        <button type='button' class='btn btn-outline-danger bt-sm btnProcess' onclick="deletePlato('${row.idPlato}', '${row.nombrePlato}');"><i class="fa-solid fa-trash-can" style="font-size: 13px;"></i></button></center>`
                     }
                  }
               ],
               "language": idioma,
               "responsive": "true"
            });
         });

         const modalOpen = () => {
            $('#nombrePlato').val('');
            $('#precioPlato').val('');
            $('#tipoPlato').val('');

            $('#modalAddPlato').modal('show');
         }

         const savePlato = () => {
            let opcion = 9;

            nombrePlato = $.trim($('#nombrePlato').val());    
            precioPlato = $.trim($('#precioPlato').val());
            tipoPlato = $.trim($('#tipoPlato').val());
            
            if (
               opcion === '' ||
               nombrePlato === '' ||
               precioPlato === '' ||
               tipoPlato === ''
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
                     nombrePlato: nombrePlato,
                     precioPlato: precioPlato,
                     tipoPlato: tipoPlato
                  },
               })
               .done(function(respuesta){
                  if (respuesta === 'true') {
                     swal({
                        title: 'Plato guardado!',
                        text: "Se ha guardado con éxito el plato...",
                        icon: 'success',
                        button: 'OK!'
                     }).then((value) => {
                        if (value) {
                           listPlatos.ajax.reload(null, false);
                           $('#modalAddPlato').modal('hide');
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Plato no registrado!',
                           text: "Upss! No se ha podido registrar el plato...",
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

         const deletePlato = (idPlato, nombrePlato) => {
            let opcion = 10;

            idPlato = $.trim(idPlato);    
            nombrePlato = $.trim(nombrePlato);
            
            if (
               opcion === '' ||
               idPlato === '' ||
               nombrePlato === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               swal({
                  title: 'Eliminar plato!',
                  text: `Desear eliminar el plato ${nombrePlato}?`,
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
                           idPlato: idPlato
                        },
                     })
                     .done(function(respuesta){
                        if (respuesta === 'true') {
                           swal({
                              title: 'Plato eliminado!',
                              text: "Se ha eliminado el plato con éxito...",
                              icon: 'success',
                              button: 'OK!'
                           }).then((value) => {
                              if (value) {
                                 listPlatos.ajax.reload(null, false);
                              }
                           })
                        } else {
                           if (respuesta === 'false') {
                              swal({
                                 title: 'PLato no eliminado!',
                                 text: "No se ha eliminado el plato...",
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

         const modalOpenEdit = (idPlato, nombrePlato, precioPlato, tipoPlato) => {
            $('#idPLatoEdit').val(`${idPlato}`);
            $('#nombrePlatoEdit').val(`${nombrePlato}`);
            $('#precioPlatoEdit').val(`${precioPlato}`);
            $('#tipoPlatoEdit').val(`${tipoPlato}`);

            $('#modalEditPlato').modal('show');
         }

         const updatePlato = () => {
            let opcion = 11;

            idPlato = $.trim($('#idPLatoEdit').val());    
            nombrePlato = $.trim($('#nombrePlatoEdit').val());
            precioPlato = $.trim($('#precioPlatoEdit').val());    
            tipoPlato = $.trim($('#tipoPlatoEdit').val());
            
            if (
               opcion === '' ||
               idPlato === '' ||
               nombrePlato === '' ||
               precioPlato === '' ||
               tipoPlato === ''
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
                     idPlato: idPlato,
                     nombrePlato: nombrePlato,
                     precioPlato: precioPlato,
                     tipoPlato: tipoPlato
                  },
               })
               .done(function(respuesta){
                  if (respuesta === 'true') {
                     swal({
                        title: 'Plato actualizado!',
                        text: "Se ha actualizado el plato con éxito...",
                        icon: 'success',
                        button: 'OK!'
                     }).then((value) => {
                        if (value) {
                           listPlatos.ajax.reload(null, false);
                           $('#modalEditPlato').modal('hide');
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Plato no actualizado!',
                           text: "Upss! No se ha podido actualizar el plato...",
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