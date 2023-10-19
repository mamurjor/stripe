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
 
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">

                    <?php
                    if(isset($_GET['msg'])){
                      echo $_GET['msg'];
                    }
                    
                    ?>
                    </h4>
                    <p class="card-description"> Add class <code>.table-striped</code> </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> SLN </th>
                          <th> username </th>
                          <th> email </th>
                          <th> cell </th>
                          <th> address </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>


                      <?php
                      
                      include("config.php");

                    if($link==true){
                        
                        $query = "SELECT * FROM user_registration";
                        $sql=mysqli_query($link,$query);

                        //var_dump($sql);

                        if(mysqli_num_rows($sql)>0){

                          $serial=0;

                         while( $userlist=mysqli_fetch_assoc($sql)){

                            ?>

                          <tr>
                          <td class="py-1">
                          <?php echo $serial+=1;?>
                        </td>
                          <td> <?php echo $userlist['username'];?> </td>
                          <td>
                          <?php echo $userlist['email'];?> 
                          </td>
                          <td>  <?php echo $userlist['cell'];?> </td>
                          <td>  <?php echo $userlist['address'];?> </td>

                          <td> <a href="user-edit.php?id=<?php echo $userlist['id'];?>">Edit</a> || <a href="user-delete.php?id=<?php echo $userlist['id'];?>" onclick=" return confirm('ai beta detelte ki korte chaw');" target="_self" rel="noopener noreferrer"> Delete </a>  </td>
                        </tr>
                            <?php
                          
                         }
                        }
                        else{
                          echo "Data pai nai";
                        }
                    }
                    else{
                      echo "Sorry";
                    }

               
                      ?>
                        
                        
                      </tbody>
                    </table>
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