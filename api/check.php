<?php

include("model/cors.php");
include("model/auth.php");

$post = json_decode( $_POST['data'] );
$tokenManager = new TokenManager($post->mail);

$response = [
    'status' => 0
];

if(strval($tokenManager) == $post->token) {
    $response['status'] = 1;
}

echo json_encode( $response );