<?php session_start(); ?>
<?php include("../config/db.php"); 
$tablecount_query = mysqli_query($conn, "SELECT COUNT(*) FROM users");
$Activerental_query = mysqli_query($conn, "SELECT COUNT(*) FROM rentals WHERE status = 'available'");
$count_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders");
$active_order_count = mysqli_fetch_row($count_query);
$revenue_query = mysqli_query($conn, "SELECT SUM(total) FROM active_orders");
$total_revenue_count_query = mysqli_fetch_row($revenue_query);
$count_return_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE status = 'returned'");
$return_order_count = mysqli_fetch_row($count_return_query);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  

</head>
<body>

      
        <?php include("sidebar.php"); ?>
       
        <div class="content">
          <div class="top">
            <div class="title">
              <h2>Admin Dashboard</h2>
              
            </div>
          </div>

          <div class="top">
            <div class="title">
              <h3 class="admin-title">Item stock</h3>
            <button type="button" class="btn btn-primary">
            Active Orders <span class="badge text-bg-secondary">0</span>
          </button>
              
            </div>
          </div>

          <div class="contents-place">
            <h3 class="admin-title">Statistics</h3>
          
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
                    <span class="No-items"><?php
                      echo $active_order_count[0];
                      ?></span>
                  </div>
                  <i class="fas fa-shopping-cart fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Returned Orders</span>
                    <span class="No-items"><?php
                      echo $return_order_count[0];
                      ?></span>
                  </div>
                  <i class="fas fa-undo fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Total Revenue</span>
                    <span class="No-items"><?php
                      echo $total_revenue_count_query[0];
                      ?></span>
                  </div>
                  <i class="fas fa-dollar-sign fa-xl"></i>
                </div>
              </div>

              <div class= "content-inside">
                <div class= "content-header">
                  <div class= "description">
                    <span class="title">Total Stock</span>
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

        
        
</body>
</html>