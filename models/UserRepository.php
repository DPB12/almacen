<?php

class userRepository
{

    public static function login($user, $password)
    {
        $db = Database::conexion();
        $result = $db->query("SELECT * FROM users WHERE user = '$user' AND password = '$password';");
        if ($datos = $result->fetch_assoc())
        {
            return new User($datos);
        }
    }

    public static function comprobarUsuarioDuplicado($user)
    {
        $db = Database::conexion();
        $result = $db->query("SELECT user FROM users WHERE user = '$user';");
        return $result->num_rows;
    }

    public static function registro($user, $password)
    {
        $db = Database::conexion();
        $result = $db->query("INSERT INTO users(user, password, rol) VALUES ('$user', md5('$password'), 1)");
    }

    public static function getUsers()
    {
        $usuarios = [];
        $db = Database::conexion();
        $result = $db->query("SELECT * FROM users");
        while ($datos = $result->fetch_assoc())
        {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

    public static function getTrabajadores()
    {
        $usuarios = [];
        $db = Database::conexion();
        $result = $db->query("SELECT * FROM users WHERE rol = 1");
        while ($datos = $result->fetch_assoc())
        {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

    public static function getJefes()
    {
        $usuarios = [];
        $db = Database::conexion();
        $result = $db->query("SELECT * FROM users WHERE rol = 0");
        while ($datos = $result->fetch_assoc())
        {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

  
}
?>