
<?php session_start();
// var_dump($_SESSION);
include("../config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");
$count_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE status= 'active' AND user_id='{$_SESSION['user_id']}'");
$active_order_count = mysqli_fetch_row($count_query);
$return_query = mysqli_query($conn, "SELECT COUNT(*) FROM active_orders WHERE status= 'returned' AND user_id='{$_SESSION['user_id']}'");
$return_order_count = mysqli_fetch_row($return_query);


// $return_query = mysqli_query($conn, "SELECT COUNT (*) FROM active_orders WHERE status= 'returned'");
// $retuned_order_count = mysqli_fetch_row($return_query);

if (isset($_GET['search']) && $_GET['search'] != '') {
  $term = $_GET['search'];
  $table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE title LIKE '%$term%'");  

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../assets/css/user.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
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
        <form action="dashboardu.php" method="GET">
            <div class="typing_box">
                
                <input name="search" type="text" placeholder= "Search available items... "required>

                <span style="color: #ccc; font-size: 25px; padding: 5 10px;">|</span>
                

                <select style="border: none; outline: none; background: transparent;">
                  <option value="">All Categories</option>
                  <option value="Construction">Construction</option>
                  <option value="Construction">Tools & DIY</option>
                  <option value="Construction">Electronics & Gadgets</option>
                  <option value="Construction">Sports & Recreation</option>
                  <option value="Construction">Automative & Transportation</option>
                  <option value="Construction">Office & Work</option>
                  <option value="Construction">Gardening & Landscaping</option>
                  <option value="Construction">Safety & Protective Equipment</option>
                </select>
                

                <span style="color: #ccc; font-size: 25px; padding: 5 10px;">|</span>
               
                   <select style="border: none; outline: none; background: transparent; ">
                      <option value="">Item Condition</option>
                      <option value="new">New</option>
                      <option value="good">Good</option>
                      <option value="fair">Fair</option>
                      <option value="poor">Poor</option>
                     
                  </select>
                
                <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
                <button type="submit">
                  <i class= "fas fa-search icon_search"></i>
                </button>

                

            </div>

        </form>

      </div>
</header>



      <h5 class="available">Now Available to Rent</h5>

      <div class="filter-buttons text-center mb-4">
          <button class="btn btn-outline-dark me-2" onclick="filterItems('all')">All</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Construction')">Construction</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Tools & DIY')">Tools & DIY</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Electronics')">Electronics & Gadgets</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Sports & Recreation')">Sports & Recreation</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Automative & Transportation')">Automative & Transportation</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Office & Work')">Office & Work</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Gardening & Landscaping')">Gardening & Landscaping</button>
          <button class="btn btn-outline-dark me-2" onclick="filterItems('Safety & Protective Equipment')">Safety & Protective Equipment</button>
      </div>

      <div class="filter-buttons text-start mb-4" style="padding-left: 70px">
          <a href="rentals.php">
            <button type="button" class="btn btn-primary">
              Active Orders <span class="badge text-bg-secondary"><?php echo $active_order_count [0]; ?></span>
            </button>
          </a>

          <a href="rentals.php">
          <button type="button" class="btn btn-primary">
            Returned Items <span class="badge text-bg-secondary"><?php echo $return_order_count [0]; ?></span>
          </button>
          </a>

          <button type="button" class="btn btn-primary">
            Overdue rentals <span class="badge text-bg-secondary">0</span>
          </button>
      </div>
      
      

      <section class="sections">
          <div class= "items">
<?php
while ($row = mysqli_fetch_assoc($table_query)) { ?>
            <div class="category" data-category="<?php echo $row['category'];?>">
              <div class="image position-relative" style="display: inline-block; width: 100%;"><img src="../assets/image/<?php echo $row['image'];?>">
              <span class="badge text-bg-dark position-absolute" style= "top: 8px; right: 8px;"><?php echo $row['item_condition'];?></span>
              <span class="badge text-bg-dark position-absolute" style= "bottom: 8px; left: 8px;"><?php echo $row['category'];?></span>
              </div>
             
              <div class="title">
                  <span><?php echo $row['title'];?></span>
                  <span class="price">£<?php echo $row['price'];?></span>
                  
                 
              </div>
              <!-- <div class="description"><?php echo $row['description'];?></div> -->
                 <span class="description">Available stock (<?php echo $row['item_qty'];?>)</span>

              <div class="new-box">
                
                <div class="user_decision">
                  <i class="far fa-heart heart-btn" style="cursor: pointer;"></i>
                  <a href= "items.php?id=<?php echo $row['id']; ?>" class="view_more">More Details</a>
                  <div class="one-line">
                      <form action="../config/auth.php" method="POST">
                          <!-- <a href="Order.php?id=<?php echo $row['id']; ?>"><button class= "rent-button">Rent</button></a> -->
                           <input type="hidden" name="item_id" value="<?php echo $row['id'];?>">
                          <button type= "submit" class="rent-button" name="rent_item">Rent</i></button>
                      </form>
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
  <?php include("../notification.php"); ?>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script> -->
  
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

  <script>

  document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.heart-btn').forEach(function(btn) {

      btn.addEventListener('click', function() {


        if(this.classList.contains('far')) {
            this.classList.remove('far');
            this.classList.add('fas');
            this.style.color = 'red';
        } else {

            this.classList.remove('fas');
            this.classList.add('far');
            this.style.color = '';



        }


     });
    
  });
      



  });
</script>

  <?php include("../footer.php"); ?>

</body>
</html>