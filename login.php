  

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login - Admission Portal</title>
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  </head>
  <body>
  
  
  <div class="login-container">
    <form class="login-form" action="login_process.php" method="POST">
      <h2><i class="fas fa-sign-in-alt"></i> Login to Your Account</h2>
  
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>
  
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
  
      <button type="submit" class="btn">Login</button>
  
      <p class="login-link">Don't have an account? <a href="register.php">Register here</a></p>
    </form>
  </div>
  
  
  </body>
  </html>
  