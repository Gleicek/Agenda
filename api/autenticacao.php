<?php

include('model/auth.php');
include('model/cors.php');

$post = json_decode( $_POST['data'] );
$auth = new Autentication($post->mail, $post->pass);

echo $auth->login();