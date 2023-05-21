<?php
require_once  "config.php";

class VoucherModel
{
    public static function get_all(){
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = "SELECT * FROM vouchers";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
}