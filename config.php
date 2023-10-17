<?php 
 
// Product Details 
// Minimum amount is $0.50 US 
$itemName = "Demo Product"; 
$itemPrice = 100;  
$currency = "USD";  
 
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_API_KEY', ''); 
define('STRIPE_PUBLISHABLE_KEY', ''); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'stripe'); 




 
?>