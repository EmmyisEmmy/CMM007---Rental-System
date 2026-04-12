<?php session_start(); ?>
<?php include("../config/db.php"); 
$id = $_GET['id'];
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE id='$id'");
$row = mysqli_fetch_assoc($table_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>

     
        <?php include("sidebar.php"); ?>
        <?php include("navbar.php"); ?>
      
        <div class="content">
          <div class="top">
            <div class="title">
              <h3>Update Your Post</h3>
  
            </div>
          </div>
          <form action="../config/auth.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                      <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" value="<?php echo $row['title']; ?>" name="title" class="form-control" placeholder="SEO Title">
                  </div>
                  <div class="mb-3">
                      <label  class="form-label">Description</label>
                      <!-- <input type="text" name="description" class="form-control" placeholder="SEO Title"> -->
                      <textarea class="form-control" name="description" rows="3"><?php echo $row['description']; ?></textarea>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Product Specification</label>
                      <textarea class="form-control"  name= "specification" rows="3"><?php echo $row['specification']; ?></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option selected>Category</option>
                        <option value="Construction"<?php if ($row["category"] == "Construction") echo "selected"; ?>>Construction</option>
                        <option value="Tools & DIY"<?php if ($row["category"] == "Tools & DIY") echo "selected"; ?>>Tools & DIY</option>
                        <option value="Electronics"<?php if ($row["category"] == "Electronics") echo "selected"; ?>>Electronics & Gadgets</option>
                        <option value="Sports & Recreation"<?php if ($row["category"] == "Sports & Recreation") echo "selected"; ?>>Sports & Recreation</option>
                        <option value="Automative & Transportation"<?php if ($row["category"] == "Automative & Transportation") echo "selected"; ?>>Automative & Transportation</option>
                        <option value="Office & Work"<?php if ($row["category"] == "Office & Work") echo "selected"; ?>>Office & Work</option>
                        <option value="Gardening & Landscaping"<?php if ($row["category"] == "Gardening & Landscaping") echo "selected"; ?>>Gardening & Landscaping</option>
                        <option value="Safety & Protective Equipment"<?php if ($row["category"] == "Safety & Protective Equipment") echo "selected"; ?>>Safety & Protective Equipment</option>
 
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Item Condition</label>
                    <select name="item_condition" class="form-select">
                        <option value="new"<?php if ($row["item_condition"] == "new") echo "selected"; ?>>new</option>
                        <option value="good"<?php if ($row["item_condition"] == "good") echo "selected"; ?>>good</option>
                        <option value="fair"<?php if ($row["item_condition"] == "fair") echo "selected"; ?>>fair</option>
                        <option value="poor"<?php if ($row["item_condition"] == "poor") echo "selected"; ?>>poor</option>

                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Pricing</label>
                    <input type="number" value="<?php echo $row['price']; ?>" name="price" step="0.5" class="form-control" placeholder="Price per day">
                    
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Item Quantity</label>
                      <input type="number"  value="<?php echo $row['item_qty']; ?>" name="item_qty" step="1" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>

                  <!-- <form action="../config/auth.php" method="POST"> -->
                      <input type="hidden" name="id_item" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="item_update" class="btn btn-primary">Update Post</button>
                 
                  


                </div>
              </div>
          </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>   
</body>
</html>