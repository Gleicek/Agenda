<?php

include("crud.php");

class TokenManager {
    private $key = "123";
    private $mail;

    function __construct($mail) {
        $this->mail = $mail;
    }

    private function token() {
    
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        $header = base64_encode(json_encode($header));

        $payload = [
            'iss' => 'a.com.br',
            'email' => $this->mail
        ];

        $payload = base64_encode(json_encode($payload));
        $secret = base64_encode(hash_hmac("sha256", "$header.$payload", $this->key, true));  
        
        return "$header.$payload.$secret";
    }

    public function __toString() {
        return $this->token();
    }
}

class Autentication {
    
    private $mail;
    private $pass;

    function __construct($mail, $pass) {
        $this->mail = $mail;
        $this->pass = $pass;
    }

    private function token() {
        return strval(new TokenManager($this->mail));
    }

    private function checkLogin() {
        $crudUsuario = new CrudUsuario();
        return $crudUsuario->getUserBy($this->mail)->getPass() == md5($this->pass);
    }

    /*
    *   Fornece um token se ocorrer uma validacao, caso contrario
    * fornece um erro
    */
    public function login() {
        $json_login = [
            'token' => null,
            'mail' => $this->mail 
        ];
        if(!$this->checkLogin($this->mail, $this->pass))
            return json_encode($json_login);
        
        $json_login['token'] = $this->token($this->mail);
        return json_encode($json_login);
    }

}
