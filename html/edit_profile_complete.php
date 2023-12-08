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

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $e_name = $row['e_name'];
    $title = $row['title'];
    $phone_number = $row['phone_number'];
    // You may choose not to display the password in the form
}

// Handle form submission to update information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $new_password = isset($_POST['new_password']) ? mysqli_real_escape_string($db, $_POST['new_password']) : '';
    $new_phone_number = isset($_POST['new_phone_number']) ? mysqli_real_escape_string($db, $_POST['new_phone_number']) : '';


    // Update the database with the new information
    $update_query = "UPDATE EMPLOYEE SET password = '$new_password', phone_number = '$new_phone_number' WHERE e_id = '$e_id'";
    mq($update_query);

    // Optionally, you can display a success message
    echo "<script>alert('Profile updated successfully.');</script>";

}

// Close the database connection
$db->close();
?>

<script>
    window.location.href = "my_page2.php";
</script>