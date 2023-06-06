<?php
require_once  "config.php";


class UserModel
{
    public static function get_all(){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM users_cityex";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }


    public static function get_orders($id){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM orders where costumer_id like ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
     public static function get_vouchers($id){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM history_vouchers where user_id like ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }



    public static function find_by_email($email){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array();
        $stmt->close();
        $connection->close();
        return $result;
    }
    public static function clear_reset_password_token($token){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "update users set reset_password=null where reset_password=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->affected_rows > 0;
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function find_by_linkedin_id($token){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM users WHERE linkedin_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array();
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function find_by_token($token){
        $session = SessionModel::find_by_token($token);
        if(!isset($session) or empty($session)) return null;
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM users where id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $session["user_id"]);
        $stmt->execute();
        $result = array();
        $result["user"] = $stmt->get_result()->fetch_array();
        $result["session"] = $session;
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function find_by_password_recovery_token($token){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "select * from users where reset_password=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array();
        $stmt->close();
        $connection->close();
        return $result;
    }

    /**
     * Saves user and returns its id, or false on fail
     *
     * @param mixed $conn if a mysqli connection is passed uses it, otherwise creates its own
     * @param array $user array that contains all user's data
     * @return mixed the user id or false on fail
     */
    public static function create($conn, $user){
        //create your own connection if connection is not provided
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }
        $user["password"] = isset($user["password"]) ? password_hash($user["password"], PASSWORD_DEFAULT) : null;
        $user["verify_email"] = uniqid();

        $sql = create_insert_query($connection, "users", $user);
        if($connection->query($sql) and $connection->affected_rows>0){
            $out = $connection->insert_id;
        }else{
            error_log("Error while creating user: " . $connection->error);
            $out = false;
        }
        if($conn === null) $connection->close();
        return $out;
    }

    public static function update($conn, $id, $update){
        //create your own connection if connection is not provided
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = create_update_query($connection, "users", $update, "id", $id);

        if($connection->query($sql) and $connection->affected_rows>0){
            $out = true;
        }else{
            error_log("Error while updating user: " . $connection->error);
            $out = false;
        }
        if($conn === null) $connection->close();
        return $out;
    }

    public static function logout($conn, $token){
        return SessionModel::delete($conn, $token);
    }

    public static function logout_all_sessions($conn, $user_id){
        return SessionModel::delete_all_user_sessions($conn, $user_id);
    }

    public static function login($conn, $username, $password){
        //create your own connection if connection is not provided
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connection -> connect_error;
        exit();
        }

        $sql ="SELECT * FROM users_cityex WHERE Posta_elettronica=? limit 1";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0) {
            if($conn === null) $connection->close();
            return array("error" => "User not found");
        }
        $user = $result->fetch_array();
        if(strcmp($password, $user["pwd"]) !== 0) {
            if($conn === null) $connection->close();
            return array("error" => "Password does not match");
        }
        return $user;
    }
   
    public static function changePassword($password, $token){
       $connection = new mysqli("localhost","root","","users");

// Check connection
if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "update users set password=? where reset_password=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $hash, $token);
        $stmt->execute();
        $result =$stmt->affected_rows == 1;
        if(!empty($connection->error)){
            error_log("Database error while changing password: " . $connection->error);
            return false;
        }
        $stmt->close();
        $connection->close();
        return $result;
    }
}