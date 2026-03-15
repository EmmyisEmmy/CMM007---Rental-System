<?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../assets/css/orderpage.css">
  <link rel="stylesheet" href="../assets/css/home.css"> -->


    <style>

      .tracker {
        display: flex;
        text-align: center;
        align-items: center;
        flex-direction: column;
        padding: 100px;
      }

    </style>
  
  <title>Track Order</title>
</head>
<body>
  <?php include("navbaru.php"); ?>
 
  <div class="tracker">
    <img src="../assets/image/delivery.png" style="width: 150px; height: 150px;" alt="Orientals Logo">
     <h3>Track Your Rental</h3>
     <input type= "text" placeholder="Order Number here...">
     <div class="selection"><p>Search</p><span></span></div>
  </div>


</div>
</body>
</html>