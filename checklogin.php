<?php
if(!session_id())
{
    session_start();
}


require_once "./models/UserModel.php";
$connection = new mysqli("localhost","root","","users");

// Check connection
if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}


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
        header("location: dashboard.php");
      
    }

?>