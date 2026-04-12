<?php session_start();


include("./config/db.php"); 
$table_query = mysqli_query($conn, "SELECT * FROM rentals WHERE status= 'available'");


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="./assets/css/home.css">
  <!-- <link rel="stylesheet" href="./assets/css/user.css"> -->
  <link rel="stylesheet" href="./assets/css/footer.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

 
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body>

    <?php include("navbar.php"); ?> 


    <header class="homepage">
        <div class="homepage-text">
          <h1>Welcome to Orientals</h1>
          <p>Excellent and efficient rental services</p>

          <div class="Figures">
            <div>
              <h2>5,000+</h2>
              <p>Users</p>
            </div>
            <div>
              <h2>5,000+</h2>
              <p>Reviews</p>
            </div>
            <div>
              <h2>50+</h2>
              <p>Countries</p>
            </div>
            <div>
              <h2>10k+</h2>
              <p>Deliveries</p>
            </div>
            <div>
              <h2>4.8</h2>
              <p>Stars</p>
            </div>

          </div>

        </div>

    </header>

    


       <section class="sections">

          <h2>Categories</h2>
            <div class= "items">

                    <div class="category">
                      <img src="./assets/image/construction.png" style= "width: 50px; height: 50px;">
                      <h3>Construction</h3>
                    </div>


                    <div class="category">
                       <img src="./assets/image/tools.png" style= "width: 50px; height: 50px;">
                      <h3>Tools & DIY</h3>
                    </div>

                    <div class="category">
                      <img src="./assets/image/electronics.png" style= "width: 50px; height: 50px;">
                      <h3>Electronics</h3>
                    </div>

                    <div class="category">
                      <img src="./assets/image/party.png" style= "width: 50px; height: 50px;">
                      <h3>Party & Event</h3>
                    </div>

                    <div class="category">
                      <img src="./assets/image/sports.png" style= "width: 50px; height: 50px;">
                      <h3>Sports & Recreation</h3>
                    </div>

                    <div class="category">
                      <img src="./assets/image/automobile.png" style= "width: 50px; height: 50px;">
                      <h3>Automative & Transportation</h3>
                    </div>



                    <div class="category">
                      <img src="./assets/image/office.png" style= "width: 50px; height: 50px;">
                      <h3>Office & Work Equipment</h3>
                    </div>

                    <div class="category">
                      <img src="./assets/image/gardening.png" style= "width: 50px; height: 50px;">
                      <h3>Gardening & Landscaping</h3>
                    </div>

                    <div class="category">
                      <img src="./assets/image/safety.jpg" style= "width: 50px; height: 50px;">
                      <h3>Safety & Protective Equipment</h3>
                    </div>
              
            </div>


      </section>

             <section class="sections">

          <h2>How it Works</h2>
            <div class= "items process">

                    <div class="category">
                      <i class="fas fa-search"></i>
                      <h3>Find items</h3>
                    </div>


                    <div class="category">
                      <i class="fas fa-cart-plus"></i>
                      <h3>Add to cart</h3>
                    </div>

                    <div class="category">
                      <i class="fas fa-calendar-alt"></i>
                      <h3>Select range of use</h3>
                    </div>

                    <div class="category">
                      <i class="fas fa-truck"></i>
                      <h3>Door Step Delivery</h3>
                    </div>

                    
            </div>


      </section>


      <section class="new-section">
          <div class= "new-card">
            <div class= "content">
                <h3>Why Choose Us</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus, vero deleniti quis voluptatem beatae quibusdam nulla architecto optio fugit ipsam voluptate velit atque provident? Quod odio accusamus temporibus dolorum sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ullam optio officiis, dolorem in accusamus iure! Placeat nisi molestias repudiandae, quo quaerat voluptatum quibusdam facere fugiat quidem, repellat non eos! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi reiciendis harum maiores vero nostrum, perferendis beatae adipisci animi. Quo autem at hic vero, adipisci tempora provident ea ex aut deserunt!
                </p>
          
                <div class="button-1">
                    <a href="./user/register.php" class="login-button-1">Sign Up</a>
                </div>
            </div>

            <div class="why-choose-us-image">
              <img src="./assets/image/whychoose.png">
            </div>
          
          </div>
      </section>

            



    <input type="checkbox" id="FAQ">


    <button  class="button-chat" data-bs-toggle="modal" data-bs-target="#chatModal">
      <i class="fas fa-headset"></i>
    </button>

       
    <div class="modal fade" id="chatModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-bottom-right">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Frequently Asked Questions</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">

            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Can I rent more than one item at once?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Can I return broken items?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    What's your return policy?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            
          </div>

        </div>
      </div>
    </div>


   <footer class="footer-main">
      <div class="content-footer">
        <p>&copy; 2026 Orientals. All rights reserved.</p>
        <ul class="footer-links">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
   </footer>

    

</body>
</html>