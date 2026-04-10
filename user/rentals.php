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
              <th>Status</th>
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
                      <td>
                        <?php 
                        if ($row['delivery_status'] == 'warehouse') {
                          echo '<span class="badge rounded-pill text-bg-danger">Warehouse</span>';
                        }elseif ($row['delivery_status'] == 'shipped') {
                          echo '<span class="badge rounded-pill text-bg-warning">shipped</span>';

                        }elseif ($row['delivery_status'] == 'received') {
                          echo '<span class="badge rounded-pill text-bg-secondary">received</span>';

                        }
                       
                        ?>
                      </td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td><?php echo $row['days']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td><?php echo $row['rented_date']; ?></td>
                      <td class='count_time' data-date="<?php echo $row['due_on']; ?>" data-stats="<?php echo $row['delivery_status']; ?>"></td>
                      <td>
                        
                        <form action= "../config/auth.php" method="POST">
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success btn-sm">Return</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Thank You!</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>What's the condition of the item?</p>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bad</button>
                                      <button type="submit" name= "item_return" class="btn btn-secondary">Good</button>
                                      <p>Leave a Review on your item</p>
                                    </div>
                                    <!-- <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name= "item_return" class="btn btn-primary">return</button>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                        <button type="submit" name= "order_cancel" class="btn btn-danger btn-sm">Cancel Order</button>
                        <a href="extenddelivery.php?id=<?php echo $row['id']; ?>"><img src="../assets/image/extend.png" style= "width: 25px; height: 25px;"></a>
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
              <th>Action</th>
              <th>Approval Status</th>
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
                      <td><?php echo $row['date_returned']; ?></td>
                      <td>
                        
                        <form action= "../config/auth.php" method="POST">
                        <span class="badge rounded-pill text-bg-secondary">Returned</span>
                        <!-- <img src="../assets/image/redo.png" style= "width: 18px; height: 18px;"> -->
                        <input type="hidden" name="id_item" value="<?php echo $row['id']; ?>">
                        </form>
                      </td>
                      <td>
                         
                        <?php 
                        if ($row['approval_status'] == 'rejected') {
                          echo '<span class="badge rounded-pill text-bg-danger">rejected</span>';
                        }elseif ($row['approval_status'] == 'pending') {
                          echo '<span class="badge rounded-pill text-bg-warning">pending</span>';

                        }elseif ($row['approval_status'] == 'approved') {
                          echo '<span class="badge rounded-pill text-bg-success">approved</span>';

                        }
                       
                        ?>
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
<?php include("../notification.php"); ?>

<script>
  const time = document.querySelectorAll(".count_time");
  
  time.forEach(function(count_time) {

      setInterval (function() {
          const status_item = count_time.dataset.stats;
          if (status_item !== 'received') {
              count_time.textContent = 'Pending'
              return;
          }
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
  
</body>
</html>