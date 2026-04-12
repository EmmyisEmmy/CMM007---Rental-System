<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Manager</title>
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
              <h2>Register Staff</h2>
              
            </div>
          </div>

           <div class="card  mb-3 p-3 container mt-4 px-5 d-flex flex-row">

              <div class="card-body">

                        <form action="../config/auth.php" method="POST">
                            <div class="mb-3">
                              <label  class="form-label">Preferred Username</label>
                              <input type="text" name="name" class="form-control" >
                              
                            </div>
                            <div class="mb-3">
                              <label  class="form-label">Email address</label>
                              <input type="email" name="email" class="form-control" >
                              
                            </div>
                            <div class="mb-3">
                              <label  class="form-label">Password</label>
                              <input type="password" name="password" class="form-control">
                            </div>
                            <button type="submit" name= "new_staff" class="btn btn-primary">Submit</button>
                        </form>

            </div>

            
             
          


        

            </div>
              
        </div>

 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>      
</body>
</html>