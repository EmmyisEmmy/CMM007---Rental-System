<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/page.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <title>Contact Us</title>
</head>
<body>
  
<?php include("navbar.php"); ?> 
<div class="main-page">
  <div class="main-card">

    <h2>Contact Us</h2>
    <p class="mb-4">Have a question? Carefully fill out this form.We are pretty fast</p>

    <form>
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" placeholder="Full name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" class="form-control" placeholder="What is this about?" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea class="form-control" rows="4" placeholder="Write your message here..." required></textarea>
      </div>

      <button type="submit" class="btn" style="background-color: #003049; color: white;">
        Send Message
      </button>
    </form>

  </div>
</div>




    <?php include("footer.php"); ?> 



</body>
</html>