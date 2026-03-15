<?php session_start();
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../assets/css/user.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<?php include("navbaru.php"); ?>

<header class="homepage">
      <div class="box">
        <!-- <h2 class="greeting">Hi, $active['name']</h2> -->
        <h2 class="greeting">Hello, <?php echo $_SESSION['user_name']; ?></h2>
        <form action="#">
            <div class="typing_box">
                <input type="text" placeholder="Search available items..." required>
                <div class="selection"><p>Search</p><span></span></div>

            </div>

        </form>

      </div>
</header>



      <h4 class="available">Now Available to Rent</h4>

      <div class="filter-buttons text-center mb-4">
          <button class="btn btn-outline-dark me-2" onclick="filterItems('all')">All</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Construction')">Construction</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Tools & DIY')">Tools & DIY</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Electronics & Gadgets')">Electronics & Gadgets</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Sports & Recreation')">Sports & Recreation</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Automative & Transportation')">Automative & Transportation</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Office & Work')">Office & Work</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Gardening & Landscaping')">Gardening & Landscaping</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Safety & Protective Equipment')">Safety & Protective Equipment</button>
      </div>

      <section class="sections">
          <div class= "items">
<?php
while ($row = mysqli_fetch_assoc($table_query)) { ?>
            <div class="category" data-category="<?php echo $row['category'];?>">
              <div class="image"><img src="../assets/image/<?php echo $row['image'];?>"></div>
              <div class="description"><?php echo $row['description'];?></div>
              <div class="title">
                  <span><?php echo $row['title'];?></span>
                  <span class="price"><?php echo $row['price'];?></span>
              </div>
              <div class="new-box">
                
                <div class="user_decision">
                  <a href= "items.php" class="view_more">More Details</a>
                  <div class="one-line">
                    <a href="Order.php?id=<?php echo $row['id']; ?>"><button class= "rent-button">Rent</button></a>
                    <form action="../config/auth.php" method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $row['id'];?>">
                        <button type= "submit" class="addcart" name="cart_add"><i class="fas fa-shopping-cart"></i></button>
                    </form>

                  </div>
                  
   
                </div>
              </div>

            </div>
            <?php } ?>
          </div>

      </section>



   
    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <script>

    function filterItems(category) {

      const myItem = document.querySelectorAll(".category");
      myItem.forEach (function(show) {
      if (category == "all") {
        show.style.display = "block";

      } else if (show.dataset.category == category) {
            
          show.style.display = "block"
      } else {
          show.style.display = "none"

      }


      })
    }
  </script>

  <?php include("../footer.php"); ?>

</body>
</html>