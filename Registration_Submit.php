<?php include('connectDB.php'); ?>

<?php

    if(isset($_POST['RegisterAccount'])) {
        $Username = $_POST['inputUser'];
        $Email = $_POST['inputEmail'];
        $Password_1 = $_POST['inputPassword'];
        $Password_2 = $_POST['retypePassword'];
        $Address = $_POST['inputAddress'];
        $Contact_number = $_POST['inputPhone'];
        $User_type = $_POST['typeFlag'];

        $password = md5($Password_1);
        $user_id = rand(100,999);

        $sql = "INSERT INTO customer( user_id, user_flag, name, phone, address, email, password) 
            VALUES('$user_id', '$User_type', '$Username', '$Contact_number', '$Address', '$Email', '$password' )";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }



    }

    ?>

<?php include('connectClose.php'); ?>