<?php session_start();
include("../config/db.php"); 
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['user_id']}'");
$user = mysqli_fetch_assoc($user_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/footer.css">
  
  
</head>
<body>

<?php include("navbaru.php"); ?>

<div class="container mt-5" style="max-width: 1000px; margin: 0 auto; padding-top: 30px;">

    <div class="rounded-3 p-4 mb-4 text-center" style="background-color: #003049;">
          <img src="../assets/image/avatar.png" style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
          <h5 class="text-white mt-2"><?php echo $_SESSION['user_name']; ?></h5>
          <p class="text-white opacity-75" style="font-size: 13px;"><?php echo $_SESSION['user_role']; ?></p>
    </div>

    <div class="card p-4">
        <form action="../config/auth.php" method="POST" enctype="multipart/form-data">

            <h6 class="mb-3 fw-bold">Personal Information</h6>

            <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['user_name']; ?>">

            </div>

            <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">

            </div>

            <div class="mb-3">
                  <label class="form-label">Phone Number (optional)</label>
                  <input type="tel" name="phone_number" class="form-control" placeholder="Phone number">

            </div>

            <hr>

            <h6 class="mb-3 fw-bold">Create a Ticket</h6>

            <div class="mb-3">
                    <label class="form-label">Describe the Issue</label>
                    <select name="reason" class="form-select">
                        <option value="">Choose One</option>
                        <option value="Damaged Item">Damaged Item</option>
                        <option value="Billing Issue">Billing Issue</option>
                        <option value="Return Problem">Return Problem</option>
                        <option value="Delivery Issue">Delivery Issue</option>
                        <option value="General Inquiry">General Inquiry</option>

                    </select>
                  </div>

            <div class="row">

              <div class="mb-3">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Help us understand the issue</label>
                      <textarea class="form-control" name="message" style="  outline: none;" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
              </div>

              <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" required>
                  </div>
            </div>

            <button type="submit" name="ticket_submit" class="btn w-80" style="background-color: #003049; color: white;">
              Submit Ticket
            </button>


        </form>
    </div>
</div>

<?php include("../footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
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