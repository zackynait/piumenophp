<?php
require_once  "config.php";

class trattaModel
{
    public static function find_one($id){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM companies c 
            WHERE company_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        if ($result->num_rows === 0){
            return false;
        }else{
            return $result->fetch_assoc();
        }
    }
    public static function find_by_name($name){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT company_id FROM companies WHERE name=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array();
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function search_by_name($name){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $name = "%$name%";
        $sql = "SELECT * FROM cap WHERE cap_number like ? order by cap_number";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }

    public static function get_all_caps(){
        $connection = new mysqli("localhost","root","","users");

        // Check connection
        if ($connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connection -> connect_error;
          exit();
        }        $sql = "SELECT * FROM cap";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();
        return $result;
    }


}
