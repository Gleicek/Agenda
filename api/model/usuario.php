<?php

class Usuario {
    private $id;
    private $mail;
    private $pass;
    private $name;

    function __construct($id, $mail, $name, $pass) {
        $this->id = $id;
        $this->name = $name;
        $this->pass = $pass;
        $this->mail = $mail;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getMail() {
        return $this->phone;
    }
}
