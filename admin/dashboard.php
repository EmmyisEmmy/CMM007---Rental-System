<?php session_start(); ?>
<?php include("../config/db.php"); 
$tablecount_query = mysqli_query($conn, "SELECT COUNT(*) FROM users");
$Activerental_query = mysqli_query($conn, "SELECT COUNT(*) FROM rentals WHERE status = 'available'");
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  

</head>
<body>

      
        <?php include("sidebar.php"); ?>
       
        <div class="content">
          <div class="top">
            <div class="title">
              <h2>Admin Dashboard</h2>
              
            </div>
          </div>

        

          <div class="contents-place">
            <h3 class="admin-title">Total stock</h3>
          
            <div class="first-box">
              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Registered Users</span>
                    <span class="No-items">
                      <?php
                      $number_display = mysqli_fetch_row($tablecount_query);
                      echo $number_display[0];
                      ?>
                     
                    </span>
                    
                  </div>
                  <i class="fas fa-users fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Available Items</span>
                    <span class="No-items">
                      <?php
                      $active_display = mysqli_fetch_row($Activerental_query);
                      echo $active_display[0];
                      ?>
                    </span>
                  </div>
                  <i class="fas fa-box-open fa-xl"></i>
                </div>
              </div>
                  

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Active Orders</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-shopping-cart fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Returned Orders</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-undo fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Total Revenue</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-dollar-sign fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Revenue Today</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-calendar-day fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Revenue this month</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-calendar-alt fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Highest sales</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-chart-line fa-xl"></i>
                </div>
              </div>

                </div>
              </div>
            </div>
          </div>
        
        </div>

        <hr>
        
</body>
</html>