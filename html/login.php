<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <?php include("header.php"); ?>
<section class="signin">
  <div class="signin__card">
    <div class="logo" style="text-align: center">
      <img src="./image/internal_cafe_logo.png" >
    </div>

    <form method="post" action="login_sql.php" style="text-align:center;">
    
      <input type="text" name = "e_id" placeholder="Employee ID" style="border: 2px #D3D3D3 solid; border-radius: 10px;">
      <input type="password" name = "password" placeholder="Password" style="border: 2px #D3D3D3 solid; border-radius: 10px;">
      <button class ="sign_in" type="submit" name = "login_btn" value="Sign-UP">Sign In</button>
      <!-- <p style="color: #D3D3D3">
        Change your password regularly
      </p> -->
    </form>
  
    <div class="actions">
      <a href="./register_view.php">Sign up</a>
      <a href="./Find_PW.php" style="text-align: Right;">Find PW</a>
    </div>
  </div>
</section>
</body>
</html>