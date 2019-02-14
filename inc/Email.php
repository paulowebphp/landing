<?php

class Email
{


    public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_emails ORDER BY idemail DESC  LIMIT 15");

    }//END listAll
    





    public function save( $email, $name )
	{

		$sql = new Sql();

        $results = $sql->query("

            INSERT INTO tb_emails (desemail, desname, dtregister)
            VALUES (:desemail, :desname, CURRENT_DATE())
        
        ", 
        [
			":desemail"=>$email,
            ":desname"=>$name
                    
        ]);//END query

    }//END save
    


    


    
}//END class Email



?>