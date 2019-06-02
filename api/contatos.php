<?php

include("model/cors.php");
include("model/auth.php");
include_once("model/crud.php");

$post = json_decode( $_POST['data'] );
$tokenManager = new TokenManager($post->mail);

$response = [
    'status' => 0
];

if(strval($tokenManager) == $post->token) {
    $usuario = new CrudUsuario();
    $response['contatos'] = $usuario->getContatosBy($post->mail);
    $response['status'] = 1;
    echo json_encode( $response );
} else {
    echo json_encode( $response );
}

