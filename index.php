<?php

require 'inc/Email.php';
require 'inc/configuration.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
    function () {

        require_once("views/index.php");
        
    }
);

$app->post("/emails/create", function() {

	$email = new Email();

	if( isset($_POST["email"]) )
	{
		$email = $_POST["email"];

	}//end if
	
	if( isset($_POST["name"]) )
	{
		$name = $_POST["name"];

	}//end if

	$email->save( $email, $name );
	
	//header("Location: /	");
	//exit;

});

$app->get('/admin', function() 
{
    
	//User::verifyLogin();

	require_once("views/admin/index.php");

});

$app->get('/admin/login', function() {

	require_once("views/admin/login.php");

});


$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;

});


$app->get('/admin/logout', function() {

	//User::logout();

	header("Location: /admin/login");
	exit;

});



$app->get("/admin/emails", function(){

	//User::verifyLogin();

	//$products = Product::listAll();

	require_once("views/admin/emails.php");

});


$app->run();
