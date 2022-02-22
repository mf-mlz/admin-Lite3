
<!-- CARGAMOS LOGIN.JS DESDE LA RUTA DE INDEX.PHP YA QUE AHI SE CARGA ESTA PARTE DE CONTENIDO PRINCIPAL -->
<script type="text/javascript" src="../js/login.js?rev=<?php echo time();?>"></script>          
<div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #343a40; color: white;">
                <h3 class="card-title">CLIENTES</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <!-- TABLA USUARIO INICIO -->
              <table id="tabla_usuario" class="display responsive nowrap" style="width:100%; text-align:center;">
                <thead >
               
                    <tr>
                  <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">#</th>
                  <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 50px;">NOMBRE</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">APELLIDO P</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">APELLIDO M</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 150px;">CORREO</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">ROL</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">ESTATUS</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">ACCIÓN</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">#</th>
                  <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 50px;">NOMBRE</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">APELLIDO P</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">APELLIDO M</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 150px;">CORREO</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">ROL</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">ESTATUS</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">ACCIÓN</th>
                    </tr>
                </tfoot>                
            </table>
            <!-- TABLA USUARIO FIN -->
            </div>
          </div>
       
<!-- MANDAMOS A LLAMAR EL SCRIPT LISTAR_USUARIO       -->
<script>
    $(document).ready(function() {
      listar_usuario();
    });
  </script>

        