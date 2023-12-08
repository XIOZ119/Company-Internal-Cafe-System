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

if (isset($_POST['e_id']) && isset($_POST['password'])) {
    // Secure user inputs
    // Assuming $database is your MySQLi connection object
    $user_id = mysqli_real_escape_string($db, $_POST['e_id']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['password']);


    // Error checks
    if (empty($user_id) || empty($user_pass1)) {
        echo "<script>
        alert('아이디와 비밀번호를 모두 입력해주세요.');
        location.replace('./login.php');
        </script>";
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $db->prepare("SELECT * FROM EMPLOYEE WHERE e_id = '$user_id'");
    // $stmt->bind_param("s", $user_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hash = $row['password']; // Assuming 'password' is the column name for hashed passwords

        // Check password using password_verify
        if ($hash == $user_pass1) {
            $_SESSION['e_id'] = $row['e_id'];

            header("location: main.php");
            exit();
        } else {
            echo "<script>
            alert('로그인에 실패하였습니다.');
            location.replace('./login.php');
            </script>";
        }
    } else {
        // Handle case when user is not found
        echo "<script>
        alert('해당 아이디를 찾을 수 없습니다.');
        location.replace('./login.php');
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
    alert('알 수 없는 오류가 발생하였습니다.');
    location.replace('./index.php');
    </script>";
}
?>


<!-- $e_id = '1111'; // Replace with the actual user ID
$e_name = '신희주'; // Replace with the actual user name
$title = '과장'; // Replace with the actual user title
$password = '1234'; // Replace with the actual user password

// Hash the password before inserting it into the database
$hashed_password = password_hash($password1, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO EMPLOYEE (e_id, e_name, title, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $e_id, $e_name, $title, $hashed_password);
$stmt->execute();

$stmt->close();
$db->close(); -->
