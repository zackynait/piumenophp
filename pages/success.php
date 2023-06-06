<?php
// Include configuration file 
require_once '../config.php';
include '../dbConnect.php';

    $pageview = $_GET['getID']; 
	$selectproduct =mysqli_query($db_conn, "select * from abbonamentocx where id = '$pageview' ");
    $rowproduct =mysqli_fetch_array($selectproduct,MYSQLI_ASSOC);
    $sub_name=mysqli_fetch_array(mysqli_query($db_conn, "SELECT descr FROM `subscriptions` where type = '".$rowproduct['Tipo_di_abbonamento']."' limit 1"),MYSQLI_ASSOC);
			
    $payment_id = $statusMsg = '';
    $ordStatus = 'error';

// Check whether stripe checkout session is not empty
if(!empty($_GET['session_id'])){
    $session_id = $_GET['session_id'];
    
    // Fetch transaction data from the database if already exists
    $sql = "SELECT * FROM orders WHERE checkout_session_id = '".$session_id."'";
    $result = $db_conn->query($sql);
	if ( !empty($result->num_rows) && $result->num_rows > 0) {
        $orderData = $result->fetch_assoc();
        
        $paymentID = $orderData['id'];
        $transactionID = $orderData['txn_id'];
        $paidAmount = $orderData['paid_amount'];
        $paidCurrency = $orderData['paid_amount_currency'];
        $paymentStatus = $orderData['payment_status'];
        
        $ordStatus = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    }else{
        // Include Stripe PHP library 
        require_once '../stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY);
        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
        
        if(empty($api_error) && $checkout_session){
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            // Retrieves the details of customer
            try {
                // Create the PaymentIntent
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            if(empty($api_error) && $intent){ 
                // Check whether the charge is successful
                if($intent->status == 'succeeded'){
                    // Customer details
                    $name = $customer->name;
                    $email = $customer->email;
                    
                    // Transaction details 
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount/100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;
                    					 // Insert transaction data into the database
                    $name_message=$rowproduct['Quantita_lettere_di_vettura'];
                     $c_id=$rowproduct['Codice'];
					$sql = "INSERT INTO orders(name,costumer_id,email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,checkout_session_id,created,modified) VALUES('".$name."','". $c_id."','".$email."','".$name_message."','".$rowproduct['Tipo_di_abbonamento']."','".$rowproduct['Costo carnet totale iva inclusa']."','".$paidCurrency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$paymentStatus."','".$session_id."',NOW(),NOW())";
                    $insert = $db_conn->query($sql);
                    $paymentID = $db_conn->insert_id;

                    $sql = "INSERT INTO history_vouchers(weight_range,quantity, status,timestamp,user_id,tipo_di_abbonamento,subscription_id ) VALUES('none','".$name_message."','".$paymentStatus."',NOW(),'". $c_id."','".$sub_name["descr"]."','".$rowproduct['Tipo_di_abbonamento']."')  ON DUPLICATE KEY UPDATE timestamp=NOW(), quantity=CAST(quantity AS INT)+".strval($name_message)."  ";
                    $db_conn->query($sql);
						$ordStatus = 'success';
						$statusMsg = 'Your Payment has been Successful!';
                   
                }else{
                    $statusMsg = "Transaction has been failed!";
                }
            }else{
                $statusMsg = "Unable to fetch the transaction details! $api_error"; 
            }
            
            $ordStatus = 'success';
        }else{
            $statusMsg = "Transaction has been failed! $api_error"; 
        }
    }
}else{
	$statusMsg = "Invalid Request!";
}
?>
<?php include('../_header.php'); ?>
<?php include('../_sidebar.php'); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Stripe Payment Status - codeat21 </title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
</head>
<body class="App">
	<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
	<div class="wrapper">
	<h4>Payment Information</h4>
		<?php if(!empty($paymentID)){ ?>


			  <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>Reference Number:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv" disabled value=<?php echo $paymentID; ?>></div>
                        </div>

			 <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>Transaction Id:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv1" disabled value= <?php echo $transactionID; ?>></div>
                        </div>
			 <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>Paid Amount:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv1" disabled value= <?php echo $paidAmount.' '.$paidCurrency; ?>></div>
                        </div>
              <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>Payment Status:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv1" disabled value= <?php echo $paymentStatus; ?>></div>
                        </div>
			<h4>Product Information</h4>
			 <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>id:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv1" disabled value=<?php echo $rowproduct['id']; ?>></div>
                        </div>
              <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>numero lettere di vettura:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv1" disabled value= <?php echo $rowproduct['Quantita_lettere_di_vettura'] ?>></div>
                        </div>

                <div class="form-group disabled">
                            <label class="form-control-label" for="cldv"><b>prezzo:</b></label>
                            <div class="input-group disabled"> <input type="text" class="form-control" id="cldv1" disabled value= <?php echo $rowproduct['Costo carnet totale iva inclusa'].' €' ?>></div>
                        </div>
		<?php }else{
		 ?>
		 <p> Errore nel sistema. contattare la nostra assistenza</p>
		 <?php }	 ?>
		  <div class="button-row d-flex mt-4">
		             <form action="dashboard.php">
                <button href="dashboard.php"  class="btn btn-primary ml-auto js-btn-next"  type="submit"    id="backdash">Back to Product Page</button>
                        </form>
          </div>

	</div>
</body>
</html>
