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
  <link rel="stylesheet" href="css/login.css">
  <style>
    .find_pw{
      color: white;
      background-color: black;
      border-radius: 20px;
      padding: 10px 20px;
      margin: 2% 0;
      font-size: 10pt;
    }
  </style>
</head>
<body>
  <header>
	<header>
			<div class="inner">
				<nav class="navbar navbar-expand-xl navbar-light bg-2-right" style="margin: 0px;">
					<a class="navbar-brand" href="index.php"><img style ="margin-top: -58px;margin-left: 100px;" src="./image/internal_cafe_logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
					<div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 200px; display:flex !important; justify-content:space-around !important;">
						<ul class="navbar-nav" style="margin-top: 40px; height: 60px;">
							<li class="nav-item mag">
							<a class="nav-link" href="codygalaryouter.php">HOME</a>
							</li>
							<li class="nav-item dropdown">
             
              </li>
							<li class="nav-item mag">
								<a class="nav-link" href="list.php">MENU</a>
							</li>
							<li class="nav-item mag">
								<a class="nav-link" href="monthlycody.php">SATISFACTION</a>
							</li>
							<li class="nav-item mag">
								<a class="nav-link" href="mycloset.php">MY PAGE</a>
							</li>
              <?php 
                if(isset($_SESSION['e_id']))
                { ?>
                  <li class="nav-item mag">
								    <a class="nav-link" href="login.php">LOGOUT</a>
							    </li>
              <?php
                }else{?>
                <li class="nav-item mag">
                    <a class="nav-link" href="login.php">LOGIN</a>
              <?php }?>
						</ul>
					</div>
				</nav>	
        <!-- <span><?php echo $_SESSION['e_id']; ?></span>
        <span><?php echo $_SESSION['e_name']; ?></span> -->
        <form action="./logout.php" method="post">
        </form>
			</div>
			</header>
			<!-- 네비게이션 바 끝 -->
	</header>
<section class="signin">
  <div class="signin__card">
    <div class="logo" style="text-align: center">
      <img src="image/internal_cafe_logo.png" >
    </div>

    <form method="post" action="Find_PW_server.php" style="text-align:center";>

      <input type="text" name = "e_id" placeholder="Input ID" style="border: 2px #D3D3D3 solid; border-radius: 10px;">
      <input type="tel" name = "phone_number" placeholder="Input Phone Number" style="border: 2px #D3D3D3 solid; border-radius: 10px;">
      <button class="find_pw" type="submit" name = "login_btn" value="Sign-UP" style="border: 2px #D3D3D3 solid; border-radius: 10px;">Find-PW</button>
      <!-- <p style="color: #D3D3D3">
        Change your password regularly
      </p> -->
    </form>

    <!-- <div class="actions">
      <a href="./register_view.php">Sign-up</a>
      <a href="#"style="text-align: Right; margin-left: 150px;">Find ID</a>
      <a href="javascript:void(0)" style="text-align: Right;">Find PW</a>
    </div> -->
  </div>
</section>

</body>
</html>