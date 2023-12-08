<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/my_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap">
    <title>Company Internal Cafe System</title>
</head>

<body>
    <?php
session_start();
$db = mysqli_connect("localhost:3306","root","sieun119!","company_cafe");

  if(!$db)
  {
    echo "DB접속실패";
  }

  function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}

// Check if the user is logged in
if (!isset($_SESSION['e_id'])) {
    header("location: login.php");
    exit();
}

// Retrieve user information based on the session id
$e_id = $_SESSION['e_id'];
$query = "SELECT * FROM EMPLOYEE WHERE e_id = '$e_id'";
$result = mq($query);
    // 쿼리 결과 확인
    if ($result) {
        // 사용자 정보가 존재하는 경우
        $userData = $result->fetch_assoc();
    } else {
        // 사용자 정보가 없는 경우 또는 오류 발생 시 처리
        $userData = null;
    }
    ?>
    <?php include("header.php"); ?>
    <div class="header2">
        <span id="my-page-text"><i id="my-page-icon" class="fas fa-user"></i>My Page</span>
        <?php
        if ($userData) {
            echo '<span id="welcome-message">' . $userData['e_name'] . '님, 환영합니다! 🙌🏻</span>';
        } else {
            echo '사용자 정보를 가져오지 못했습니다.';
        }
        ?>
    </div>
    <section id="user-info">
        <?php
        if ($userData) { 
            echo '<div class="profile_main">';
            $imagePath = $userData['img'];
            echo '<div class="profile_img">';
            echo '<div id="profile-picture">';
            echo "<img src='$imagePath' alt='Image'>";
            echo '</div>';
            echo '</div>';
            echo '<div id="user-details">';
            echo '<h2 id="e_name">' . $userData['e_name'] . '</h2>';
            echo '<p id="e_id">' . $userData['e_id'] . '</p>';
            echo '<p id="phone_number">' . $userData['phone_number'] . '</p>';
            echo '<p id="title">' . $userData['title'] . '</p>';
            echo '</div>';
            echo '<div class="edit_profile">'; 
            echo '<form action="edit_profile.php" method="post">';
            echo '<button class="edit" type="submit">개인정보 수정</button>';
            echo '</form>';
            echo '</div>';
            echo '<div id="user-links">';
            echo '<form action="main.php" method="post">';
            echo '<button id="order-button" type="submit"><i class="fas fa-shopping-cart"></i>주문하러 가기</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
    } else {
        echo '사용자 정보를 가져오지 못했습니다.';
    }
    ?>
    
    <div class="user-activities-container">
        <!-- <h3>최근 활동</h3>
        수정된 코드 -->
        <div class="user-activities-icon">
            <div class="activity-icon" onclick="toggleSection('mileage-history')">
                <i class="fas fa-coins"></i>
                <span>Mileage History</span>
            </div>
            <div class="activity-icon" onclick="goToOrderHistory()">
                <i class="fas fa-shopping-bag"></i>
                <span>Order History</span>
            </div>
            <div class="activity-icon" onclick="#">
                <i class="fas fa-shopping-bag"></i>
                <span>Satisfaction 평가</span>
            </div>
            
    </div>
        </div>
    </div>
    </section>
    <!-- <section id="mileage-history" class="hidden-section">
        <h3>마일리지 내역 조회</h3>
    </section> -->
</body>
</html>

