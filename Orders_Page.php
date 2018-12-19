<?php session_start(); ?>

<?php include ('connectDB.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
</head>

<style>

    body {
        top: 20px;
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

<?php

    $fishList = $conn->query("SELECT Species FROM inventory");

?>

<body>


<div class="body-box">

    <div style="text-align: left; color: white; margin: auto; padding-left: 10px; padding-right: 10px; padding-top: 20px; padding-bottom: 30px;">

        <h2>

        Welcome,

        <?php echo $_SESSION["Username"]; ?>

        <br>Select the type of fish and enter the amount you wish to order. The price will be calculated automatically. You can view your orders from your User Page.

        </h2>

        <br>

        <form id="form-signin" action="Orders_Page.php" method="post">
            <label for="FishSpecies">Fish Species</label>
            <select id="FishSpecies" name="FishSpecies" class="form-control">
                <?php
                    while($rows = $fishList->fetch_assoc()){
                        $fishes = $rows['Species'];
                        echo "<option value='$fishes'>$fishes</option>";
                    }
                ?>
            </select>

            <label for="inputWeight">Amount</label>
            <input type="number" name="inputWeight" class="form-control" placeholder="Weight" required>
            <br>
            <button type="submit" name="Testing" class="btn btn-lg btn-primary btn-block" value="Submit">Place Order.</button>

        </form>

        <?php

            if(isset($_POST['Testing'])){
                echo "Success";

                $order_id = rand(100, 999);
                $Species = $_POST['FishSpecies'];
                $Weight = $_POST['inputEmail'];
                $Date = date("Y-m-d");

                echo $order_id, $Species, $Weight, $Date;

                $pricing = "SELECT price_per_kg FROM inventory WHERE species = $Species";
                $totalPrice = $Weight * $pricing;

                $Uname = $_SESSION["Username"];
                $Uid = "SELECT user_id FROM customers WHERE name = $Uname";

                $OrderComplete = 0;
                $fisheryID = 1000;

                $sql = "INSERT INTO orders( order_id, fish_species, order_date, total_price, order_completed, fishery_id, use_id)
                    VALUES('$order_id', '$Species', '$Date', '$totalPrice', '$OrderComplete', '$fisheryID', '$Uid' )";

                mysqli_query($conn, $sql);

                if ($conn->query($sql) === TRUE) {
                    echo "Order Placed successfully";
                    header('location:Initial_Page.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    header('location:Orders_Page.php');
                }

            }

            if(isset($_POST['PlaceOrder'])) {

                echo 'Test';

                $order_id = rand(100, 999);
                $Species = $_POST['FishSpecies'];
                $Weight = $_POST['inputEmail'];
                $Date = date("Y-m-d");

                echo $order_id, $Species, $Weight, $Date;

                $pricing = "SELECT price_per_kg FROM inventory WHERE species = '$Species'";
                $totalPrice = $Weight * $pricing;

                $Uname = $_SESSION["Username"];
                $Uid = "SELECT user_id FROM customers WHERE name = '$Uname'";

                $OrderComplete = 0;
                $fisheryID = 1000;

                $sql = "INSERT INTO orders( order_id, fish_species, order_date, total_price, order_completed, fishery_id, use_id)
                    VALUES('$order_id', '$Species', '$Date', '$totalPrice', '$OrderComplete', '$fisheryID', '$Uid' )";

                if ($conn->query($sql) === TRUE) {
                    echo "Order Placed successfully";
                    header('location:Initial_Page.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    header('location:Orders_Page.php');
                }

            }

        ?>

    </div>

</body>
</html>

<?php include('connectClose.php'); ?>