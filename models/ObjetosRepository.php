<?php

class ObjetosRepository {

    public static function getObjetos() {
        $objetos = [];
        $db = Database::conexion();
        $result = $db -> query("SELECT * FROM objetos");
        while ($datos = $result -> fetch_assoc()) {
            $objetos[] = new Objetos($datos);
        }
        return $objetos;
    }

    public static function getCantidadActual($id) {
        $db = Database::conexion();
        $result = $db -> query("SELECT cantidad FROM objetos WHERE id = $id");
        $datos = $result -> fetch_assoc();
        $total = intval($datos);
        return $total;
    }


    public static function addObjeto($nombre,$descripcion,$ubicacion,$cantidad) {
        $db=Database::conexion();
        $result = $db -> query("INSERT INTO objetos(nombre, descripcion, ubicacion, cantidad) VALUES ('$nombre',  '$descripcion', '$ubicacion', '$cantidad' );");
        return $result;
    }

    public static function updateObjeto($nombre,$descripcion,$ubicacion,$cantidad,$id) {
        $db=Database::conexion();
        $result = $db -> query("UPDATE objetos SET nombre = '$nombre', descripcion = '$descripcion', ubicacion = '$ubicacion', cantidad = '$cantidad' WHERE id = $id;");
        return $result;
    }
    public static function addEntradas($id,$entradas)
    {
        $db = Database::conexion();
        $result = $db->query("UPDATE objetos SET cantidad = cantidad + $entradas WHERE id = $id;");
       
    }
    public static function updateEntradas($id,$entradas)
    {
        $db = Database::conexion();
        $result = $db->query("UPDATE objetos SET entrada = entrada + $entradas WHERE id = $id;");

    }
    public static function addSalidas($id,$salidas)
    {
        $db = Database::conexion();
        $result = $db->query("UPDATE objetos SET cantidad = cantidad - $salidas WHERE id = $id;");
  
    }
    public static function updateSalidas($id,$salidas)
    {
        $db = Database::conexion();
        $result = $db->query("UPDATE objetos SET salida = salida + $salidas WHERE id = $id;");

    }




}

?>