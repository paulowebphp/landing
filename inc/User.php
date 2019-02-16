<?php 

class User
{

    const SESSION = "User";
	const ERROR = "UserError";
	const SUCCESS = "UserSucesss";



	private $iduser;
	private $deslogin;
	private $desperson;




	public function setIduser( $value ) { $this->iduser = $value; }
	public function getIduser() { return $this->iduser; }

	public function setDeslogin( $value ) { $this->deslogin= $value; }
	public function getDeslogin() { return $this->deslogin; }

	public function setDesperson( $value ) { $this->desperson = $value; }
	public function getDesperson() { return $this->desperson; }

	



	
    

	public static function checkLogin()
	{
		if( 
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION][0] > 0
		 )
		{
			return false;

		}//end if
		else
		{
			return true;

		}//end else

	}//END checkLogin







    public static function login( $login, $password )
	{
		$values = [];

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", 
		[

			":LOGIN"=>$login

		]);//end select

		if (count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}//end if

		$data = $results[0];

		

		if ( password_verify($password, $data["despassword"]) === true )
		{

			$user = new User();

			$user->setIduser($data['iduser']);
			$user->setDeslogin($data['deslogin']);
			$user->setDesperson($data['desperson']);
			
			$values = [$user->getIduser(), $user->getDeslogin(), $user->getDesperson()];


			//$_SESSION['iduser'] = $data['iduser'];
			$_SESSION[User::SESSION] = $values;
			
			return $user;

		} //end if
		else 
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}//end else

    }//END login
    




	public static function logout()
	{

		//unset($_SESSION['iduser']);
		$_SESSION[User::SESSION] = NULL;
		session_destroy();

	}//END logout





	/** AINDA NÃO TEM SIDO USADO POIS O PASSWORD ESTÁ SENDO COLOCADO DIRETAMENTE NO BANCO DE DADOS */
	public static function getPasswordHash( $password )
	{

		return password_hash(

			$password, 

			PASSWORD_DEFAULT, 
			
			[
				'cost'=>12

			]

		);//end password_hash

	}//END getPasswordHash






	public static function setError( $msg )
	{

		$_SESSION[User::ERROR] = $msg;

	}//END setError






	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}//END getError






	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;

	}//END clearError






	public static function setSuccess( $msg )
	{

		$_SESSION[User::SUCCESS] = $msg;

	}//END setSuccess






	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;

	}//END getSuccess






	public static function clearSuccess()
	{

		$_SESSION[User::SUCCESS] = NULL;

	}//END clearSuccess

	




}//END class User


?>