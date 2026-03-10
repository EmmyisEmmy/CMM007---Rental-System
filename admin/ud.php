<?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status != 'deleted'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rentals</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

       
      <?php include("sidebar.php"); ?>
      
      
        <div class="content">
          <div class="top">
            <div class="title">
              <h2>Available Rentals</h2>
              
            </div>
          </div>



    <div class="contents-place">
      <p class="admin-title">All Posted Items</p>

      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              
             
              <th>Image</th>
              <th>Title</th>
              <th>Category</th>
              <th>Pricing</th>
              <th>Quantity</th>
              <th>Condition</th>
              <th>Date Added</th>
              <th>Status</th>
            </tr>
          </thead>

            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($table_query)) { ?>
                  <tr>
                      
                      <td><?php echo $row['image']; ?></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['category']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td><?php echo $row['item_qty']; ?></td>
                      <td><?php echo $row['item_condition']; ?></td>
                      <td><?php echo $row['created_at']; ?></td>

                      <td>
                        
                        <form action= "../config/auth.php" method="POST">
                        <button type="submit" name= "item_delete" class="btn btn-danger btn-sm">Delete</button>
                        <button type="button" class="btn btn-success btn-sm">Edit</button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
      
   
