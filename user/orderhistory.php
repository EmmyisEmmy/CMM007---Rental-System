<?php session_start();
include("../config/db.php"); 
// $table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
$table_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE user_id='{$_SESSION['user_id']}'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order History</title>
  <link rel="stylesheet" href="../assets/css/userrentals.css">
  <!-- <link rel="stylesheet" href="./assets/css/home.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
</head>

<body>

<?php include("navbaru.php"); ?>

<!-- Main content container -->
<div class="container mt-5">


  <!-- Active Orders Tab -->
  <div class="tab-pane fade show active" id="active-orders">
    <div class="card">
      <div class="card-header bg-light text-dark">History</div>
      <div class="card-body p-0">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
              <th>days</th>
              <th>total</th>
              <th>Date Rented</th>
              
              <th>Action</th>
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
                      
                      <td>
                        
                        <form action= "#" method="POST">
                        <button type="submit" name= "item_add" class="btn btn-success btn-sm">Return</button>
                        <input type="hidden" name="id_item" value="<?php echo $row['id']; ?>">
                        </form>
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