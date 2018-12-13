<?php include('connectDB.php'); ?>

<?php session_start(); ?>

<?php

    if(isset($_POST['SignIn'])) {

        $Username = $_POST['inputUser'];
        $EncrPassword = $_POST['inputPassword'];

        $Password = md5($EncrPassword);

        echo $Username;
        echo $Password;

        $is_user = "SELECT * FROM customer WHERE name = '$Username' AND password = '$Password'";
        $query_run = mysqli_query($conn, $is_user);
        $rows = mysqli_num_rows($query_run);
        echo $rows;


        if ($rows == 1) {
            echo "Valid User.";
            $_SESSION['inputUser'] = $Username;

            if ($_SESSION['inputUser'] != NULL) {
                echo $_SESSION['inputUser'];
            }
            header('location:Initial_Page.php');
        } else {
            echo "Invalid User.";
        }

    }

    echo "login page";

?>

<?php include('connectClose.php'); ?>