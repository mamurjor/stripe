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
define('STRIPE_API_KEY', 'sk_test_51HCO93CqIYx6oZ8JEgybBfrZbbjTrrxHCALbniAC6KWi9e13fyFbbHlvGqjFBYiJudjH4j2k6USiaIW4os1YCSJU00sxPbhkke'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51HCO93CqIYx6oZ8JjQsqODDgKfsJrytUIlfBya0Gd2xDuP6j9rfxDPjTiJvAuPLSTzItfcXdMw0C4hKLBasEUSqq00qEfzsxTn'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'stripe'); 




 
?>