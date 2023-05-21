<?php
 session_start();
echo $_SESSION;
$id=$_REQUEST["id"];
$qty=$_REQUEST["quantity"];

            if( isset($id) && isset($qty))
            {

                            if( isset($_SESSION["cart"][$id]))
                            {
                            $_SESSION["cart"][$id] =$_SESSION["cart"][$id]+ $qty;
                            }
            else{
            $_SESSION["cart"][$id] = $qty;
            }
}
echo json_encode($_SESSION);

?>


