<?php
require_once  "config.php";

class WeightsModel
{
    public static function get_all(){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM weights";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }
}