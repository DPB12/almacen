<?php

if($_SESSION['user']->getRol()){
    header('Location: index.php');
}


if(isset($_GET['add'])){
    ObjetosRepository::addObjeto($_POST['nombre'], $_POST['descripcion'],$_POST['ubicacion'] ,$_POST['cantidad']);
}



if(isset($_GET['edit_objeto'])){
    if($_SESSION['user']->getRol() == 0){
       ObjetosRepository::updateObjeto($_POST['nombre'], $_POST['descripcion'],$_POST['ubicacion'] ,$_POST['cantidad'],$_POST['edit_objeto']);
    }
            
}

if(isset($_GET['edit_entrada'])){
    if($_SESSION['user']->getRol() == 0 || 1){
            ObjetosRepository::addEntradas($_POST['id_entrada'], $_POST['edit_entrada']);
            ObjetosRepository::updateEntradas($_POST['id_entrada'], $_POST['edit_entrada']);
            echo "hola";
    }
            
}


if(isset($_GET['edit_salida'])){
  
    if($_SESSION['user']->getRol() == 0 || 1 && ObjetosRepository::getCantidadActual($_POST['id_salida']) < 0 ){
            ObjetosRepository::addSalidas($_POST['id_salida'], $_POST['edit_salida']);
            ObjetosRepository::updateSalidas($_POST['id_salida'], $_POST['edit_salida']);
    }else{
    echo "No hay unidades de este producto que se puedan extraer";
}

            

}




$objetos = ObjetosRepository::getObjetos();
require_once('views/editObjetosView.phtml');

?>