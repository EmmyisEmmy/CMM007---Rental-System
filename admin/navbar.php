  
<?php 

$notification_query = mysqli_query($conn, "SELECT * FROM notifications WHERE user_id= '{$_SESSION['user_id']}' AND is_read='0'");
?>

  <div class= "navigator">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Hello, Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
               
                
              

              <div class="dropdown">
              
              <button type="button" class= "btn border-0 position-relative" data-bs-toggle="dropdown" aria-expanded="false">

                  <img src="../assets/image/notification.png" style= "width: 23px; height: 23px;">
                  <span class="position-absolute top-2 start-71 translate-middle p-1 border border-light rounded-circle" style="background-color: #ff69b4;"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="width: 300px;">
                  <h6 class="px-2">Notifications</h6><hr class="my-1">
                  <?php while ($notif_admin = mysqli_fetch_assoc($notification_query)) { ?>

                    <li><a class="dropdown-item py-2 border-bottom d-flex align-items-center gap-2" href="activerentals.php"><p class="mb-0" style="font-size: 13px;"><img src="../assets/image/inbox.png" style= "width: 18px; height: 18px;"></i>    <?php echo $notif_admin['message']; ?></p></a></li>
                <?php } ?>
                <?php if (mysqli_num_rows($notification_query)== 0) { ?>
                    <li><p class="text-center text-muted py-3" style="font-size: 14px;">Nothing to See here...</p></li>
                <?php } ?>  
              </ul>
          </div>
            </div>
          </div>
      </nav>
  </div>