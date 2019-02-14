<?php
session_start();

require 'inc/User.php';
require 'inc/Email.php';
require 'inc/configuration.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
	function() 
	{

		if( isset($_SESSION['iduser']) )
		{
			User::logout();
			
		}
        
		require_once("views/index.php");
		
    }
);

$app->post("/emails/create", function() {

	$newEmail = new Email();

	if( isset($_POST["email"]) )
	{
		$email = $_POST["email"];

	}//end if
	
	if( isset($_POST["name"]) )
	{
		$name = $_POST["name"];

	}//end if

	$newEmail->save( $email, $name );
	
	//header("Location: /	");
	//exit;

});

$app->get('/admin', function() 
{
	$count = User::getCount();

	if( !User::checkLogin() )
	{
		require_once("views/admin/login.php");
		
	}
	else
	{
		
		require_once("views/admin/index.php");
		
	}

	

});



$app->get('/admin/login', function() {

	require_once("views/admin/login.php");

});


$app->post('/admin/login', function() {

	$users = User::login($_POST["email"], $_POST["password"]);
	$count = User::getCount();

	if( !isset($_SESSION[User::SESSION]) )
	{
		
		header("Location: /admin/login");
		exit;
	}
	else
	{
		
		require_once("views/admin/index.php");

	}

	

});


$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /");
	exit;

});



$app->get("/admin/emails", function(){

	if( !User::checkLogin() )
	{
		header("Location: /admin/login");
		exit;
	}

	$emails = Email::listAll();

	require_once("views/admin/emails.php");

});


$app->run();
