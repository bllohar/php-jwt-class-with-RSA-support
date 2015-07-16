<?php

include '../src/JWToken.php';


$payload = array(
		'username' => 'bllohar',
		'userId'   => 1
);

$secret = "^&562!2wzJGH!222";

// Generate token with secret

$token = JWToken::encode($payload, $secret,'HS512');

echo $token. "<br/><br/><br/>";


try{
	$data = JWToken::decode($token,$secret,'HS512');

        var_dump($data);
}catch(Exception $e){
	echo $e->getMessage();
}


/* With algo -	RSA (Public Key/Private Key pair) */


$payload = array(
		'username' => 'bllohar',
		'userId'   => 1
);

$private_key = file_get_contents('keys/private_key.pem');

$public_key = file_get_contents('keys/public_key.pem');

// Generate token with Private key

$token = JWToken::encode($payload, $private_key,'RS256');

echo $token;

try{
	$data = JWToken::decode($token,$public_key,'RS256');

        var_dump($data);
}catch(Exception $e){
	echo $e->getMessage();
}
