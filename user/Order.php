<?php session_start();
include("../config/db.php"); 
$id = $_GET['id'];
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$id'");
$row = mysqli_fetch_assoc($table_query)
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/orderpage.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <title>Order</title>
</head>
<body>

  <?php include("navbaru.php"); ?>

  <div class="order-page">


    <div class="bottom-section">

      <div class="left-section">


        <div class="section-card">

            <div class="d-flex align-items-center gap-3 mb-4">
              <img src=".#" alt="Item" style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
              <div>
                <h4 style="color:#003049; font-weight:700; margin:0;"><?php echo $row['title']; ?></h4>
                <p style="color:#888; font-size:13px; margin:0;"><?php echo $row['category']; ?></p>
              </div>
            </div>

            <hr>

          <h3>Rental Details</h3>
          <form>

            <div class="mb-3">
              <label class="form-label">Number of Days</label>
              <input type="number"  oninput="update()" id="days" step="1" class="form-control" min="1" placeholder="0" >
            </div>
            <div class="mb-1">
              <label class="form-label">Quantity</label>
              <input type="number"  oninput="update()" id="qty" step="1" class="form-control" min="1" placeholder="0" >

            </div>
          </form>
        </div>


        <div class="section-card mt-3">
          <h3>Order Summary</h3>
          <div class="summary-row">
            <span>Price per day</span>
            <span><?php echo $row['price']; ?></span>
          </div>
          <div class="summary-row" >
            <span>Number of days</span>
            <span id="summary-days">0</span>
          </div>
          <div class="summary-row">
            <span>Quantity</span>
            <span id="summary-qty"></span>
          </div>
          <div class="summary-row">
            <span>Delivery</span>
            <span>2</span>
          </div>
          <hr>
          <div class="summary-row total">
            <span>Total</span>
            <span id="summary-total">0</span>
          </div>
        </div>

      </div>


      <div class="right-section">
        <div class="section-card">
          <h3>Payment Details</h3>

          <div class="mb-3">
            <label class="form-label">Cardholder Name</label>
            <input type="text" class="form-control" placeholder="John Doe" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Card Number</label>
            <input type="text" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" autocomplete="off" required>
          </div>
          <div class="row">
            <div class="col-6 mb-3">
              <label class="form-label">Expiry Date</label>
              <input type="text" class="form-control" placeholder="MM/YY" maxlength="5" autocomplete="off" required>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">CVV</label>
              <input type="text" class="form-control" placeholder="123" maxlength="3" autocomplete="off" required>
            </div>
          </div>
<!-- 
          <div class="d-flex gap-2 mt-2 mb-3">
            <i class="fab fa-cc-visa fa-2x" style="color:#1a1f71;"></i>
            <i class="fab fa-cc-mastercard fa-2x" style="color:#eb001b;"></i>
            <i class="fab fa-cc-paypal fa-2x" style="color:#003087;"></i>
          </div> -->

          <button type="submit" class="btn w-100" style="background-color:#003049; color:white;">
            Pay Now
          </button>

        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <script>

    function update() {

      const qty = document.getElementById("qty");
      const sumqty = document.getElementById("summary-qty");
      sumqty.textContent = qty.value;


      const days = document.getElementById("days")
      const sumdays = document.getElementById("summary-days")
      sumdays.textContent = days.value;
      
      const item_price = <?php echo $row['price']; ?>;
      const total = document.getElementById("summary-total");
      total.textContent =  parseInt(sumqty.textContent) * parseInt(sumdays.textContent) * item_price;


      
    }
    

  </script>
  
    <?php include("../footer.php"); ?>
</body>
</html>