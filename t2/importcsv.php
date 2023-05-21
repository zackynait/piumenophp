<?php
define('DB_SERVER', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_DATABASE', 'users'); 
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$csvFile = file('./cxclienti[2241].csv');

foreach ($csvFile as $line) {
    $b= explode(";",$line);  
}

$row = 1;
if (($handle = fopen("./cxabbonam[2240].csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) {
    $num = count($data);
    echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    for ($c=0; $c < $num; $c++) {
        echo $data[$c] . "<br />\n";
        $a= explode(";",$data[$c]);
        $sql = "INSERT INTO abbonamentocx values(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssssss", $a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6],$a[7],$a[8],$a[9]);
    $stmt->execute();
   
    }
  }

 //(Codice,Dest.,Ragione_sociale,campo_vuoto,Via,Cap,Citta,Provincia,Telefono,Cellulare,Sig.,cellulare1,Sig.1,Posta_elettronica,Banca_Reso,Iban,PEC,Codice_univoco_fatturazione) 
  $stmt->close();
  $connection->close();
  fclose($handle);
}
//Codice;Dest.;Ragione sociale; ;Via;Cap;Citta';Provincia ;Telefono;Cellulare;Sig.;Cellulare;Sig.;Posta elettronica;Banca Reso;Iban;PEC;Codice univoco fatturazione;
?>

