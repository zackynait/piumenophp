<?php 
// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_51ICOwgAGHJPX9pWk2C3cOPozFhTszgkDcTquu7BflAQ1Y934Bmez2aiwcEut4THpg4Jq1Hgq2Vsgrzim6fn7pf8h00ocqz6XkW');  
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51ICOwgAGHJPX9pWkgdLM02HrczHWfxNW9l0ZEgmLorNCEikz3CIens0bjNrpXgKFYfMGQwUZlj0fHNEFCDzllFm900n6XNa6MD'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/piumenophp/success.php'); 
define('STRIPE_CANCEL_URL', 'http://localhost/piumenophp/cancel.php'); 

// Database configuration   
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'users'); // WRTIE, your db name
?>



