<?php
include_once 'dbconfig.php';

$dbname = "company_cafe";
mysqli_select_db($conn, $dbname) or die('DB selection failed');

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "menu_id: " . $row["menu_id"]. ", menu_name: " . $row["menu_name"]
			. ", price " . $row["price"] . "<br>";
	}
}else {
	echo "0 results";
}
$conn->close();
?>
