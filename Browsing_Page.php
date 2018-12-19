<!DOCTYPE html>

<?php include('connectDB.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Table</title>
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
        border-top-right-radius: 30px;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;

    }

    table, th, td {
        padding-left: 5px;
        border: 1px solid;
        border-color: white;
        border-radius: 5px;
        border-collapse: collapse;
        text-align: center;
        color: white;
    }



</style>
<body>


    <div class="body-box" style="text-align: center; color: white">

        <br>

        <h1><b>Our Inventory</b></h1>

        <br>

         <table style="width: 95%; margin: auto">

             <tr>

                 <th><h2>Species</h2></th>
                 <th><h2>Type</h2></th>
                 <th><h2>Average Weight</h2></th>
                 <th><h2>Price Per Kg</h2></th>

             </tr>

             <?php

             $sql = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory";

             $output = $conn -> query($sql);

             if ($output -> num_rows > 0) {
                 while ( $row = $output ->fetch_assoc()) {
                     echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                         . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                 }



             }

             ?>

        </table>

        <br>
        <br>

        <form id="form-signin" action="Browsing_Page.php" method="post">
            <button type="submit" name="SortName" class="btn btn-lg btn-primary btn-block" value="SortbyName">Sort By Name</button>
        </form>
        <form id="form-signin" action="Browsing_Page.php" method="post">
            <button type="submit" name="SortType" class="btn btn-lg btn-primary btn-block" value="SortbyType">Sort By Type</button>
        </form>
        <form id="form-signin" action="Browsing_Page.php" method="post">
            <button type="submit" name="SortWeight" class="btn btn-lg btn-primary btn-block" value="SortByWeight">Sort By Weight</button>
        </form>
        <form id="form-signin" action="Browsing_Page.php" method="post">
            <button type="submit" name="SortPrice" class="btn btn-lg btn-primary btn-block" value="SortByPrice">Sort By Price</button>
        </form>

        <br>

        <form id="form-signin" action="Browsing_Page.php" method="post">
            <input type="number" name="inputLower" class="form-control" placeholder="Minimum Price">
            <input type="number" name="inputUpper" class="form-control" placeholder="Maximum Price">
            <button type="submit" name="FilterPrice" class="btn btn-lg btn-primary btn-block" value="FilterbyPrice">Filter By Price</button>
        </form>

        <form id="form-signin" action="Browsing_Page.php" method="post">
            <select id="typeFlag" name="typeFlag" class="form-control">
                <option selected>Freshwater</option>
                <option>Saltwater</option>
            </select>
            <button type="submit" name="FilterWater" class="btn btn-lg btn-primary btn-block" value="FilterbyWater">Filter By Type</button>
        </form>


        <br>
        <br>

        <table style="width: 95%; margin: auto">

            <tr>

                <th><h2>Species</h2></th>
                <th><h2>Type</h2></th>
                <th><h2>Average Weight</h2></th>
                <th><h2>Price Per Kg</h2></th>

            </tr>

        <?php

        if(isset($_POST['SortName'])) {
            $sort = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory ORDER BY Species ASC";

            $output = $conn -> query($sort);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                        . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                }
            }
        } elseif (isset($_POST['SortType'])) {

            $sort = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory ORDER BY Type ASC";

            $output = $conn -> query($sort);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                        . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                }
            }
        } elseif (isset($_POST['SortWeight'])) {

            $sort = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory ORDER BY Avg_Weight ASC";

            $output = $conn -> query($sort);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                        . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                }
            }
        } elseif (isset($_POST['SortPrice'])) {

            $sort = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory ORDER BY Price_per_kg ASC";

            $output = $conn -> query($sort);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                        . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                }
            }
        } elseif (isset($_POST['FilterPrice'])) {
            $upperbound = $_POST['inputUpper'];
            $lowerbound = $_POST['inputLower'];

            $sort = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory WHERE Price_per_kg BETWEEN '$lowerbound' AND '$upperbound' ORDER BY Price_per_kg ASC";

            $output = $conn -> query($sort);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                        . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                }
            }
        } elseif (isset($_POST['FilterWater'])) {
            $WaterType = $_POST['typeFlag'];

            $sort = "SELECT Species, Type, Avg_Weight, Price_per_kg FROM inventory WHERE Type = '$WaterType'";

            $output = $conn -> query($sort);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["Species"] . "</td><td>" . $row["Type"] . "</td><td>"
                        . $row["Avg_Weight"] . "</td><td>" . $row["Price_per_kg"] . "</td></tr>";
                }
            }
        }






        ?>

        </table>

        <br>

        <form action="Initial_Page.php" method="post">
            <button type="submit" class="btn btn-lg btn-primary btn-block" formaction="Initial_Page.php">Back to Homepage</button>
        </form>

        <br>

    </div>

</body>
</html>