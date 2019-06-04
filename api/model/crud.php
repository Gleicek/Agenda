<?php

include("usuario.php");

class Connection {

    private $link;

    private function open() {
        $con = mysqli_connect("localhost", "root", "root", "agendadb", "8889");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());}                    
        $this->link = $con;
    }

    private function close() {
        mysqli_close($this->link);
    }

    public function makeQuery($query) {
        $this->open();
        $result = mysqli_query($this->link, $query);
        $this->close();
        return $result;
    }
}


class CrudUsuario {

    private $conection;

    function __construct() {
        $this->conection = new Connection();
    }

    public function getUserBy($mail) {
        $res = $this->conection->makeQuery("select * from usuarios where mail='$mail'");
        $ret = NULL;
        foreach($res as $u) {
            $id = $u['id'];
            $name = $u['nome'];
            $pass = $u['pass'];
            $mail = $u['mail'];

            $ret = new Usuario($id, $mail, $name, $pass);
        }
        return $ret;
    }

    public function getContatosBy($mail) {
        $usuario = $this->getUserBy($mail);
        $res = $this->conection->makeQuery("select * from contatos where contato_id=".$usuario->getId());
        $ret = array();
        
        foreach($res as $u) {
            $obj = [
                "name" => $u['nome'],
                "tel"  => $u['tel'],
                "mail" => $u['mail']
            ];
            array_push($ret, $obj);
        }
        $ret = array_values($ret);
        return json_encode($ret);
    }
}

//echo $usuario->getUserBy("jose@mail.com")->getPass();