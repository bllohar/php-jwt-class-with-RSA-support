# PHP JWT Tokens with RSA Support
PHP Implementation of JSON Web token with RSA.

I needed a JWT support for one client mobile application with RSA public/private keys.

I thought i should share with you all. Feel free to modify and use in your project.

Supported algos : 
	RSA (Public Key/Private Key pair)
	
	RS256 - RSA using SHA-256 hash algorithm
	RS384 - RSA using SHA-384 hash algorithm
	RS512 - RSA using SHA-512 hash algorithm
	
	HMAC Algos : 
	
	HS256 - HMAC using SHA-256 hash algorithm (default)
	HS384 - HMAC using SHA-384 hash algorithm
	HS512 - HMAC using SHA-512 hash algorithm
	
# How to use with RSA public/private key

With composer

```shell
composer require bllohar/php-jwt-class-with-rsa-support
````
Or 
##### git clone https://github.com/bllohar/php-jwt-class-with-RSA-support.git

```php
include 'php-jwt-class-with-RSA-support/src/JWToken.php';
```

```php
$payload = array(
		'username' => 'bllohar',
		'userId'   => 1
);

//Please do not use key provided here in production they are just for demo.
$private_key = file_get_contents('keys/private_key.pem');
$public_key = file_get_contents('keys/public_key.pem');

// Generate token with Private key
$token = JWToken::encode($payload, $private_key,'RS256');

// Verifying the token
try{
	$data = JWToken::decode($token,$public_key,'RS256');

        var_dump($data);
}catch(Exception $e){
	echo $e->getMessage();
}
```

# How to use with HMAC

```php
$payload = array(
		'username' => 'bllohar',
		'userId'   => 1
);

$secret = "^&562!2wzJGH!222"; // your secret key [should store in ENV variable]

// Generate token with secret
$token = JWToken::encode($payload, $secret,'HS512');

// Verifying the token
try{
	    $data = JWToken::decode($token,$secret,'HS512');
        var_dump($data);
}catch(Exception $e){
	echo $e->getMessage();
}
```
