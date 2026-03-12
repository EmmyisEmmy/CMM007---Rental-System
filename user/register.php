<?php
include "../config/db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>

  <link rel="stylesheet" href="../assets/css/register.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

    <div class="main">

        <div class="graphics_1"></div>
          

        <div class="graphics_2">

       
        <div class="middle">

                  
                  <form id="Registration" action="../config/auth.php" method="POST">

                        <div class="logo_spot">
                          <img src= "../assets/image/logo_use.png">
                        </div>
                      
                      <h1>Register</h1>

                        <div class="box">

                        <input id="user" type="text" name="name"  placeholder="Full name" required>
                        <div class ="error"></div>
                        
                      </div>

                      <div class="box">

                        
                        <input id="email" type="email" name="email"  placeholder="Email" required>
                        <div class ="error"></div>
                        

                      </div>

                      
                      <div class="box">

                        
                          <select name="role" required>

                            <option value="">What's your role?</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>

                          </select>

                      <div class ="error"></div>

                        
                    
                      </div>

                        <div class="box">
                       
                        <input id="phone_number" type="tel" name="phone_number"  placeholder="Phone number" required>
                        <div class = "error"></div>

                      </div>

                      <div class="box position-relative">
                        
                            <input 
                              type="password" 
                              class="form-control pe-5"
                              name="password" 
                              id="password"
                              placeholder="Password" 
                              required>

                            
                            <i 
                              class="fa-solid fa-eye fa-sm position-absolute top-50 end-0 translate-middle-y me-3"
                              id="togglePassword"
                              style="cursor:pointer;">
                            </i>
                      </div>
                      <div class="box position-relative">
                        
                            <input 
                              type="password" 
                              class="form-control pe-5"
                              name="confirm_password" 
                              id="confirm_password"
                              placeholder="Confirm Password" 
                              required>

                            
                            <i 
                              class="fa-solid fa-eye fa-sm position-absolute top-50 end-0 translate-middle-y me-3"
                            
                              style="cursor:pointer;">
                            </i>
                      </div>
                    
                      <button type="submit" name="register_button" class="button1">Sign Up</button>

                          <p class="has-account">
                              Already have an account? <a href="../login/login.php">Log in</a>
                          </p>

                  </form>

        </div>
        </div>




    </div>

    
</body>
</html>