<?php
require_once("conexion.php");
?>



<?php


if(isset($_POST['enviar'])){
    define('CLAVE', '6LcsULAdAAAAAMZ2Tn-2jiXyUYQnWO5nRPj-GNro');
    $token = $_POST['token'];
    $action = $_POST['action'];
    $nombre=$_POST['nombre'];
    $cu=curl_init();
    curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($cu, CURLOPT_POST, 1);
    curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
    curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($cu);
    curl_close($cu);
    $datos = json_decode($response, true);
   
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $identificacion=$_POST['identificacion'];
    $tipo_identificacion_id=$_POST['tipo_identificacion_id'];
    $id_sexo=$_POST['id_sexo'];
    $correo=$_POST['correo'];
    $direccion=$_POST['direccion'];
    $clave=$_POST['clave'];

    
    function nombre ($nombre){
        $nombre = filter_var(FILTER_SANITIZE_STRING);  
        return (preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]$/', $nombre));      
    }


    function apellido ($apellido){
        // echo '<script> apellidos("'.$apellidos.'") </script>';
        $apellido = filter_var(FILTER_SANITIZE_STRING); 
        return (preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]$/', $apellido)); 
    }



    //TELEFONO
    function telefono ($telefono){
        $telefono = filter_var(FILTER_SANITIZE_NUMBER_INT); 
        return (preg_match('/^[a-zA-Z ]{4,15}$/', $telefono)); 
    }




    if (
        isset($_POST['identificacion']) == false
        || $_POST['identificacion'] == ""
    ) {
        $error .= "La identificacion es obligatoria.\n";
    } else {
        $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
        if (filter_var($_POST['identificacion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
            $error .= "El identificacion solo debe tener números.\n";
        }
    }

    function identificacion ($identificacion){
        $identificacion = filter_var(FILTER_SANITIZE_NUMBER_INT); 
        return (preg_match('/^[a-zA-Z ]{4,15}$/', $identificacion)); 
    }


    function id_sexo ($id_sexo){
        $id_sexo = filter_var(FILTER_SANITIZE_STRING); 
        return (preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]$/', $id_sexo)); 
    }


    //VALIDAR CORREO PRINCIPAL// Solo acepta el correo si tiene un @ un punto (.) y texto despues del punto
    function correo ($correo){
        $correo = filter_var(trim($correo),FILTER_SANITIZE_EMAIL);
    
        // Validate user name
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            return (preg_match('/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)@[a-z0-9]+([\.-]+[a-z0-9]+)\.[a-z]{2,4}$/', $correo));
        } else{
            return FALSE;
        }  
    }


    function direccion ($direccion){
        $direccion = filter_var(FILTER_SANITIZE_STRING); 
        return (preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $direccion)); 
    }




    function clave ($clave){
        $clave = filter_var(FILTER_SANITIZE_STRING); 
        return (preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $clave)); 
    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //validar Captcha
        if($datos['success']==1 && $datos['score']>= 0.5){
            if($datos['action'] =='validarUsuario'){
                echo "<script>
                alert('CAPTCHA VALIDO'); window.location='index.php'
                </script>"; 
            }
            
        }
        else{
            echo "<script>
                alert('ERES UN ROBOT'); window.location='index.php'
                </script>"; 
        }
//--------------------------------------------------------------------------//
        if(empty($_POST["nombre"])){
            echo "<script>
                alert('Error por favor ingrese su nombre'); window.location='index.php'
                </script>";
        } 

        if(empty($_POST["apellido"])){
            echo "<script>
                alert('Error por favor ingrese sus apellidos'); window.location='index.php'
                </script>";
        } 
        

        if(empty($_POST["tipo_identificacion_id"])){
            echo "<script>
                alert('Error por favor seleccione un tipo de documento'); window.location='index.php'
                </script>";
        } 

        if(empty($_POST["identificacion"])){
            echo "<script>
                alert('Error por favor ingrese su numero de documento'); window.location='index.php'
                </script>";
        }

        if(empty($_POST["id_sexo"])){
            echo "<script>
                alert('Error por favor seleccione su sexo'); window.location='index.php'
                </script>";
        } 

        if(empty($_POST["correo"])){
            echo "<script>
                alert('Error por favor ingrese un correo'); window.location='index.php'
                </script>";
        } 

        if(empty($_POST["direccion"])){
            echo "<script>
                alert('Error por favor ingrese una direccion'); window.location='index.php'
                </script>";
        } 

        if(empty($_POST["telefono"])){
            echo "<script>
                alert('Error por favor ingrese su telefono'); window.location='index.php'
                </script>";
        }

        if(empty($nombre) && empty($apellido) && empty($tipo_identificacion_id) && empty($identificacion)  && empty($direccion) && empty($telefono) && empty($id_sexo)&& empty($direccion)){
            echo "<script>
                alert('Error no se puede hacer el envio por favor verifique los campos vacios'); window.location='index.php'
                </script>";
        }else{
            echo "<script>
                alert('Agregado con exitoso'); window.location='index.php'
                </script>";
        }
    }

   



   

    $inser_sql= "INSERT INTO persona(
                    nombre, 
                    apellido,
                    telefono,
                    identificacion, 
                    tipo_identificacion_id, 
                    id_sexo, 
                    correo,
                    direccion,
                    clave)


                    VALUES 

                    (
                        '$nombre', 
                        '$apellido',
                        '$telefono',
                        '$identificacion', 
                        '$tipo_identificacion_id', 
                        '$id_sexo', 
                        '$correo', 
                        '$direccion', 
                        '$clave')";

        
$resultado =  mysqli_query($conexion, $inser_sql);

    if($resultado){

    }else{
        echo "<script>
        alert('Error al insertar datos '); window.location='index.php'
        </script>";
    }

}


?>