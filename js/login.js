// EN ESTA FUNCIÓN VAMOS A REALIZAR LAS VALIDACIONES PERTINENTES PARA PODER INGRESAR AL SISTEMA
function Login(){
    var usu = $("#txt_email").val(); //Tomo los valores que ingresamos en txt_email en index.php con el id txt_email
    var con = $("#txt_pass").val(); //Tomo los valores que ingresamos en txt_pass en index.php con el id txt_pass

    if(usu.length == 0 || con.length == 0){ //Si alguno de los 2 está vacio
        //Se retornara un mensaje obtenido de la libreria SweetAlert2  que instale en index.php
        return Swal.fire({icon: 'error', title: '¡HAY CAMPOS SIN LLENAR!', text: 'Por favor, ingresa correctamente los datos  y vuelve a intentarlo.', footer: '<a href="">¿Olvidaste tu contraseña o correo?</a>'})
    }else{
        // ajax Realiza una solicitud HTTP asincrónica 
        //asincronico recordemos que nos va a permitir ejecutar nuestros procesos en varios hilos de ejecución o lo que se conoce como multithreading. 
        //Partiendo del caso que vimos anteriormente el bloqueo, cola o tráfico ya no va a existir porque los usuarios no van a tener que esperar a que un hilo se libere para que otro pueda entrar.
        //Si ambos campos contienen información entonces mediante ajax va a consultar mediante POST los datos obtenidos del controlador de login
        $.ajax({
            url: '../controlador/controller_login.php',
            type: 'POST',
            data:{ //Estos son los datos que le vamos a enviar al controlador
                user:usu,
                pass:con
            }
        
           }).done(function(resp){
                //Recordemos que en el controlador el 0 nos indica que no tenemos datos en la consulta, osea que no retorno el resultado nuestro procedimiento almacenado, en este caso por la validación de la contraseña encriptada
                if(resp == 0 ){
               //Saldrá un mensaje obtenido de la libreria SweetAlert2  que instale en index.php     
                Swal.fire({icon: 'error', title: 'Correo / Contrase\u00f1a Incorrectos', text: 'Ingresa correctamente los datos para continuar', footer: '<a href="">¿Olvidaste tu contraseña o correo?</a>'});  
               }else{
                //JSON.parse() toma una cadena JSON y la transforma en un OBJETO de JavaScript y lo almacena en Data
                var data = JSON.parse(resp);
                //Ahora bien, en la posición [0][7] de nuestro data, tenemos el campo estatus del resultado de nuestro Procedimiento
                if(data[0][7] === 'INACTIVO' ){ //Si el estatus es INACTIVO
                    //Saldrá un mensaje obtenido de la libreria SweetAlert2  que instale en index.php      
                    return Swal.fire({icon: 'error', title: 'Usuario Inactivo', text: 'Sin privilegios de acceso', footer: '<a href="">¿Aún sigues laborando en SAMIX y tu estatus es INACTIVO?</a>'});  
                }
                console.log(data); //Para ver el JSON
                //Nuevamente con ajax mediante POST entramos al controlador de sesion
                $.ajax({
                    url: '../controlador/controller_session.php', //Controlador para crear la sesión
                    type: 'POST',
                    data:{ //Estos son los datos que le vamos a enviar al controlador
                        id_usuario: data[0][0],
                        nombre_usuario: data[0][1],
                        apellidoP_usuario: data[0][2],
                        apellidoM_usuario: data[0][3],
                        correo_usuario: data[0][4],
                        rol_usuario: data[0][8]
                    }
                }).done(function(resp){ //Si todo está bien, vamos a enviar un mensaje de Bienvenido
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })
                      
                      Toast.fire({
                        icon: 'success',
                        title: 'Ingresando a Samix...'
                      })
                    location.reload(); //Debemos recargar el login para poder ingresar al Panel
                })
               }
           });
    }
    


}


//FUNCION PARA MOSTRAR LOS USUARIOS
function listar_usuario(){
  //DECLARAMOS LA VARIABLE TABLE, QUE ES DONDE HACEMOS REFERENCIA A LA TABLA QUE TENEMOS EN NUESTRO HTML
    var table = $("#tabla_usuario").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10, //PAGINACION MAXIMA,EN ESTE CASO 10 PAGINAS
      "destroy":true, //PARA MOSTRAR LA INFORMACION (RECARGA LA INFO CADA QUE ACCESAS A LA PAGINA)
      "async": false ,
      "processing": true, //MUESTRA UN MENSAJE DE PROCESSING, SI ESTE TARDA EN CARGAR
      //Recordemos que el Método HTTP GET -> Información se envía de forma visible 
      //Método HTTP POST -> Información se envía de forma no visible
      "ajax":{ //DECLARAMOS LA URL Y EL TIPO DE CONSULTA
          "url":"../controlador/controller_listar_user.php",
          type:'POST'
      },
      //Las columnas que se tienen en el table del HTML van a contener la data que es el nombre del campo del Procedimiento
      //Almacenado que hicimos
      "columns":[
        {"data":"id_usuario"},
        {"data":"nombre_usuario"},
        {"data":"apellidoP_usuario"},
        {"data":"apellidoM_usuario"},
        {"data":"correo_usuario"},
        {"data":"nombre_rol"},
        //El render lo que realiza es poder accesar a ese dato, en este caso para comparar el data
        {"data":"estatus_usuario",
            render: function (data, type, row ) {
              //Si el estatus es ACTIVO, va a mostrar un span verde con ACTIVO
              if(data=='ACTIVO'){
                return "<span class='badge badge-success'>"+data+"</span>";                   
              //Si el estatus es INACTIVO, va a mostrar un span rojo con INACTIVO
                }else{
                return "<span class='badge badge-danger'>"+data+"</span>";                 
              }
            }
          },  
          //AL FINAL AGREGAMOS 2 BOTONES PARA LA ACCION
          {"defaultContent":"<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>"}
      ],
  });
  

}
