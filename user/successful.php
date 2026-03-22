<?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <title>Order Successful</title>
  <style>

    .rental_success{
      display: flex;
      text-align: center;
      align-items: center;
      flex-direction: column;
      padding: 100px;
    }

    .back-button{
      padding: 40px;
    }

  </style>
  
</head>

<body>


  <?php include("navbaru.php"); ?>
  

      <div class="rental_success">
            <h2>Your Payment is Succesful</h2>
            <p>Congratulations! Your rental is on the way.</p>
            <!-- <i class="fas fa-paper-plane"></i> -->
             <!-- ?id=<?php echo $order_id; ?> -->
             <img src="../assets/image/sucess.png" style="width: 150px; height: 150px;" alt="success">
            <div class="back-button">
                <a href="dashboardu.php"><button type="button" class="btn btn-primary btn-lg">Go back</button></a>
                <a href="invoice.php"><button type="button" class="btn btn-primary btn-lg">View Your Invoice</button></a>
            </div>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php include("../notification.php"); ?>

</body>
</html>