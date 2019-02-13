<?php 

class User
{

    const SESSION = "User";

	private $iduser;
	private $deslogin;
	private $despassword;
	private $dtregister;

	public function setIduser( $value ) { $this->iduser = $value; }
	public function getIduser() { return $this->iduser; }

	public function setDeslogin( $value ) { $this->deslogin= $value; }
	public function getDeslogin() { return $this->deslogin; }

	public function setDespassword( $value ) { $this->despassword = $value; }
	public function getDespassword() { return $this->despassword; }

	public function setDtregister( $value ) { $this->dtregister = $value; }
	public function getDtregister() { return $this->dtregister; }

	
    

	public static function checkLogin()
	{
		if( !isset($_SESSION['iduser']) )
		{
			return false;
		}
		else
		{
			return true;
		}

	}//END checkLogin


    public static function login($login, $password)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		)); 

		if (count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];

		if ( $password === $data["despassword"] )
		{

			$_SESSION['iduser'] = $data['iduser'];

		} 
		else 
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

    }//END login
    




	public static function logout()
	{

		unset($_SESSION['iduser']);
		session_destroy();

	}



}//END class User


?>