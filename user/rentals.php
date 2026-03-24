<?php session_start();
include("../config/db.php"); 
// $table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
$table_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE user_id='{$_SESSION['user_id']}'AND status='active'");
$return_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE user_id='{$_SESSION['user_id']}'AND status='returned'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Rentals</title>
  <link rel="stylesheet" href="../assets/css/userrentals.css">
  <!-- <link rel="stylesheet" href="./assets/css/home.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
</head>

<body>

<?php include("navbaru.php"); ?>

<!-- Main content container -->
<div class="container mt-5">

  <ul class="nav nav-pills gap-3" id="orderTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-orders" type="button">
        Active Orders
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="returned-tab" data-bs-toggle="tab" data-bs-target="#returned-orders" type="button">
        Returned Orders
      </button>
    </li>
  </ul>
  <div class="tab-content mt-3">

  <!-- Active Orders Tab -->
  <div class="tab-pane fade show active" id="active-orders">
    <div class="card">
      <div class="card-header bg-light text-dark">Active Orders</div>
      <div class="card-body p-0">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>days</th>
              <th>total</th>
              <th>Date Rented</th>
              <th>Due Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($table_query)) { ?>
                  <tr>
                      <td>OR-<?php echo $row['tracking_id']; ?></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td><?php echo $row['days']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td><?php echo $row['rented_date']; ?></td>
                      <td class='count_time' data-date="<?php echo $row['due_on']; ?>"></td>
                      <td>
                        
                        <form action= "../config/auth.php" method="POST">
                        <button type="submit" name= "item_return" class="btn btn-success btn-sm">Return</button>
                        <a href="#"><img src="../assets/image/extend.png" style= "width: 25px; height: 25px;"></a>
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

  <!-- Returned Orders Tab -->
  <div class="tab-pane fade" id="returned-orders">
    <div class="card">
      <div class="card-header bg-light">Returned Orders</div>
      <div class="card-body p-0">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Date Rented</th>
              <th>Date Returned</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_assoc($return_query)) { ?>
                  <tr>
                      <td>OR-<?php echo $row['tracking_id']; ?></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td><?php echo $row['rented_date']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td>
                        
                        <form action= "../config/auth.php" method="POST">
                        <button type="submit" name= "item_return" class="btn btn-success btn-sm">Returned</button>
                        <img src="../assets/image/redo.png" style= "width: 18px; height: 18px;">
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

<script>
  const time = document.querySelectorAll(".count_time");
  
  time.forEach(function(count_time) {

      setInterval (function() {
          const due_date = new Date(count_time.dataset.date);
          const current = new Date();
          const time_left = due_date - current;
          const days = Math.floor(time_left/(60 * 60 * 24 * 1000))
          const hours = Math.floor((time_left % (60 * 60 * 24 * 1000)) / 3600000)
          const minutes = Math.floor((time_left % (1000 * 60 * 60)) / 60000)
          count_time.textContent=days + "d " + hours + "h " + minutes + "m";

      }, 1000);

  });

  


</script>
  
</body>
</html>