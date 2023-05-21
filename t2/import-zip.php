<?php
require_once '../config.php'; 
include '../dbConnect.php';
$stack=[];
echo "starting ingestion"; 

$input = fopen("./elenc.csv", "r");
$quarto=2;
$quinto=2;

        while(!feof($input))
    {
            $line=fgets($input);
            if($line !=null)
            {
            $pieces = explode(",", $line);
                if (sizeof($pieces)>1 && $pieces[0]!="\"Descrizione\"")
                {
                        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                        $sql = "insert into cap values(?,?,?,?,?)";
                        if($pieces[3]=="\"X\"") {
                            $quarto=1;
                        }else{
                            $quarto=0;
                        } 
                        if($pieces[4]=="\"X\"") {
                            $quinto=1;
                        }else{
                            $quinto=0;
                        }       
                        $pieces[0]=str_replace("\"","",$pieces[0]);
                        $pieces[1]=str_replace("\"","",$pieces[1]);
                        $pieces[2]=str_replace("\"","",$pieces[2]);
                        echo $pieces[0]; 
                        echo $pieces[1];
                        echo $pieces[2];
                        echo $quarto;
                        echo $quinto."\n";
                        $stmt = $connection->prepare($sql);
                        $stmt->bind_param("sssii", $pieces[0],$pieces[1],$pieces[2],$quarto,$quinto);
                        $stmt->execute();
                        $result =$stmt->affected_rows == 1;                    
                        $stmt->close();
                        $connection->close();
                }
           
            }
        }
    

?>