<?php 

class Csv
{
    
    public static function generateCsv()
    {

        $escapeChar = ';';

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
                fputcsv( $out, $result, $escapeChar );
            }//end foreach

            fclose( $out );

        }//end if

    }//end generateCsv

    



}//ENC class Csv



?>