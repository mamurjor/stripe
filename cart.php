<?php session_start(); ?>

<?php include 'header-shoppage.php'; ?>

<div class="container">
  <table class="table my-3">
    <a href="emptycart.php" class="btn btn-sm btn-danger mt-2">Empty Cart</a>
    <thead>
      <tr class="text-center">
        <th>S.no</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>

   

    <tbody>

    

      <?php
      if (isset($_SESSION['cart'])) :
        $i = 1;
        foreach ($_SESSION['cart'] as $cart) :
      ?>
          <tr class="text-center">
            <td><?php echo $i; ?> # </td>
            <td>  <?= $cart['pro_name']; ?></td>
            <td>  <?= $cart['pro_price']; ?></td>
            <td>
              <form action="update.php" method="post">
                <input type="number" value="<?= $cart['qty']; ?>" name="qty" min="1">
                <input type="hidden" name="upid" value="<?= $cart['pro_id']; ?>">
            </td>
            <td>
              <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
              </form>
            </td>
            <td><a class="btn btn-sm btn-danger" href="removecartitem.php?id=<?= $cart['pro_id']; ?>">Remove</a></td>
          </tr>
      <?php
          $i++;
        endforeach;
      endif;
      ?>
    </tbody>
  </table>
  <a href="checkout.php" class="btn btn-sm btn-success"> Checkout </a>
</div>
<?php include 'footer-shoppage.php'; ?>