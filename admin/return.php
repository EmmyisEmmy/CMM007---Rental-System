<?php session_start();
include("../config/db.php"); 
// $table_query = mysqli_query($conn, "SELECT * FROM rentals");
$return_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE status='returned'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Returned Items</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>

        <div class="sidebar">
          <?php include("sidebar.php"); ?>
        </div>
      
        <div class="content">
          <div class="top">
            <div class="title">
              <h2>Returns</h2>
              
            </div>
          </div>

         
  <div class="content">



    <div class="contents-place">
      <p class="admin-title">All Posted Items</p>

      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
             <th>Order ID</th>
              <th>Title</th>
              <th>Quantity</th>
              <th>Date rented</th>
              <th>Date returned</th>
              <th>Admin Status</th>
              
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
                        
                        

                       
                          <form action="../config/auth.php" method="POST" class="d-flex gap-2 align-items-center">
                            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                              <select class= "form-select form-select-sm" style="width: 100px;" name="approval_status">
                                  <option value="pending" <?php if($row['approval_status'] == 'pending') echo 'selected';?>>pending</option>
                                  <option value="approved"  <?php if($row['approval_status'] == 'approved') echo 'selected';?>>approved</option>
                                  <option value="rejected"  <?php if($row['approval_status'] == 'rejected') echo 'selected';?>>rejected</option>
                              </select>
                              <button type="submit" class="btn btn-outline-secondary">update</button>
                              <input type="hidden" name="approval_update" value="1">
                            

                          </form>

                    
                      </td>
                      
                  </tr>       
              <?php } ?>
          </tbody>
              
        </table>
      </div>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
      

</body> 
</html>       
