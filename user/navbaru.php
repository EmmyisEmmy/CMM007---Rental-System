<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="dashboardu.php">
        <img src="../assets/image/logo_new.png" alt="Orientals Logo" width="40" height="40" class="me-2">
        <span>Orientals</span>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboardu.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="Track.php">Order Tracking</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="rentals.php">Rentals</a></li>
            <li><a class="dropdown-item" href="rentals.php">Return</a></li>
          </ul>
        </li>
      </ul>
        <div class="d-flex align-items-center gap-3 pe-3">

          <a href="cart.php" class="position-relative text-dark fs-5">
             <img src="../assets/image/addcart.png" style= "width: 23px; height: 23px;">
          </a>
          <a href="#" class="position-relative text-dark fs-5">
            <img src="../assets/image/notification.jpg" style= "width: 23px; height: 23px;">
          </a>
          <a href="#" class="position-relative text-dark fs-5">
            <img src="../assets/image/heart.png" style= "width: 23px; height: 23px;">
          </a>

          <div class="dropdown pe-2">
              <a href="#" class="position-relative text-dark fs-5" data-bs-toggle="dropdown">
                <img src="../assets/image/avatar.png" style= "width: 35px; height: 35px;">
                <span><?php echo $_SESSION['user_name']; ?></span>

              </a>
                  <ul class="dropdown-menu dropdown-menu-end notification_resize">
                    
                    <!-- <li><button class="dropdown-item" type="button">Profile</button></li>
                    <li><button class="dropdown-item" type="button">Change Language</button></li> -->
                    <li><a class="dropdown-item" href="profile.php"> User id: </a></li><hr>
                    <li><a class="dropdown-item" href="profile.php"> 
                     Profile
                    </a></li>
                    <li><a class="dropdown-item" href="../config/auth.php?logout=true"> 
                     Log out
                    </a></li>
                    
                    
                  </ul>
          </div>

          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
            <button class="btn" type="submit" style="background-color: #003049; color: white;">Search</button>
          </form> -->

        </div>
      
    </div>
  </div>
</nav>