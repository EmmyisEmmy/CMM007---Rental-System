<?php session_start();
include("../config/db.php"); 
$id = $_GET['id'];
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$id'");
$row = mysqli_fetch_assoc($table_query);
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['user_id']}'");
$user = mysqli_fetch_assoc($user_query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="../assets/css/orderpage.css">
  <!-- <link rel="stylesheet" href="../assets/css/home.css"> -->
  <link rel="stylesheet" href="../assets/css/footer.css">
  <title>Order</title>
</head>
<body>

  <?php include("navbaru.php"); ?>

<form action="../config/auth.php" method="POST">

  <div class="order-page">


    <div class="bottom-section">

      <div class="left-section">


              <div class="section-card">

                  <div class="d-flex align-items-center gap-3 mb-4">
                    <img src="../assets/image/<?php echo $row['image'];?>" alt="Item" style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                    <div>
                      <h4 style="color:#003049; font-weight:700; margin:0;"><?php echo $row['title']; ?></h4>
                      <p style="color:#888; font-size:13px; margin:0;"><?php echo $row['category']; ?></p>
                    </div>
                  </div>

                  <hr>

                <h3>Rental Details</h3>
                

                  <div class="mb-3">
                    <label class="form-label">Number of Days</label>
                    <input type="number"  name="days" oninput="update()" id="days" step="1" class="form-control" min="1" placeholder="0" >
                  </div>
                  <div class="mb-1">
                    <label class="form-label">Quantity</label>
                    <input type="number"  name= "qty" oninput="update()" id="qty" step="1" class="form-control" min="1" max="2" placeholder="0" >

                  </div>
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
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="order_placed" class="btn w-100" style="background-color:#003049; color:white;">
                      Pay Now
                    </button>
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
        </div>
  </div>
</form>

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
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/69cf84c40987d41c34228b7d/1jl99t85p';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
  
    <?php include("../footer.php"); ?>
</body>
</html>