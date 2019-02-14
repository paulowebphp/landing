<?php
session_start();

require 'inc/Sql.php';
require 'inc/functions.php';
require 'inc/User.php';
require 'inc/Email.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();



/** ************** VIEWS ******************* */

$app->get(

    '/',
	function() 
	{

		if( isset($_SESSION['iduser']) )
		{
			User::logout();
			
		}//end if
        
		require_once("views/index.php");
		
    }//end function

);//END route






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

});//END route






/** ************** LOGIN ******************* */


$app->get('/admin', function() 
{
	$count = Email::getCount();

	if( !User::checkLogin() )
	{
		require_once("views/admin/login.php");
		
	}//end if
	else
	{		
		require_once("views/admin/index.php");
		
	}//end else

});//END route






$app->get('/admin/login', function() {

	require_once("views/admin/login.php");

});//END route






$app->post('/admin/login', function() 
{
	
	$users = User::login($_POST["email"], $_POST["password"]);
	$count = Email::getCount();

	if( !isset($_SESSION[User::SESSION]) )
	{
		
		header("Location: /admin/login");
		exit;

	}//end if
	else
	{
		
		require_once("views/admin/index.php");

	}//end else

});//END route







$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /");
	exit;

});//END route







/** ************** EMAILS ******************* */


$app->get("/admin/emails", function(){

	if( !User::checkLogin() )
	{
		header("Location: /admin/login");
		exit;
	}//end if

	$emails = Email::listAll();
	
	require_once("views/admin/emails.php");

});//END route







$app->get("/admin/emails/csv", function(){

	if( !User::checkLogin() )
	{
		header("Location: /admin/login");
		exit;
	}//end if

	$csv = Email::generateCsv();

});//END route






/****** APP RUN ******** */
$app->run();
