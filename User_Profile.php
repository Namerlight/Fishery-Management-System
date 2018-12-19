<?php session_start(); ?>

<!DOCTYPE html>

<?php include('connectDB.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
</head>

<style>

    body {
        top: -5px;
        position: relative;
        background-image: url("images/sea_background_image.jpg");
        background-color: #9fcdff;
        background-size: cover;
        font-family: "Calibri";
    }

    .body-box {

        background-color: #2e6da4;
        max-width: 500px;
        margin: auto;
        align-content: center;
        border-radius: 30px;

    }

</style>

<body>

    
    <div class="body-box" style="text-align: left; color: white; margin: auto; padding-left: 10px; padding-right: 10px; padding-top: 20px; padding-bottom: 20px;">
    
        <h2>

            Welcome, 

            <?php echo $_SESSION["Username"]; ?>

            <br>You can change your password or contact details, as well as check the any orders you've placed.

        </h2> 

        <form class="form-signin" action="User_Profile.php" method="POST">

            <label for="changePass">New Password</label>
            <input type="password" name="changePass" class="form-control" placeholder="New Password">

            <br>

            <button type="submit" name="changePass" class="btn btn-lg btn-primary btn-block" value="Submit">Change Password</button>

            <br>

            <label for="changeEmail">New Email Address</label>
            <input type="email" name="changeEmail" class="form-control" placeholder="New Email Address">

            <br>

            <button type="submit" name="changeEmail" class="btn btn-lg btn-primary btn-block" value="Submit">Change Email Address</button>

            <br>

            <label for="changeAddress">New Address</label>
            <input type="text" name="changeAddress" class="form-control" placeholder="New Address">

            <br>

            <button type="submit" name="changeAddress" class="btn btn-lg btn-primary btn-block" value="Submit">Change Address</button>

            <br>

            <label for="changePhone">New Phone Number</label>
            <input type="number" name="changePhone" class="form-control" placeholder="New Phone">

            <br>

            <button type="submit" name="changePhone" class="btn btn-lg btn-primary btn-block" value="Submit">Change Phone Nmber</button>

            <?php

            if(isset($_POST['changePass'])) {
                $CurrentUser = $_SESSION["Username"];
                $changingPass = $_POST['changePass'];

                $NewPass = md5($changingPass);

                $sql = "UPDATE customer SET password='$NewPass' WHERE name='$CurrentUser' ";

                mysqli_query($conn, $sql);

            }

            if(isset($_POST['changeEmail'])) {

                $CurrentUser = $_SESSION["Username"];
                $changeEmail = $_POST['changeEmail'];

                $sql = "UPDATE customer SET email='$changeEmail' WHERE name='$CurrentUser' ";
                mysqli_query($conn, $sql);

            }

            if(isset($_POST['changeAddress'])) {

                $CurrentUser = $_SESSION["Username"];
                $changeAddress = $_POST['changeAddress'];

                $sql = "UPDATE customer SET address='$changeAddress' WHERE name='$CurrentUser' ";
                mysqli_query($conn, $sql);

            }

            if(isset($_POST['changePhone'])) {

                $CurrentUser = $_SESSION["Username"];
                $changePhone = $_POST['changePhone'];

                $sql = "UPDATE customer SET phone='$changePhone' WHERE name='$CurrentUser' ";
                mysqli_query($conn, $sql);

            }

            ?>

        </form>

        <br>

        <h1>Your Orders</h1>

        <table style="width: 95%; margin: auto">

            <tr>

                <th>Order ID</th>
                <th>Fish Species</th>
                <th>Order Date</th>
                <th>Price</th>
                <th>Completed?</th>
                <th>Delivered From</th>

            </tr>

            <?php
            $CurrentUser = $_SESSION["Username"];

            echo $CurrentUser;

            $sql = "SELECT user_id FROM customer WHERE name=$CurrentUser";

            $result = mysqli_query($conn, $sql);



            $sql = $conn->query("SELECT order_id, fish_species, order_date, total_price, order_completed, fishery_id FROM orders WHERE use_id = implode($result)");


            if (mysqli_num_rows($sql) > 0) {
                while ( $row = $output ->fetch_assoc()) {
                    echo "<tr><td>" . $row["order_id"] . "</td><td>" . $row["fish_species"] . "</td><td>"
                        . $row["order_date"] . "</td><td>" . $row["total_price"] . "</td><td>" . $row["order_completed"] . "</td><td>"
                        . $row["fishery_id"] . "</td><tr>";
                }

            }

            ?>

        </table>


    </div>




</body>

</html>

<?php include('connectClose.php'); ?>
