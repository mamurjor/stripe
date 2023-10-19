<?php
session_start();
if(isset($_GET['pro_id'])){
   $proid = $_GET['pro_id'];   
   if(!empty($_SESSION['cart'])){
    $acol = array_column($_SESSION['cart'], 'pro_id');
    if (in_array($proid, $acol)) {     
      $_SESSION['cart'][$proid]['qty'] += 1;
    } else {      
      $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1
      ];

      $_SESSION['cart'][$proid] = $item;
    }
   }
   else{
        $item = [
            'pro_id' =>$_GET['pro_id'],
            'qty'     =>1
        ];
        $_SESSION['cart'][$proid]=$item;
   }
}



// if (isset($_GET['pro_id'])) {

//   $proid = $_GET['pro_id'];


//   if (!empty($_SESSION['cart'])) {

   
//     $acol = array_column($_SESSION['cart'], 'pro_id');

//     if (in_array($proid, $acol)) {

     
//       $_SESSION['cart'][$proid]['qty'] += 1;
//     } else {
      
//       $item = [
//         'pro_id' => $_GET['pro_id'],
//         'qty' => 1
//       ];

//       $_SESSION['cart'][$proid] = $item;
//     }
//   } else {
   
//     $item = [
//       'pro_id' => $_GET['pro_id'],
//       'qty' => 1
//     ];

//     $_SESSION['cart'][$proid] = $item;
    
//   }
// }
?>

<?php include 'header-shoppage.php'; ?>

<div class="container">
  <h1 class="my-4">Simple Cart (Core PHP)</h1>

  <div class="row">
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="uploads/pro2.jpg" class="card-img-top">

        <div class="card-body">
          <h5 class="card-title">Product 1</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore excepturi quam quia quo alias iste magni et.</p>
          <a href="index.php?pro_id=1" class="btn btn-success">Add to Cart</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="uploads/pro2.jpg" class="card-img-top">

        <div class="card-body">
          <h5 class="card-title">Product 2</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore excepturi quam quia quo alias iste magni et.</p>
          <a href="index.php?pro_id=2" class="btn btn-success">Add to Cart</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="uploads/pro3.jpg" class="card-img-top">

        <div class="card-body">
          <h5 class="card-title">Product 3</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore excepturi quam quia quo alias iste magni et.</p>
          <a href="index.php?pro_id=3" class="btn btn-success">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>

</div>
<?php include 'footer-shoppage.php'; ?>