
<?php session_start();
include("../config/db.php"); 
$id = $_GET['id'];
$table_query = mysqli_query($conn, "SELECT * FROM active_orders WHERE id='$id'");
$row = mysqli_fetch_assoc($table_query);
$price_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id='{$row['item_id']}'");
$price_item = mysqli_fetch_assoc($price_query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Extend Order</title>
  <link rel="stylesheet" href="../assets/css/userrentals.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include("navbaru.php"); ?>

<div class="container mt-4" style="max-width: 1200px;">

        <div class="card p-4">

            <div><h5>Order Extension</h5></div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Reason for Extension  (Optional)</label>
                <textarea class="form-control" style="  outline: none;" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <div class="alert alert-warning py-2 mb-3" role="alert">
                  <i class="fas fa-info-circle me-2"></i>
                  Kindly note that extensions come with addition charges per day

                </div>
              </div>
                <p>How many days do you want to extend the rent?</p>
                <input type= "number" id="days" oninput="update()">
                <p style= "color: red; font-size: 12px;">*Put in only the number of days in whole number*</p>
                

                
                

              </div>
                <form action= "../config/auth.php" method= "POST">
                  <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="more_days" id="more_days_hidden" value="">
                  <input type="hidden" name="extra" id="extra_hidden" value="">
                  <button type="submit" name="order_extend" class="btn mb-3" style="background-color: #003049; color: white; margin-top: 15px;">
                      Extend Order
                
                  </button>
                </form>
              
          


           <div class="card p-4">
                <h6>Order Summary</h6>
                <div class="summary-row">
                  <span>Price per day: </span>
                  <span>£10</span>
                </div>
                <div class="summary-row" >
                  <span>Number of days: </span>
                  <span id="summary-days">0</span>
                </div>
                
                
                <hr>
                <div class="summary-row total">
                  <span>Total: </span>
                  <span id="summary-total">0</span>
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

  <script>

    function update() {

      const days = document.getElementById("days")
      const sumdays = document.getElementById("summary-days")
      sumdays.textContent = days.value;
      
      const item_price = <?php echo $price_item['price']; ?>;
      const total = document.getElementById("summary-total");

      
      total.textContent =  parseInt(sumdays.textContent) * item_price + 10;
      document.getElementById('more_days_hidden').value = days.value;
      document.getElementById('extra_hidden').value = total.textContent;


      
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
  
</body>


</html>