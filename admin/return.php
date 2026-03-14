<!-- <?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals");
?> -->

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
              <th>Image</th>
              <th>Title</th>
              <th>Category</th>
              <th>Pricing</th>
              <th>Status</th>
              <th>Activity</th>
            </tr>
          </thead>
          <tbody>
            
               <tr>
                <td colspan="6" class="text-center py-5 text-muted">
                  <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                  Nothing to see here.
                </td>
              </tr>
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
