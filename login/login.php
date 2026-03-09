
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <link rel="stylesheet" href="../assets/css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

    <div class="main">

    <div class="graphics_1"></div>

        <div class="graphics_2">

          <div class="middle">

                    <form action="../config/auth.php" method="post">

                        <div class="logo_spot">
                          <img src= "../assets/image/logo_use.png">
                        </div>
                        
                        <h1>Orientals</h1>

                        <div class="box">

                          
                          <input type="email" name="email"  placeholder="Email" required>

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
                       
                        <div class="selection">

                          <select name= "role">
                            
                            <option value="admin">Admin</option>
                            <option value="user">User</option>

                          </select>

                        </div>
                         
                        
                        <button type="submit" name="login_button" class="button1">Login</button>
                        
                            <div class="text-center mt-3">

                              <div>
                                <a href="#" class="text-decoration-none small">
                                  Forgot your password?
                                </a>
                              </div>

                              <div class="mt-2">
                                Don't have an account?
                                <a href="../user/register.php" class="text-decoration-none small">
                                  Sign up
                                </a>
                              </div>

                            </div>

                    </form>

          </div>

        </div>

          
    </div>


</body>
</html>