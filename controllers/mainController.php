<?php
//cargamos el modelo
require_once("models/UserModel.php");
require_once("models/UserRepository.php");
require_once("models/ObjetosModel.php");
require_once("models/ObjetosRepository.php");

session_start();

// Login y registro
if (!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['user'] = "";
    $datos['firstname'] = "";
    $datos['lastname'] = "";
    $datos['rol'] = "2";
    $datos['dni'] = "";
    $_SESSION['user'] = new User($datos);
}
if (isset($_GET['login']))
{
    require_once('controllers/loginController.php');
    die();
}elseif (isset($_GET['edit_objetos']) || isset($_GET['edit_objeto'])) {
    require_once('controllers/objetoController.php');
    die();
}elseif (isset($_GET['add'])) {
    require_once('controllers/objetoController.php');
    die();
}elseif($_SESSION['user']->getRol() == 0 || 1){
    if (isset($_GET['edit_entrada'])) {
    require_once('controllers/objetoController.php');
    die();
    }elseif (isset($_GET['edit_salida'])) {
    require_once('controllers/objetoController.php');
    die();
}
}else{
    require_once("views/loginView.phtml");
    die();
}


$objetos = ObjetosRepository::getObjetos();
$users = UserRepository::getUsers();
require_once("views/mainView.phtml");
?>