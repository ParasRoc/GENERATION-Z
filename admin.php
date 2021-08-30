
<html>
<head>
<title>Checkorder</title>
      <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel=stylesheet href="css/index.css">
        <script src="javascript/Main.js" async></script>
        <link rel="stylesheet" href="css/additional.css">
        <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    </head>
    
<body>
    
    <nav class="mainnav">
        <div class="drops"  onclick=" togglenav() "></div>
            <ul>
                <li><a href="#">Desktops&Laptops</br>Prebuild</a>
                    <ul><li><a href="gamingdesktops.html">Gaming Desktops</a></li>
                        <li><a href="workst.html">Workstations</a></li>
                        <li><a href="gaminglap.html">Gaming Laptops</a></li>
                        <li><a href="workslap.html">WorkstationLaptops</a></li>
                    </ul></li>
                           
                    
                <li class="rest"><a href="buildyourway.html">BuildyourWay</a></li>
                <li class="rest"><a href="gearshop.html">Gearshop</a></li>
                
                <li class="cart"><a href="cart.html"> Cart
                    <ion-icon name="cart"></ion-icon><span>0</span>
                </a></li>
            </ul>

            
        </nav>
    <aside class="sidebar">
                <ul>
                  <li><span>User</span></li>  
                <li><a href="index.html">Home</a></li>
                <li><a href="checkorder.php">Order-Info</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="https://linustechtips.com/">Forum</a></li>
                <li><a href="Aboutus.html">About Us</a></li>
                </ul>
    </aside>

        <form style="padding-top: 120px;" class="formorderstat" method="POST" action="admin.php">
        <label>Enter New Status:</label><br>
                    <label>Enter User</label><br>
                        <input style="color:black;" id="user" name="user" type="text" class="num" required /><br>
                        <label>Enter Password:</label><br>
                        <input style="color:black;" id="pass"name="pass"type="password" class="num" required /><br>
                        <label>Enter Id:</label><br>
                        <input style="color:black;" id="id"name="id"type="text" class="num"  /><br>
                        <label>Enter Status:</label><br>
                        <input style="color:black;" id="status" name="status" type="text" class="num"  /><br>
        <input type="submit"  value="submit"> 
        </form>
</body></html>
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
    function showall()
    {
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
    
            $sql ="SELECT * FROM tbl_orders";
            $result = $conn->query($sql);
            echo "<pre style='font-color:white;padding-left:100px;'>id      name          phone           email                 Products Purchased</pre><br>";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<pre style='font-color:white;padding-left:100px;'>".$row["id"]."   ". $row["name"]."    ".$row["phone"]."     ".$row["email"]."      ". $row["products"]. "; ". $row["status"]. "</pre ><br>";
                }
            } else {
                echo " <pre style='font-color:white;padding-left:100px;'>No Results</pre>";
            }
            $conn->close();
    }

    if($_POST['pass']=='admin'&&$_POST['user']=='admin')
    {
      


     if($_POST['id']!=null&&$_POST['status']!=null)
        {

            
            function clean($value,$conn){
                $value=trim($value);
                $value=strip_tags($value);
                $value=stripslashes($value);
                $value = mysqli_real_escape_string($conn,$value);
                return $value;
            }
            $s=clean($_POST['id'],$conn);
            $f=clean($_POST['status'],$conn);
            $sql = "UPDATE tbl_orders SET  status='$f' WHERE id='$s' ";
            
            if ($conn->query($sql) === TRUE) {
            showall();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
                
        }
    else{
         echo"<br><br><p style='color:white;align:center;'>Enter proper id & status to update</p>";
           showall();
        }
}
else{
    echo"<br><br><p style='color:white;align:center;'>Wrong id or Pass</p>";
}
    
}


?>

 
     
     
