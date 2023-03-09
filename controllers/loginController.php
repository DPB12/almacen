<?php

if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    header('Location: index.php');
}

$error = '';

if (isset($_GET['redirect'])){
    $error = "No puede mandar mensajes sin iniciar sesión";
}

if(isset($_POST['logeo'])){
    if(isset($_POST['user']) && isset($_POST['password'])){
        $DB = Database::conexion();

        $q = "SELECT * FROM users WHERE user = '".$_POST['user']."'";
        $result = $DB->query($q);

        if($datos = $result->fetch_assoc()){

            if($datos['password'] === md5($_POST['password'])){
                $_SESSION['user'] = new User($datos);

                header('Location: index.php');
                return;
            }else{
                $error = "Contraseña incorrecta";
            }

        }else{
            $error = "No existe este usuario";
        }
    }
}

if(isset($_POST['registro'])){



    if((isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['password2']) && !empty($_POST['password2']))){
        $DB = Database::conexion();

        if($_POST['password'] === $_POST['password2']){
            $q = "SELECT * FROM users WHERE user = '".$_POST['user']."'";
            $result = $DB->query($q);

            if(!$result->num_rows){
                $q = "INSERT INTO users (user, password, firstname, lastname, dni) VALUES ('".$_POST['user']."', '".md5($_POST['password'])."', '".$_POST['firstname']."' ,'".$_POST['lastname']."', '".$_POST['dni']."')";
                $result = $DB->query($q);
            }else{
                $error = "Este usuario con este nombre ya existe";
            }
        }else{
            $error = "La contraseñas no coinciden";
        }
    }
    else{
        $error = "Datos obligatorios han faltado";
    }
}

require_once('views/loginView.phtml');

?>