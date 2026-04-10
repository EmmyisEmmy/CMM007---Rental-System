<?php 

$notification_query = mysqli_query($conn, "SELECT * FROM notifications WHERE user_id= '{$_SESSION['user_id']}' AND is_read='0'");
?>

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
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboardu.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="Track.php">Track Order</a></li>
        <li class="nav-item"><a class="nav-link" href="Analytics.php">Analytics</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rentals
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="rentals.php">Active Rentals</a></li>
            <li><a class="dropdown-item" href="rentals.php">Returned items</a></li>
          </ul>
        </li>
      </ul>
        <div class="d-flex align-items-center gap-3 pe-3">


          <div class="dropdown">
              <!-- <a href="#" class="position-relative text-dark fs-5"> -->
              <button type="button" class= "btn border-0 position-relative" data-bs-toggle="dropdown" aria-expanded="false">

                  <img src="../assets/image/notification.png" style= "width: 23px; height: 23px;">
                  <span class="position-absolute top-2 start-71 translate-middle p-1 border border-light rounded-circle" style="background-color: #ff69b4;"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="width: 300px;">
                  <h6 class="px-2">Notifications</h6><hr class="my-1">
                  <?php while ($notif = mysqli_fetch_assoc($notification_query)) { ?>

                    <li><a class="dropdown-item py-2 border-bottom d-flex align-items-center gap-2" href="rentals.php"><p class="mb-0" style="font-size: 13px;"><img src="../assets/image/inbox.png" style= "width: 18px; height: 18px;"></i>    <?php echo $notif['message']; ?></p></a></li>
                <?php } ?>
                <?php if (mysqli_num_rows($notification_query)== 0) { ?>
                    <li><p class="text-center text-muted py-3" style="font-size: 14px;">Nothing to See here...</p></li>
                <?php } ?>  
              </ul>
          </div>
          <a href="cart.php" class="position-relative text-dark fs-5">
             <img src="../assets/image/addcart.png" style= "width: 23px; height: 23px;">
             <span class="position-absolute top-0 start-100 translate-middle p-1  border border-light rounded-circle" style="background-color: #ff69b4;">
            <span class="visually-hidden">New alerts</span>
            
              
          </a>
          <a href="#" class="position-relative text-dark fs-5">
            <img src="../assets/image/heart.png" style= "width: 23px; height: 23px;">
          </a>

          <div class="dropdown pe-2">
              <a href="#" style="text-decoration: none;" class="position-relative text-dark fs-5" data-bs-toggle="dropdown">
                <img src="../assets/image/avatar.png" style= "width: 35px; height: 35px;">
                <span style= "font-size: 16px;"><?php echo $_SESSION['user_name']; ?></span>

              </a>
                  <ul class="dropdown-menu dropdown-menu-end notification_resize">
                    
                    <!-- <li><button class="dropdown-item" type="button">Profile</button></li>
                    <li><button class="dropdown-item" type="button">Change Language</button></li> -->
                    <li class=" align-items-center px-3 "><p> User id: ID</p></a></li><hr>
                    <li class="d-flex align-items-center px-3 py-1"><img src="../assets/image/profileuser.png" style= "width: 18px; height: 18px; margin-right: 8px;"></i> <a class="dropdown-item" href="profile.php"> 
                     Profile
                    </a></li>
                    <li class="d-flex align-items-center px-3 py-1"><img src="../assets/image/language.png" style= "width: 18px; height: 18px; margin-right: 8px;"></i> <a class="dropdown-item" href="#"> 
                     Language
                    </a></li>
                    <li class="d-flex align-items-center px-3 py-1"><img src="../assets/image/report.png" style= "width: 19px; height: 19px; margin-right: 8px;"></i> <a class="dropdown-item" href="tickets.php">Report an Issue</a></li>
                    <li class="d-flex align-items-center px-3 py-1"><img src="../assets/image/logoutuser.png" style= "width: 18px; height: 18px; margin-right: 8px;"></i> <a class="dropdown-item" href="../config/auth.php?logout=true">Log out</a></li>
                    
                    
                    
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