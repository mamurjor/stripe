<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-6">
    
    <div class="auto-form-wrapper">
                <form action="checkout-save.php" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="username" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="email" class="form-control" name="email" placeholder="email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="cell" placeholder="cell">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="address" placeholder="address">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="birthdate" placeholder="birthdate">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="Confirm Password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" value="cashon" name="paymentmethod" id="flexRadioDefault1" >
                            <label class="form-check-label" for="flexRadioDefault1">
                               Cash On Delivary 
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" value="sslcommerce" name="paymentmethod" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">
                             SSLCommerce 
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" value="stripe" name="paymentmethod" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">
                             Stripe 
                            </label>
                            </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Confirm</button>
                  </div>
                  <div class="text-block text-center my-3">
                  <a href="http://localhost/codemanecom/cart.php" class="text-black text-small">Cart Update </a>
                 
                    <a href="http://localhost/codemanecom" class="text-black text-small">Continue Shoppint </a>
                 
                </div>
                </form>
              </div>
   



    </div>
    <div class="col-sm-6">

    <?php
      if (isset($_SESSION['cart'])) :
        $i = 1;
        foreach ($_SESSION['cart'] as $cart) :
      ?>
          <tr class="text-center">
         
            <td> product Name :   <?= $cart['pro_name']; ?> </br>  Product Price :   <?= $cart['pro_price']; ?></td>
           
         
           
     
     
     
         
      
        
     </tr>
      <?php
          $i++;
        endforeach;
      endif;
      ?>
    </div>

  </div>
</div>

</body>
</html>
