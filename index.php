<?php
require_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LcsULAdAAAAAOKy8RetlPZnPVpvwGcZIGkCJftc"></script>


    <script>
       $(document).ready(function() {
        
            $('#enviar').click(function(){
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LcsULAdAAAAAOKy8RetlPZnPVpvwGcZIGkCJftc', {action: 'validarUsuario'}).then(function(token) {
                        //agregar elemento html
                        $('#form-login').prepend('<input type="hidden" name="token" value="'+token+'">;')
                        $('#form-login').prepend('<input type="hidden" name="action" value="validarUsuario">;')
                        $('#form-login').submit();
                    });
                    }); 
                }) 

        })
  </script>


    <title>Tarea 3</title>
</head>
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="img/inventario.jpg" width="400px" alt=""/>
                        <h3>Bienvenido</h3>
                        <p>Sistema de control de inventario</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Empleado</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">REGISTRAR PERSONA</h3>
                                <form action="guardar.php" method="post" id="form-login" class="row register-form" autocomplete="off">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombre *" name="nombre" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Apellido *" name="apellido" />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Telefono *" name="telefono" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Correo *" name="correo" />
                                        </div>
                                        
                                        <div class="form-group">
                                        <select class="form-control" name="id_sexo" id="">
                                    <option value="">(Seleccionar tipo de sexo)</option>
                                    <?php
                                $consulta2 = "SELECT * FROM sexo ORDER BY tipo_sexo";
                                $resultado2 = mysqli_query($conexion, $consulta2);
                                while ($rw2 = mysqli_fetch_assoc($resultado2)) {

                                    echo "<option value='$rw2[id_sexo]'>$rw2[tipo_sexo]</option>";
                                }
                                ?>
                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <input type="number" class="form-control"  placeholder="Identificacion *"name="identificacion" />
                                        </div>
                                        <div class="form-group">
                                        <select class="form-control" name="tipo_identificacion_id" id="">
                                    <option value="">(Seleccionar tipo de identificación)</option>
                                    <?php
                                $consulta1 = "SELECT * FROM tipo_identificacion ORDER BY nombre_tipo_identificacion";
                                $resultado1 = mysqli_query($conexion, $consulta1);
                                while ($rw1 = mysqli_fetch_assoc($resultado1)) {

                                    echo "<option value='$rw1[tipo_identificacion_id]'>$rw1[nombre_tipo_identificacion]</option>";
                                }
                                ?>
                                </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Direccion" name="direccion" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Clave *"  name="clave" />
                                        </div>
                                        <input  class="btnRegister" name="enviar" id="enviar"value="Registrarte"/> 
                                        </form>
                                   
                                </div>
                            </div>
                    </div>
                </div>     
            </div>          
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
