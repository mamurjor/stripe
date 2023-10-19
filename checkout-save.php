<?php
session_start();
include("config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$email = $_POST['email'];
$cell = $_POST['cell'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];
$paymentmethod = $_POST['paymentmethod'];

$orderid    = rand(100,1000);


// $query ="INSERT INTO user_registration(username,password,email,cell,address,birthdate) 
// VALUES ('$username','$password','$email','$cell','$address','$birthdate')";

// $user_last_id=DataSave($link,$query);

$sum=0;

if (isset($_SESSION['cart'])) :
    $i = 1;
  
    foreach ($_SESSION['cart'] as $cart) :

            $pro_id = $cart['pro_id'];
            $pro_name = $cart['pro_name'];
            $pro_pricee = $cart['pro_price'];
            $sum+=$cart['pro_price'];
            $pro_qty = $cart['qty'];
        // $query ="INSERT INTO pro_order(orderid,user_id,pro_id,pro_name,pro_pricee,pro_qty,payment_type) 
        // VALUES ($orderid,$user_last_id,$pro_id,'$pro_name',$pro_pricee,$pro_qty,'$paymentmethod')";

        //  DataSave($link,$query);
        

    endforeach;


endif;



 









if($paymentmethod=="sslcommerce"){
  


/* PHP */
$post_data = array();
$post_data['store_id'] = "hadij62073c48e7d22";
$post_data['store_passwd'] = "hadij62073c48e7d22@ssl";
$post_data['total_amount'] = $sum;
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://localhost/codemanecom/payment/success.php";
$post_data['fail_url'] = "http://localhost/codemanecom/payment/fail.php";
$post_data['cancel_url'] = "http://localhost/codemanecom/payment/cancel.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $username;
$post_data['cus_email'] = $email;
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = "01711111111";
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "testhadijep95";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = $orderid;
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";




# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;
} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
	echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
	# header("Location: ". $sslcz['GatewayPageURL']);
	exit;
} else {
	echo "JSON Data parsing error!";
}




}
else if($paymentmethod=="stripe"){

 
 
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 

  ?>

<?php
// Include configuration file

?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<div class="panel">
<div class="panel-heading">

<!-- Product Info -->
<p><b>Item Name:</b> <?php echo $itemName; ?></p>
<p><b>Price:</b> <?php echo '$' . $sum . ' ' . $currency; ?></p>
</div>
<div class="panel-body">
<!-- Display errors returned by createToken -->
<div id="paymentResponse"></div>
<!-- Payment form -->
<form action="payment.php?price=<?php echo $sum;?>" method="POST" id="paymentFrm">
<div class="form-group">
<label>NAME</label>
<input type="nummber" name="itemprice" value="<?php echo  $sum; ?>">
<input type="text" name="name" id="name" class="field" placeholder="Enter name" required="" autofocus="">
</div>
<div class="form-group">
<label>EMAIL</label>
<input type="email" name="email" id="email" class="field" placeholder="Enter email" required="">

</div>
<div class="form-group">
<label>CARD NUMBER</label>
<div id="card_number" class="field"></div>
</div>
<div class="row">
<div class="left">
<div class="form-group">
<label>EXPIRY DATE</label>
<div id="card_expiry" class="field"></div>
</div>
</div>
<div class="right">
<div class="form-group">
<label>CVC CODE</label>
<div id="card_cvc" class="field"></div>
</div>
</div>
</div>
<button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
</form>
</div>
</div>
</body>
<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
// Create an instance of elements
var elements = stripe.elements();
var style = {
base: {
fontWeight: 400,
fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
fontSize: '16px',
lineHeight: '1.4',
color: '#555',
backgroundColor: '#fff',
'::placeholder': {
color: '#888',
},
},
invalid: {
color: '#eb1c26',
}
};
var cardElement = elements.create('cardNumber', {
style: style
});
cardElement.mount('#card_number');
var exp = elements.create('cardExpiry', {
'style': style
});
exp.mount('#card_expiry');
var cvc = elements.create('cardCvc', {
'style': style
});
cvc.mount('#card_cvc');
// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
if (event.error) {
resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
} else {
resultContainer.innerHTML = '';
}
});
// Get payment form element
var form = document.getElementById('paymentFrm');
// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
e.preventDefault();
createToken();
});
// Create single-use token to charge the user
function createToken() {
stripe.createToken(cardElement).then(function(result) {
if (result.error) {
// Inform the user if there was an error
resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
} else {
// Send the token to your server
stripeTokenHandler(result.token);
}
});
}
// Callback to handle the response from stripe
function stripeTokenHandler(token) {
// Insert the token ID into the form so it gets submitted to the server
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);
// Submit the form
form.submit();
}
</script>
</html>

  <?php
}
else{
    echo "Cashon";
}




?>