<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="../css/login.css?<?=filemtime("../css/login.css")?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Include a header for guest  -->
  <?php include("../headers/alt_header.php");?>
      <section>
      
        <div class='air air1'></div>
        <div class='air air2'></div>
        <div class='air air3'></div>
        <div class='air air4'></div>
       
  <main>
    <h1>Login</h1>
    <form id="login-form" name="login-form" action="../login_user.php" method="POST">
    <div class="login-form">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
          </div>
    
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
          </div>
      <button class="login-button">Log In</button>
    </div>
  </main>
</section>
  <script src="login.js"></script>
</body>
</html>
