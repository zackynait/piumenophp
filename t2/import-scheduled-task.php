<?php
require_once '../config.php'; 
include '../dbConnect.php';
$stack=[];
function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
if ($handle = opendir('../track')) {
while (false !== ($entry = readdir($handle))) {
    if(startsWith($entry,"CE")){
        array_push($stack,$entry );
        }
}
foreach($stack as $s)
{
$input = fopen("../track/".$s, "r"); 
        while(!feof($input)) {
            $line=fgets($input);
            if ($line !=null)
            {
            $pieces = explode(" ", $line);
                if (sizeof($pieces)>1){
                echo $pieces[0]; // piece1
                echo $pieces[1]; // piece2
            try{  
                $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                $sql = "insert into tracking values(?,?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ss", $pieces[0],$pieces[1]);
                $stmt->execute();
                $result =$stmt->affected_rows == 1;
                echo $result;
                if(!$result)
                {
                    error_log("row not inserted:".$pieces[0]."".$pieces[1]." from file: ".$s);
                }
                $stmt->close();
                $connection->close();
            }catch (Exception  $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                error_log("query failed:".$e->getMessage());
            }
                }
           
            }
        }
        $status = rename("../track/".$s,"../track/processed/".$s);
        echo $status;

}
closedir($handle);
}
?>