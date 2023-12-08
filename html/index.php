<?php
  session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/jquery.cycle2.min.js"></script>
  <script defer src="js/main.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollToPlugin.min.js" integrity="sha512-eI+25yMAnyrpomQoYCqvHBmY4dLfqKWPnD4j8y0E3Js+yqpF26xncL4t81M1zxC+ISYfRoCN52rN/n0q2UIBZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  
  <script>
    $( document ).ready( function() {
        $( '#main_title' ).fadeIn('slow');
      } );  
  </script>

  <title>internal_cafe</title>
</head>

<body>
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
								<a class="nav-link" href="mypage.php">MY PAGE</a>
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

<!-- 메인 타이틀 시작 -->
<section class="main-print" style="margin-top: 150px;">
  <div class="container-fluid text-center bg-1">
    <img class="main-title" id = "main_title" src="image/slo1.png" alt="main-title" style="display:none;"> <!--display none으로 해야 fadin이 적용됨.-->
  </div>
</section>

<section class="notice" style="width:100%; background-color: #f6f5ef;">
  <div class="container-fluid text-center bg-2">  
    <!-- 메뉴추천 -->
    <div class="centerImg">
        <div class="prev"><a href=#><div class="material-icons">arrow_back</div></a></div>
      <div style="position: relative;" class="img">
        <div class="cycle-slideshow" 
        data-cycle-prev=".prev"
        data-cycle-next=".next"
        data-cycle-timeout=0
        data-cycle-fx="carousel"
        data-cycle-pager =".pager"
        data-cycle-carousel-visible="3"
        data-cycle-carousel-fluid=true
        >
          <img class = "cycleimg ioio1" src="image/strbr.png" data-cycle-hash="Slide image;" >
          <img class = "cycleimg" src="image/gom.png" data-cycle-hash="Slide image;" >
          <img class = "cycleimg" src="image/mango.png" data-cycle-hash="Slide image;" >
          <img class = "cycleimg" src="image/green.png" data-cycle-hash="Slide image;" >
      </div>
      <p class="pager" style="margin-top: -10px;"></p>
      </div>

      <div class="next"><a href=#><div class="material-icons arrow">arrow_forward</div></a></d>
  </div>
</section>

 <section class="rewards">
  <!-- <div class="container-fluid text-center bg-3">
    
  </div> -->
</section>

<!-- 메인 타이틀 끝 -->

<!--  pick your favorit 시작 -->
<section class="favorite">
  <div class="container-fluid text-center bg-3">
    <div class="row">
      <div class="col-sm-5">
        <div class="favorite-text-group">
          <img src="image/favorite_text1.png" alt="" style="margin-top: 150px;">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div class="favorite-text-group" style="margin-top: 50px;">
          <a href="javascript:void(0)" class="btn btn--white">Order Now →</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--  pick your favorit 끝 -->

</body>

</html>