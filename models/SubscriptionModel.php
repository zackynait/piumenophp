<?php
require_once  "config.php";

class SubscriptionModel
{
    public static function get_all(){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM subscriptions";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function get_history(){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM abbonamentocx";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
    public static function get_my_voucher($user){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM abbonamentocx where codice=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
}