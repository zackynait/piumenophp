<?php
require_once  "config.php";

class SubscriptionModel
{
    public static function get_all(){
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = "SELECT * FROM subscriptions";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function get_history(){
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = "SELECT * FROM abbonamentocx";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
    public static function get_my_voucher($user){
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = "SELECT * FROM abbonamentocx where codice=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
}