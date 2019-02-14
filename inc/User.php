<?php 

class User
{

    const SESSION = "User";



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

		if ( $password === $data["despassword"] )
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

	}


	


}//END class User


?>