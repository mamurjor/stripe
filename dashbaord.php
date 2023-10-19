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
            
            include("dashboard-grid.php");


            include("main-content.php");
            ?>
          

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