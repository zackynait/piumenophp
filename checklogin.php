<?php
if(!session_id())
{
    session_start();
}


require_once "./models/UserModel.php";
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$error = "";

    // username and password sent from form

    $myusername = strtolower(mysqli_real_escape_string($connection, $_POST['username']));
    $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
    $sql = "";
    $user = UserModel::login(null, $myusername, $mypassword);
    if (isset($user["error"])){
        $error = $user["error"];
        echo $error;
    }else{
        //login successful
       
     
        $_SESSION['id'] = $user['Codice'];
        header("location: inside.php");
      
    }

?>