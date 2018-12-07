<html>
<head>
    <title> register form </title>
</head>

<body>

<?php

include "connectDB.php";

    if(isset($_POST['RegisterAccount'])) {
        $Username = $_POST['inputUser'];
        $Email = $_POST['inputEmail'];
        $Password_1 = $_POST['inputPassword'];
        $Password_2 = $_POST['retypePassword'];
        $Address = $_POST['inputAddress'];
        $Contact_number = $_POST['inputPhone'];
        $User_type = $_POST['typeFlag'];

        if(empty($Username)) {
            array_push($errors,"username is required");
        }
        if(empty($Password_1)) {
            array_push($errors,"password is required");
        }
        if($Password_1 != $Password_2) {
            array_push($errors, "passwords don't match");
        }

        if(count($errors)==0) {
            $password = md5($Password_1);
            $sql = "INSERT INTO 'customer'( `user_id`, 'user_flag','name','phone', 'address', 'email', 'password') VALUES(\'350\',$User_type,'$Username','$Contact_number','$Address','$Email','password')";
            $performQuery=mysqli_query($connection,$sql);
            if(!performQuery) {  echo 'record inserted';      }
        }

        $sql = "INSERT INTO `customer` (`user_id`, `user_flag`, `name`, `phone`, `address`, `email`, `password`) VALUES (\'203\', \'company\', \'Jon\', \'12311\', \'rd 2\', \'jon@fasc.com\', \'555\')";

        mysqli_close($connection);
    }


?>

    <a href="Initial_Page.php" class="btn btn-light">Return to Main Page</a>
</body>
</html>

$sql = "SELECT * FROM `customer`";

