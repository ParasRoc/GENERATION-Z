<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generation Z | Welcome</title>
    <link rel="stylesheet" href="eg.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel=stylesheet href="css/index.css">
    <script src="javascript/Main.js" async></script>
    <link rel="stylesheet" href="css/additional.css">
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
  </head>
<style media="screen1">
    .carousel-cell{
        width: 100%;
    }
    .carousel-cell:before{
        display: block;
    }
</style>
<body>
    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true}'>
        <div class="carousel-cell">
            <img src="./img1/2.webp">
        </div>
        <div class="carousel-cell">
            <img src="./img1/3.webp">
        </div>
        <div class="carousel-cell">
            <img src="./img1/4.jpg">
        </div>
        <div class="carousel-cell">
            <img src="./img1/5.jpg">
        </div>
        <div class="carousel-cell">
            <img src="./img1/6.webp">
        </div>
        <div class="carousel-cell">
            <img src="./img1/7.webp">
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    
    
    <div class="dropdown">
            <nav>
                <a href="eg.html"><img class="logo" src="./img1/1.png"></a>
                <ul>
                    <li><a href="eg.html">Home</a></li>
                    <li><a href="#">Desktops <i class="fas fa-caret-down"></i> </a>
                        <ul>
                            <li><a href="gamingdesktops.html">Gaming Desktop</a></li>
                            <li><a href="workst.html">Workstation Desktop</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptops <i class="fas fa-caret-down"></i> </a>
                        <ul>
                            <li><a href="gaminglap.html">Gaming Laptop</a></li>
                            <li><a href="workslap.html">Workstation Laptop</a></li>
                        </ul>
                    </li>
                    <li><a href="gearshop.html">Accessories</a></li>
                    <li><a href="#">Services <i class="fas fa-caret-down"></i> </a>
                        <ul>
                            <li><a href="Aboutus.html">About</a></li>
                            <li><a href="https://www.originpc.com/">Support</a></li>
                            <li><a href="buildyourway.html">BuildyourWay</a></li>
                        </ul>
                    </li>>
                    <li><a href="login.html"><i class="fas fa-user-plus"> Login</i></a></li>
                    <li class="cart"><a href="cart.html"><i class="cart"></i><i class="fas fa-shopping-cart"></i> Cart<span>0</span></a></li>
                </ul>
            </nav>
    </div>
  
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){


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



function clean($value){
    $value=trim($value);
    $value=strip_tags($value);
    $value=stripslashes($value);
   
    return $value;
}

$f=clean($_POST['phone']);
$f = mysqli_real_escape_string($conn,$f);


$sql ="SELECT id,status,name,phone FROM tbl_orders WHERE phone='$f'";
$result = $conn->query($sql);
echo "<pre style='font-color:white;padding-left:100px;'>id       name          phone           Status</pre><br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<pre style='font-color:white;padding-left:100px;'>".$row["id"]."        ". $row["name"]."           ". $row["phone"]. "          ". $row["status"]. "</pre ><br>";
    }
  } else {
    echo " <pre style='font-color:white;padding-left:100px;'>No Results</pre>";
  }
$conn->close();
}
?>
</body>
</html>