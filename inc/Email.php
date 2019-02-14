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
        
        $name = utf8_decode($name);

        $results = $sql->query("

            INSERT INTO tb_emails (desemail, desname, dtregister)
            VALUES (:desemail, :desname, NOW())
        
        ", 
        [
			":desemail"=>$email,
            ":desname"=>$name
                    
        ]);//END query

    }//END save





    public static function getCount():array
	{

		$sql = new Sql();

		$results = $sql->select("SELECT
		(SELECT COUNT(*) FROM tb_emails) AS nremails;"); 

		$data = $results[0];

		return $data;
		

	}//end getCount


    




    public static function generateCsv()
    {
        
        header("Content-type: application/csv");   
        header("Content-Disposition: attachment; filename=emails.csv");
        header("Pragma: no-cache"); 

        $sql = new Sql();

        $results = $sql->select("SELECT desemail, desname FROM tb_emails ORDER BY idemail DESC");

        $out = fopen( 'php://output', 'w' );

        if( $out )
        {

            foreach ( $results as $result ) 
            {
                fputcsv( $out, $result, ';' );

            }//end foreach

            fclose( $out );

        }//end if

    }//end generateCsv


    


    
}//END class Email



?>