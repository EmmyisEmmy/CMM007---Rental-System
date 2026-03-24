<?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='{$_SESSION['user_id']}'");
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['user_id']}'");
$user = mysqli_fetch_assoc($user_query);
$count_cart_query = mysqli_query($conn, "SELECT COUNT(*) FROM cart WHERE user_id='{$_SESSION['user_id']}'");
$cart_count = mysqli_fetch_row($count_cart_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/footer.css">
  <title>Cart</title>
</head>
<body>

  <?php include("navbaru.php"); ?> 

    
<!-- 
    <div class="container mt-4 px-5"><h2>My Cart</h2></div>
    <div class="card mb-3 container mt-4 px-5">
      <div class="row g-0">
          <div class="col-md-2"><img src="../assets/image/car.jpg" class="img-fluid rounded-start"></div>
          <div class="col-md-2">Money</div>
      </div>
    </div> -->
<div class="container mt-4 px-5">
  <h5>My Cart(<?php echo $cart_count[0]; ?>)</h5>

  <form action="../config/auth.php" method="POST">
      <div class="row">
          
            <div class="col-md-8">
      
                
              
           

            
              <?php
              while ($row = mysqli_fetch_assoc($table_query)) { ?>


              <div class="card mb-3 p-3 container mt-4 px-5">


                    <div class="d-flex align-items-center justify-content-between">
                        <input type="checkbox" name="selected_items[]" value="<?php echo $row['id']; ?>" style="width: 20px; height: 20px; accent-color: #0000">
                        <img src="../assets/image/<?php echo $row['image'];?>" style="width:80px; height:80px; object-fit:cover; border-radius: 8px;">
                        <strong><span><?php echo $row['item_name'];?></span></strong>
                        <span><?php echo $row['price'];?></span>
                        <span><img src="../assets/image/trash.png" style= "width: 22px; height: 22px;"></i></span>
                        <button class="btn btn-primary btn-sm" style="background-color: #003049; color: white; border: none;">Rent</button>

                    </div>

              </div>
              
              <?php } ?>

            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    <h5>Order Summary</h5>
                    <p>Total:<p>
                    <p>QTY:<p>
                    
                    <input type="hidden" name="user_id" value= "<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit"  name="cart_order" class="btn btn-primary btn-lg w-100" style="background-color: #003049; color: white; border: none;">Rent (0)</button>
                </div>

                <div class="card p-4 mt-3">
                    <h5>Shipping Details</h5>
                    <a href="profile.php">
                      <img src="../assets/image/edit.png" style= "width: 22px; height: 22px;">
                    </a>
                    <p><?php echo $user['address']; ?></p>
                    <p><?php echo $user['city']; ?></p>
                    <p><?php echo $user['postcode']; ?></p>
                    <p><?php echo $user['phone_number']; ?></p>
                    
                    
                </div>
            </div>

            

      </div>
  </form>
</div>


    
<?php include("../footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>