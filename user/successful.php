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

  </style>
  
</head>
<body>
  
  <?php include("navbaru.php"); ?>

      <div class="rental_success">
            <h2>Your Payment is Succesful</h2>
            <p>Congratulations! Your rental is on the way.</p>
            <!-- <i class="fas fa-paper-plane"></i> -->
             <img src="../assets/image/sucess.png" style="width: 150px; height: 150px;" alt="success">
            <a href="dashboardu.php"><button type="button" class="btn btn-primary btn-lg">Go back</button></a>
      </div>
</body>
</html>