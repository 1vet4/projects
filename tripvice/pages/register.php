<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <link rel="stylesheet" href="../css/register.css">
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
<?php include("../headers/alt_header.php")?>
  <section>
  <div class='air air1'></div>
  <div class='air air2'></div>
  <div class='air air3'></div>
  <div class='air air4'></div>


  <main>
    <h1>Register</h1>
    <div id="error-msg">

    </div>
    <form id="register-form" name="register-form" action="../register_user.php" method="POST">
        <div class="register-form">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
          </div>
    
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
          </div>
          
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
          </div>
          
          <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
          </div>
      <button class="register-button">Register</button>
    </div>
  </main>
</section>
  <script src="register.js"></script>
</body>
</html>
