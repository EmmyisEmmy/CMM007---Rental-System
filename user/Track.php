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
  <link rel="stylesheet" href="../assets/css/user.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  

 
    <style>

      .tracker {
        display: flex;
        text-align: center;
        align-items: center;
        flex-direction: column;
        padding: 50px;
      }

    </style>
  
  <title>Track Order</title>
</head>
<body>
  <?php include("navbaru.php"); ?>
 
  <div class="tracker">
    <img src="../assets/image/delivery.png" style="width: 150px; height: 150px;" alt="Orientals Logo">
     <h3>Track Your Rental</h3>
     <div class="box">
        <form action="dashboardu.php" method="GET">
            <div class="typing_box">
                <input name="search"  type="text" placeholder="Input Order ID...start with OR-" required>
                <button type="submit">
                  <i class= "fas fa-search icon_search"></i>
                </button>

            </div>

            
            <div class="row">
          

                  <div class="card mb-3 p-3 container mt-4 px-5">


                        <div class="d-flex align-items-center justify-content-between">
                            
                            <img src="../assets/image/car.jpg" style="width:80px; height:80px; object-fit:cover; border-radius: 8px;">
                            <span>SUV</span>
                             <span>ORDER ID</span>
                             <span>QTY: 4</span>
                            <strong><span>Black SUV</span></strong>
                            <span class="badge text-bg-dark" style= "right: 8px;">Shipped</span>
                            

                        </div>

                  </div>
             
            </div>
        </form>
        
      </div>
      

  </div>


</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>