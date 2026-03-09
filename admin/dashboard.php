<?php session_start(); ?>
<!-- <?php include("../config/auth.php"); ?>
<!DOCTYPE html> -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
                    <span class="title">Available items for Rent</span>
                    <span class="No-items">24</span>
                    
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Returned Items</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>
                  

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Items Rented</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Outstanding</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Total Revenue</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Revenue Today</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Revenue this month</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Highest sales</span>
                    <span class="No-items">24</span>
                  </div>
                  <i class="fas fa-box sign"></i>
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