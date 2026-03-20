<?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='{$_SESSION['user_id']}'");

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
    <div class="container mt-4 px-5"><h4>My Cart(0)</h4></div>
  <?php
while ($row = mysqli_fetch_assoc($table_query)) { ?>
    <div class="card mb-3 p-3 container mt-4 px-5">


          <div class="d-flex align-items-center" style="gap: 190px;">
              <img src="../assets/image/<?php echo $row['image'];?>" style="width:80px; height:80px; object-fit:cover; border-radius: 8px;">
              <strong><span><?php echo $row['item_name'];?></span></strong>
              <span><?php echo $row['price'];?></span>
              <span><i class="fas fa-trash"></i></span>
              <button class="btn btn-primary btn-sm">Rent</button>




          </div>

    </div>
    <?php } ?>
<?php include("../footer.php"); ?>
</body>
</html>