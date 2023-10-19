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
                        <form class="forms-sample">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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