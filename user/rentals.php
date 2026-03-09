<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Rentals</title>
  <link rel="stylesheet" href="../assets/css/userrentals.css">
  <link rel="stylesheet" href="./assets/css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  


</head>

<body>

<?php include("navbaru.php"); ?>

<!-- Main content container -->
<div class="container mt-5">

  <ul class="nav nav-pills gap-3" id="orderTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-orders" type="button">
        Active Orders
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="returned-tab" data-bs-toggle="tab" data-bs-target="#returned-orders" type="button">
        Returned Orders
      </button>
    </li>
  </ul>
  <div class="tab-content mt-3">

  <!-- Active Orders Tab -->
  <div class="tab-pane fade show active" id="active-orders">
    <div class="card">
      <div class="card-header bg-light text-dark">Active Orders</div>
      <div class="card-body p-0">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Item Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Date Rented</th>
              <th>Date Rented</th>
            </tr>
          </thead>
          <tbody>
            <tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td><td><button class="btn text-white"style="background-color:#198754;"data-bs-toggle="tab"data-bs-target="#returned-orders"type="button">Return</button></td></tr>
            <tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td><td><button class="btn text-white"style="background-color:#198754;"data-bs-toggle="tab"data-bs-target="#returned-orders"type="button">Return</button></td></tr>
            <tr><th scope="row">3</th><td>John</td><td>Doe</td><td>@social</td><td><button class="btn text-white"style="background-color:#198754;"data-bs-toggle="tab"data-bs-target="#returned-orders"type="button">Return</button></td></tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Returned Orders Tab -->
  <div class="tab-pane fade" id="returned-orders">
    <div class="card">
      <div class="card-header bg-light">Returned Orders</div>
      <div class="card-body p-0">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Item Name</th>
              <th>Categoryt</th>
              <th>Price</th>
              <th>Date Rented</th>
              <th>Date Returned</th>
            </tr>
          </thead>
          <tbody>
            <tr><th>1</th><td>John</td><td>Doe</td><td>@social</td></tr>
          </tbody>
        </table>
      </div>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
</body>
</html>