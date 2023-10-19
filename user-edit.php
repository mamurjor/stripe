<?php
session_start();





if(isset($_SESSION['username'])){





$id = $_GET['id'];

$link = mysqli_connect("localhost","root","","codemanbd");




$query = "SELECT * FROM user_registration WHERE id = $id";


$result=mysqli_query($link,$query);

$row=mysqli_fetch_assoc($result);




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
                        <form action="user-update.php?id=<?php echo $row['id'];?>" method="post" class="forms-sample">
                          <div class="form-group">
                            <label for="exampleInputEmail1">username</label>
                            <input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" id="exampleInputEmail1" placeholder="Enter email">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">email</label>
                            selct id, name from category where id ='';
                            <label for="cars">Choose a car:</label>
<select  name="cars" id="cars">
  <optgroup label="Swedish Cars">

    <option selected > hadi</option>

    <option value="saab">Saab</option>
  </optgroup>

</select>

                            <input type="text" class="form-control" value="<?php echo $row['catid'];?>" name="email" id="exampleInputEmail1" placeholder="Enter email">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">cell</label>
                            <input type="text" class="form-control" value="<?php echo $row['cell'];?>" name="cell" id="exampleInputEmail1" placeholder="Enter email">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">address</label>
                            <input type="text" class="form-control" value="<?php echo $row['address'];?>" name="address" id="exampleInputEmail1" placeholder="Enter email">
                          </div>
                      
                          <button type="submit" class="btn btn-success mr-2">Update</button>
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