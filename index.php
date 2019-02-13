<?php

require 'inc/EmailList.php';
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

$app->post("/email-list/create", function() {

	$emailList = new EmailList();

	if( isset($_POST["email"]) )
	{
		$email = $_POST["email"];

	}//end if
	
	if( isset($_POST["name"]) )
	{
		$name = $_POST["name"];

	}//end if

	$emailList->save( $email, $name );
	
	//header("Location: /	");
	//exit;

});

$app->run();
