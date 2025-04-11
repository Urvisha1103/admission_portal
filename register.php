<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Admission Portal</title>
  <link rel="stylesheet" href="style/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="register-container">
  <form class="register-form" action="register_process.php" method="POST">
    <h2><i class="fas fa-user-plus"></i> Create Your Account</h2>

    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="phone">Phone</label>
    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

    <label for="role">User Role</label>
    <select id="role" name="role" required>
      <option value="">-- Select Role --</option>
      <option value="student">Student</option>
      <option value="admin">College/University</option>
    </select>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Create a password" required>

    <label for="confirm">Confirm Password</label>
    <input type="password" id="confirm" name="confirm" placeholder="Confirm your password" required>

    <button type="submit" class="btn">Register</button>

    <p class="register-link">Already have an account? <a href="login.php">Login here</a></p>
  </form>
</div>

</body>
</html>
