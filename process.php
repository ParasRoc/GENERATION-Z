<?php



$servername = "localhost";
$username = "jp";
$password = "jppp";
$dbname = "orders";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function clean($value,$conn){
  $value=trim($value);
  $value=strip_tags($value);
  $value=stripslashes($value);
  $value = mysqli_real_escape_string($conn,$value);
  return $value;
}
$s=clean($_POST['name'],$conn);
$f=clean($_POST['adds'],$conn);
$d=clean($_POST['phone'],$conn);
$e=clean($_POST['email'],$conn);
$products=clean($_POST['products'],$conn);



$sql = "INSERT INTO tbl_orders (name,address,email,phone,products,status)
VALUES ('$s', '$f','$e','$d','$products','Order received')";

if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
