<?php

class User
{
    public $id;
    public $name;
    public $firstname;
    public $lastname;
    public $rol;
    public $dni;


    public function __construct ($row){
        $this->id = $row['id'];
        $this->name = $row['user'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->rol = $row['rol'];
        $this->dni = $row['dni'];
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getDni()
    {
        return $this->dni;
    }

}
?>