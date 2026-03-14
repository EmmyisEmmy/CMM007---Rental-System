<?php session_start(); ?>
<?php include("../config/db.php"); ?>


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
      
        <div class="content">
          <div class="top">
            <div class="title">
              <h3>Create New Post</h3>
  
            </div>
          </div>
          <form action="../config/auth.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                      <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" name="title"class="form-control" placeholder="SEO Title">
                  </div>
                  <div class="mb-3">
                      <label  class="form-label">Description</label>
                      <!-- <input type="text" name="description" class="form-control" placeholder="SEO Title"> -->
                      <textarea class="form-control" name="description" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Product Specification</label>
                      <textarea class="form-control"  name= "specification" rows="3"></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option selected>Category</option>
                        <option value="Construction">Construction</option>
                        <option value="Tools & DIY">Tools & DIY</option>
                        <option value="Electronics">Electronics & Gadgets</option>
                        <option value="Sports & Recreation">Sports & Recreation</option>
                        <option value="Automative & Transportation">Automative & Transportation</option>
                        <option value="Office & Work">Office & Work</option>
                        <option value="Gardening & Landscaping">Gardening & Landscaping</option>
                        <option value="Safety & Protective Equipment">Safety & Protective Equipment</option>

                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Item Condition</label>
                    <select name="item_condition" class="form-select">
                        <option value="new">new</option>
                        <option value="good">good</option>
                        <option value="fair">fair</option>
                        <option value="poor">poor</option>

                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Pricing</label>
                    <input type="number" name="price" step="0.5" class="form-control" placeholder="Price per day">
                    
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Item Quantity</label>
                      <input type="number" name="item_qty" step="1" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>

                  <!-- <form action="../config/auth.php" method="POST"> -->
                      <button type="submit" name="item_publish" class="btn btn-primary">Publish Item</button>
                 
                  


                </div>
              </div>
          </form>
     
</body>
</html>