<?php
// Include configuration file  
require_once 'config.php'; 
include 'dbConnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title> Stripe Checkout in PHP </title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="App">
	<h1>How to Integrate Stripe Payment Gateway in PHP</h1>
	<div class="wrapper">
        <!-- Display errors returned by checkout session -->
		<div id="paymentResponse"></div>
		<?php 
			$results = mysqli_query($db_conn,"SELECT * FROM products where status=1");
             foreach ($results as $r){ ?>
			<div class="col__box">
			  <h5><?= $r['name'] ?></h5>
				<h6>Price: <span> € <?= $r['price'] ?> </span> </h6>
			
				<!-- Buy button -->
				<div id="buynow">
					<button class="btn__default" id="payButton"> Add to cart </button>
				</div>
			</div>
             <?php } ?>
	</div>		
<script>
var buyBtn = document.getElementById('payButton');
var responseContainer = document.getElementById('paymentResponse');    
// Create a Checkout Session with the selected product
var createCheckoutSession = function (stripe) {
    console.log("sta checkout s");
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
			Name:"<?php echo $r['name']; ?>",
			ID:"<?php echo $r['id']; ?>",
			Price:"<?php echo $r['price']; ?>",
			Currency:"<?php echo $r['currency']; ?>",
        }),
    }).then(function (result) {
        console.log("ret checkout s");
        return result.json();
    });
};

// Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = false;
    buyBtn.textContent = 'Buy Now';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Please wait...';
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});
</script>
</body>
</html>