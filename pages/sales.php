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
               Ventas Diarias
            </div>
         </div>

         <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-6">            
               <button id="btnNuevo" type="button" class="btn btn-outline-danger btn-sm btnLogin" onclick="modalOpen();">
                  <i class="far fa-address-book"></i>&nbsp;&nbsp;<b>Añadir</b>
               </button>    
            </div>    

            <div class="col-md-6 text-end">            
               <button id="btnNuevo" type="button" class="btn btn-outline-primary btn-sm btnLogin" onclick="openModalRanking();">
                  <i class="fa-brands fa-searchengin"></i>&nbsp;&nbsp;<b>Buscar</b>
               </button>    
            </div>
         </div>
         <br>

         <div class="row tableDesign">
            <div class="table-responsive">
               <table id="listVentas" class="table table-striped table-bordered" style="color: #000">
                  <thead>
                     <tr>
                        <th nowgrap scope="col">ID</th>
                        <th nowgrap scope="col">Plato</th>
                        <th nowgrap scope="col">Cliente</th>
                        <!-- <th nowgrap scope="col">Vendedor</th> -->
                        <th nowgrap scope="col">Dis.</th>
                        <th nowgrap scope="col">M/E</th>
                        <th nowgrap scope="col">Fecha</th>
                        <th nowgrap scope="col">Cantidad</th>
                        <th nowgrap scope="col">Descuento</th>
                        <th nowgrap scope="col">Total</th>
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

      <div class="modal fade" id="modalAddVenta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">REGISTRAR VENTA</div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Plato</label>
                        <select id="idPlato" class="form-control iptLogin idPlato">
                           <!-- All platos -->
                        </select>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Precio</label>
                        <input type="text" class="form-control iptLogin" id="precioPlato"  placeholder="Precio del plato" disabled />
                     </div>
                     <div class="col-md-12 mb-3">
                        <label for="" class="form-label lblLogin">Cliente</label>
                        <select id="cedCliente" class="form-control iptLogin cedCliente">
                           <!-- All clientes -->
                        </select>
                     </div>
                     <div class="row row-cols-2">
                        <div class="col-md-6 mb-2">
                           <label class="form-check-label lblLogin" for="">
                              Mayor de edad
                           </label>
                           <input class="form-check-input" type="checkbox" id="mayorEdad" disabled value="SI">
                        </div>
                        <div class="col-md-6 mb-2">
                           <label class="form-check-label lblLogin" for="">
                              Discapacidad
                           </label>
                           <input class="form-check-input" type="checkbox" id="discapacidad" >
                        </div>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Cantidad</label>
                        <input type="text" class="form-control iptLogin" id="cantidad"  placeholder="Ingrese cantidad a comprar" />
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Tipo de Pago</label>
                        <select id="tipoPago" class="form-control iptLogin">
                           <option value="" disabled selected>Seleccionar...</option>
                           <option value="Efectivo">Efectivo</option>
                           <option value="Tarjeta de débito">Tarjeta de débito</option>
                           <option value="Transferencia">Transferencia</option>
                        </select>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Descuento</label>
                        <input type="text" class="form-control iptLogin" id="descuento"  placeholder="Descuento" disabled/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Subtotal</label>
                        <input type="text" class="form-control iptLogin" id="subtotal"  placeholder="Subtotal" disabled/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">IVA</label>
                        <input type="text" class="form-control iptLogin" id="iva"  placeholder="IVA 12%" disabled/>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label for="" class="form-label lblLogin">Total</label>
                        <input type="text" class="form-control iptLogin" id="total"  placeholder="Total a pagar" disabled/>
                     </div>
                  </div>
               </div>

               <div class="modal-footer d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
                  <button type="button" class="btn btn-outline-primary btn-sm btnLogin" onclick="totalCalculate();">
                     Calcular
                  </button>
                  <button type="button" class="btn btn-outline-success btn-sm btnLogin" onclick="saveVenta();">
                     Guardar
                  </button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modalRanking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <div class="modal-title tittleModal">PLATOS MÁS VENDIDOS</div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="table-responsive">
                           <table id="listRanking" class="table table-striped table-bordered" style="color: #000">
                              <thead>
                                 <tr>
                                    <th nowgrap scope="col">Ranking</th>
                                    <th nowgrap scope="col">Plato</th>
                                    <th nowgrap scope="col">Cantidad</th>
                                 </tr>
                              </thead>

                              <tbody class="tableRanking">

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-sm btnLogin" data-bs-dismiss="modal">
                     Close
                  </button>
               </div>
            </div>
         </div>
      </div>

      <script>
         let platos = [], clientes = [];

         $(document).ready(function() {
            var opcion;
            opcion = 12;

            listVentas = $("#listVentas").DataTable({
               "destroy": true,
               "ajax": {
                  "method": "POST",
                  "url": "./process.php",
                  "data": { opcion:opcion },
                  "dataSrc":"" //Return PHP data [{}]
               },
               "columns": [
                  {"data": "idVenta"},
                  {"data": "nombrePlato"},
                  {"data": "nameCliente"},
                  // {"data": "nameVendedor"},
                  {"data": "discapacidad"},
                  {"data": "mayorEdad"},
                  {"data": "fecha"},
                  {"data": "cantidad"},
                  {"data": "descuento"},
                  {"data": "total"},
                  {"data": null,
                     render: function (data, type, row) {
                        return `<center><button type='button' class='btn btn-outline-danger bt-sm btnProcess' onclick="deleteVenta('${row.idVenta}', '${row.nameCliente}', '${row.fecha}');"><i class="fa-solid fa-trash-can" style="font-size: 13px;"></i></button></center>`
                     }
                  }
               ],
               "language": idioma,
               "responsive": "true"
            });
         });

         const modalOpen = () => {
            $('#precioPlato').val('');
            $('#mayorEdad').prop('checked', false);
            $('#discapacidad').prop('checked', false);
            $('#cantidad').val('');
            $('#tipoPago').val('');
            $('#descuento').val('');
            $('#subtotal').val('');
            $('#iva').val('');
            $('#total').val('');

            searchPlato();
            searchCliente();

            $('#modalAddVenta').modal('show');
         }

         const searchPlato = () => {
            $.ajax({
               url: './process.php',
               type: 'POST',
               datatype: 'JSON',    
               data: {
                  opcion: 8
               },
               dataSrc:""
            })
            .done(function(res){
               // Convert STRING to JSON
               var arr = JSON.parse(res);

               document.querySelector(".idPlato").innerHTML = `
                     <option value="" disabled selected>Seleccionar...</option>
                  `;

               arr.forEach(plato => {
                  document.querySelector(".idPlato").innerHTML += `
                        <option value="${plato.idPlato}">${plato.nombrePlato}</option>
                     `;

                  platos.push({
                     id: plato.idPlato,
                     precio: plato.precioPlato
                  })
               });

               // console.log(platos);
            })
            .fail(function(){
               console.log("Error");
            });
         }

         $('#idPlato').change(e => {
            // Capturamos el valor 'e.target.value'
            const val = e.target.value;
            const data = platos.find(item => item.id === val);
            $('#precioPlato').val(data.precio)
         });

         const searchCliente = () => {
            $.ajax({
               url: './process.php',
               type: 'POST',
               datatype: 'JSON',    
               data: {
                  opcion: 4
               },
               dataSrc:""
            })
            .done(function(res){
               // Convert STRING to JSON
               var arr = JSON.parse(res);

               document.querySelector(".cedCliente").innerHTML = `
                     <option value="" disabled selected>Seleccionar...</option>
                  `;

               arr.forEach(client => {
                  document.querySelector(".cedCliente").innerHTML += `
                        <option value="${client.cedula}">${client.nombres} ${client.apellidos}</option>
                     `;

                  clientes.push({
                     cedula: client.cedula,
                     fechaNacimiento: client.fechNacimiento
                  })
               });
            })
            .fail(function(){
               console.log("Error");
            });
         }

         $('#cedCliente').change(e => {
            // Capturamos el valor 'e.target.value'
            const val = e.target.value;
            const data = clientes.find(item => item.cedula === val);
            calcularEdad(data.fechaNacimiento);
         });

         const calcularEdad = (fecha) => {
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
               edad--;
            }

            if (edad >= 65) {
               $('#mayorEdad').prop('checked', true);
            } else {
               $('#mayorEdad').prop('checked', false);
            }
         }

         const totalCalculate = () => {
            let descuento = 0;

            cedCliente = $.trim($('#cedCliente').val());
            precioPlato = $.trim($('#precioPlato').val());
            discapacidad = $.trim($('#discapacidad').is(":checked"));
            mayorEdad = $.trim($('#mayorEdad').is(":checked"));
            cantidad = $.trim($('#cantidad').val());

            if (
               cedCliente === '' ||
               precioPlato === '' ||
               cantidad === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               pp = precioPlato * cantidad;

               if (discapacidad == 'true' || mayorEdad == 'true') {
                  descuento = pp * 0.15;
                  $('#descuento').val(`${descuento.toFixed(2)}`);
                  pp -= descuento;
               } else {
                  $('#descuento').val('0.0');
               }
               
               iva = pp * 0.12;
               $('#iva').val(`${iva.toFixed(2)}`);

               subtotal = pp - iva;
               $('#subtotal').val(`${subtotal.toFixed(2)}`);
               
               $('#total').val(`${pp.toFixed(2)}`);
            }
         }

         const saveVenta = () => {
            let opcion = 13;

            idPlato = $.trim($('#idPlato').val());    
            cedCliente = $.trim($('#cedCliente').val()); 
            discapacidad = $.trim($('#discapacidad').is(":checked"));
            mayorEdad = $.trim($('#mayorEdad').is(":checked"));
            cantidad = $.trim($('#cantidad').val());    
            tipoPago = $.trim($('#tipoPago').val());
            descuento = $.trim($('#descuento').val());
            subtotal = $.trim($('#subtotal').val());    
            iva = $.trim($('#iva').val());
            total = $.trim($('#total').val());
            
            if (
               idPlato === '' ||
               cedCliente === '' ||
               cantidad === '' ||
               tipoPago === '' ||
               descuento === '' ||
               subtotal === '' ||
               iva === '' ||
               total === ''
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
                     cedCliente: cedCliente,
                     discapacidad: (discapacidad == 'true') ? 'SI' : 'NO',
                     mayorEdad: (mayorEdad == 'true') ? 'SI' : 'NO',
                     cantidad: cantidad,
                     tipoPago: tipoPago,
                     descuento: descuento,
                     subtotal: subtotal,
                     iva: iva,
                     total: total
                  },
               })
               .done(function(respuesta){
                  if (respuesta === 'true') {
                     swal({
                        title: 'Venta guardada!',
                        text: "Se ha guardado la venta con éxito...",
                        icon: 'success',
                        button: 'OK!'
                     }).then((value) => {
                        if (value) {
                           listVentas.ajax.reload(null, false);
                           $('#modalAddVenta').modal('hide');
                        }
                     })
                  } else {
                     if (respuesta === 'false') {
                        swal({
                           title: 'Venta no registrada!',
                           text: "Upss! No se ha podido registrar la venta...",
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

         const deleteVenta = (idVenta, nameCliente, fecha) => {
            let opcion = 14;

            idVenta = $.trim(idVenta);    
            nameCliente = $.trim(nameCliente);
            fecha = $.trim(fecha);
            
            if (
               opcion === '' ||
               idVenta === '' ||
               nameCliente === '' ||
               fecha === ''
            ) {
               swal({
                  title: 'Campos Vacíos',
                  text: "Campos vacíos o con espacios...",
                  icon: 'warning',
                  button: 'OK!'
               })
            } else {
               swal({
                  title: 'Eliminar venta!',
                  text: `Desear eliminar la venta de ${nameCliente}, realizada el ${fecha}?`,
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
                           idVenta: idVenta
                        },
                     })
                     .done(function(respuesta){
                        if (respuesta === 'true') {
                           swal({
                              title: 'Venta eliminada!',
                              text: "Se ha eliminado la venta con éxito...",
                              icon: 'success',
                              button: 'OK!'
                           }).then((value) => {
                              if (value) {
                                 listVentas.ajax.reload(null, false);
                              }
                           })
                        } else {
                           if (respuesta === 'false') {
                              swal({
                                 title: 'Venta no eliminada!',
                                 text: "No se ha eliminado la venta...",
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

         const openModalRanking = () => {
            searchRanking();
            $('#modalRanking').modal('show');
         }

         const searchRanking = () => {
            $.ajax({
               url: './process.php',
               type: 'POST',
               datatype: 'JSON',    
               data: {
                  opcion: 15
               },
               dataSrc:""
            })
            .done(function(res){
               // Convert STRING to JSON
               var a = 0, arr = JSON.parse(res);

               document.querySelector(".tableRanking").innerHTML = ``;

               if (arr.length > 0) {
                  arr.forEach(plato => {
                     document.querySelector(".tableRanking").innerHTML += `
                           <tr>
                              <th nowrap="true" scope="row" class="text-center">${++a}</th>
                              <td nowrap="true">${plato.nombrePlato}</td>
                              <td nowrap="true" class="text-end">${plato.cantidad}</td>
                           </tr>
                        `;
                  });
               } else {
                  document.querySelector(".tableRanking").innerHTML += `
                        <tr>
                           <td colspan="3" class="table-info text-center">No existe datos x_x</td>
                        </tr>
                        `;
               }
            })
            .fail(function(){
               console.log("Error");
            });
         }

      </script>

   </body>

</html>