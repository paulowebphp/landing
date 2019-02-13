<?php

class Email
{


    public function save( $email, $person )
	{

		$sql = new Sql();

        $results = $sql->query("

            INSERT INTO tb_email_list (desemail, desname, dtregister)
            VALUES (:desemail, :desname, CURRENT_DATE())
        
        ", 
        [
			":desemail"=>$email,
            ":desname"=>$person
                    
        ]);//END query

	}//END save


    
}//END class Email



?>