<?php session_start();
include("../config/db.php"); 
// $table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
$table_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE user_id='{$_SESSION['user_id']}'");
$amount_query = mysqli_query($conn, "SELECT SUM(total) FROM active_orders WHERE user_id='{$_SESSION['user_id']}'");
$amount = mysqli_fetch_row($amount_query);
$orderno_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE user_id='{$_SESSION['user_id']}'");
$orderno = mysqli_fetch_row($orderno_query);
$active_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE user_id='{$_SESSION['user_id']}' AND status='active'");
$active = mysqli_fetch_row($active_query);
$return_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE user_id='{$_SESSION['user_id']}' AND status='returned'");
$return = mysqli_fetch_row($return_query);
$cancel_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE user_id='{$_SESSION['user_id']}' AND status='cancelled'");
$cancel = mysqli_fetch_row($cancel_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Analytics</title>
  <link rel="stylesheet" href="../assets/css/userrentals.css">
  <!-- <link rel="stylesheet" href="./assets/css/home.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>

    .arrange {
      flex: 1;
      text-align: center;
      position: relative;
      
    }

  </style>
  
</head>

<body>

<?php include("navbaru.php"); ?>



<div class="container mt-5 px-5" style="justify-content: space-between;">

  
  <h4>Analytics</h4>


    <div class="card mb-3 p-3 container mt-4 px-5 d-flex flex-row">
        <div class="arrange" style="border-right: 1px solid #e0e0e0;">
          <strong><p>Total Amount Spent</p></strong>
          <p style="font-size: 23px;">£ <?php echo $amount[0]; ?> </i></p>
          
        </div>

        <div class="arrange" style="border-right: 1px solid #e0e0e0;">
          <strong><p>No. of Orders</p></strong>
          <p style="font-size: 23px;"><?php echo $orderno[0]; ?> </i></p>
        </div>

        <div class="arrange" style="border-right: 1px solid #e0e0e0;">
          <strong><p>Active Orders</p></strong>
          <p style="font-size: 23px;"><?php echo $active[0]; ?> </i></p>
        </div>
        
        <div class="arrange" style="border-right: 1px solid #e0e0e0;">
          <strong><p>Returned</p></strong>
          <p style="font-size: 23px;"><?php echo $return[0]; ?> </i></p></p>
        </div>

         <div class="arrange">
          <strong><p>Cancelled</p></strong>
          <p style="font-size: 23px;"><?php echo $cancel[0]; ?> </i></p>
        </div>
      
    </div>
 

  <hr>

  <div class="tab-pane fade show active" id="active-orders">
    <div class="card">
      <div class="card-header bg-light text-dark">Rental History</div>
      <div class="card-body p-0">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
              <th>days</th>
              <th>Spent</th>
              <th>Date Rented</th>
              <th>Date Returned</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($table_query)) { ?>
                  <tr>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td><?php echo $row['days']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td><?php echo $row['rented_date']; ?></td>
                      <td><?php echo $row['date_returned']; ?></td>
                      
                       <td>
                        
                        
                        <span class="badge rounded-pill text-bg-secondary">Returned</span>
                        
                      </td>
                  </tr>       
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


</div>

</div>


<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/69cf84c40987d41c34228b7d/1jl99t85p';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>

<footer class="footer-main mt-5">
  <div class="content-footer text-center py-3">
    <p>&copy; 2026 Orientals. All rights reserved.</p>
    <ul class="footer-links list-inline">
      <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
      <li class="list-inline-item"><a href="#">Terms of Service</a></li>
      <li class="list-inline-item"><a href="#">Contact Us</a></li>
    </ul>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
</body>
</html>