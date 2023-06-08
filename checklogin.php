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
    $myusername = strtolower(mysqli_real_escape_string($connection, $_POST['username']));
    $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
    $sql = "";
    $user = UserModel::login(null, $myusername, $mypassword);
    //print_r($user);die;
    if ($user['error'] == 'Password does not match'){
        header("Location: ./login.php?message=error");
    }else{
        $_SESSION['id'] = $user['Codice'];
        header("location: ../piumenophp/pages/dashboard.php");
    }

?>