<?php
session_start();

if(isset($_SESSION['username'])){



?>

<!DOCTYPE html>
<html lang="en">
  
<?php

include("header.php");



?>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     
      <?php
      
      require("navigation.php");
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       <?php
       include("sidebar.php");
       ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
           
            <!-- Page Title Header Ends-->
        
            <?php
            
            //include("dashboard-grid.php");


            //include("main-content.php");
            ?>
          
          <div class="row">
 
          <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description"> Basic form layout </p>
                        <form action="save-product.php" method="post" class="forms-sample">
                          <div class="form-group">
                            <label for="exampleInputEmail1">product name</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="product name">
                          </div>
                   

                          <div class="form-group">
                            <label for="exampleInputPassword1"> Select Product Categroy </label>
                            <select class="form-select form-select-lg mb-3" name="product_catid" aria-label=".form-select-lg example">
                            <?php
                                
                                include("config.php");
                                if($link==true){
                        
                                    $query = "SELECT * FROM category";
                                    $sql=mysqli_query($link,$query);
            
                                    //var_dump($sql);
            
                                    if(mysqli_num_rows($sql)>0){
            
                                      $serial=0;
            
                                     while( $rows=mysqli_fetch_assoc($sql)){
                                            ?>
                                <option value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?></option>

<?php

                                     }
                                    }
                                }

                                
                                ?>
                                
                              

                                </select>
                        
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1"> Select Product Brand </label>
                            <select class="form-select form-select-lg mb-3" name="product_brandid" aria-label=".form-select-lg example">
                                <!-- <option selected>Open this select menu</option> -->
                                
                                <?php
                                
                      
                                if($link==true){
                        
                                    $queryb = "SELECT * FROM brand";
                                    $sqlb=mysqli_query($link,$queryb);
            
                                    //var_dump($sql);
            
                                    if(mysqli_num_rows($sqlb)>0){
            
                                      $serial=0;
            
                                     while( $row=mysqli_fetch_assoc($sqlb)){
                                            ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

<?php

                                     }
                                    }
                                }

                                
                                ?>
                                
                              

                                </select>
                        
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">product Price</label>
                            <input type="text" class="form-control" name="product_sellprice" id="exampleInputEmail1" placeholder="product name">
                          </div>


                          <button type="submit" class="btn btn-success mr-2">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                
                </div>
              </div>
            
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         


<?php

include("footer.php");
        
    }

    else{
           
        header("location: login.php?msg=ai betach chor");
    }
?>