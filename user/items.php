<?php session_start();
include("../config/db.php"); 
$id = $_GET['id'];
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id= '$id'");
$row = mysqli_fetch_assoc($table_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/userrentals.css">
  <link rel="stylesheet" href="../assets/css/userrentals.css">
  <link rel="stylesheet" href="../assets/css/items.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <title>More Details</title>
</head>
<body>

  <?php include("navbaru.php"); ?>


<div class="container mt-4" >
      <div class="row">
          <div class="col-12">
              <div class="card p-3" style="border: 1px solid #e0e0e0;">
                  <img src="../assets/image/<?php echo $row['image'];?>"style="width: 50%; height: 300px; object-fit: cover; border-radius: 8px;">
              </div>
          </div>

      </div>

      <div class="row mt-4">
          <div class="col-md-8">

            <div class="card p-4" style="box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

                <?php echo $row['title'];?> - Available stock (<?php echo $row['item_qty'];?>)
                <h4>Item Description</h4>
                <p><?php echo $row['description'];?></p>

                <h4>Product Specification</h4>
                <p><?php echo $row['specification'];?></p>

                <div class="d-flex gap-2">
                  <form action="../config/auth.php" method="POST">
                      <input type="hidden" name="item_id" value="<?php echo $row['id'];?>">
                      <a href="Order.php?id=<?php echo $row['id']; ?>"><button type="submit" name="cart_add" class="btn btn-primary">Add to Cart</button></a>
                  </form>
                  <a href="Order.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">Rent item</button></a>
                </div>
                

               


            </div>

            


          </div>
          <div class="col-md-4">

            <div class="card p-4" style="box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

                <h4>Featured Items</h4>
                <ul>
                  <li>Item 1</li>

                </ul>

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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>






