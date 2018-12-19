<!DOCTYPE html>

<?php include('connectDB.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/background-formatting.css">
    
</head>

<style>

    body {
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

     <div class="body-box" style="text-align: center; color: white">

         <br>

         <h1><b>Employees</b></h1>

         <br>

         <table style="width: 95%; margin: auto">

             <tr>

                 <th>Employee ID</th>
                 <th>Employee Name</th>
                 <th>Address</th>
                 <th>Position</th>
                 <th>Salary</th>
                 <th>Hire Date</th>

             </tr>

             <?php

             $sql = "SELECT emp_id, emp_name, address, position, salary, hire_date FROM employees";

             $output = $conn -> query($sql);

             if ($output -> num_rows > 0) {
                 while ( $row = $output ->fetch_assoc()) {
                     echo "<tr><td>" . $row["emp_id"] . "</td><td>" . $row["emp_name"] . "</td><td>"
                         . $row["address"] . "</td><td>" . $row["position"] . "</td><td>" . $row["salary"] . "</td><td>"
                         . $row["hire_date"] . "</td><tr>";
                 }



             }

             ?>

        </table>

        <br>
        <br>

        <form id="form-signin" action="Admin_Panel.php" method="post">
            <select id="SortFilter" name="SortFilterColumn" class="form-control">
                <option>emp_id</option>
                <option>emp_name</option>
                <option>address</option>
                <option>position</option>
                <option>salary</option>
                <option>hire_date</option>
            </select>
            <button type="submit" name="SortColumnAsc" class="btn btn-lg btn-primary btn-group-justified" value="SortColumnAsc">Sort in Ascending</button>
            <button type="submit" name="SortColumnDesc" class="btn btn-lg btn-primary btn-group-justified" value="SortColumnDesc">Sort in Descending</button>
            <input type="text" name="FilterInput" class="form-control" placeholder="Filtering Input">
            <button type="submit" name="FilterColumn" class="btn btn-lg btn-primary btn-group-justified" value="FilterColumn">Filter by</button>


        </form>

        <br>
        <br>
        <br>

        <table style="width: 95%; margin: auto">

            <tr>

                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Hire Date</th>

            </tr>

        <?php

        if(isset($_POST['SortColumnAsc'])) {

            $sortingAttr = $_POST['SortFilterColumn'];

            $sql = "SELECT emp_id, emp_name, address, position, salary, hire_date FROM employees ORDER BY $sortingAttr ASC";

            $output = $conn -> query($sql);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["emp_id"] . "</td><td>" . $row["emp_name"] . "</td><td>"
                        . $row["address"] . "</td><td>" . $row["position"] . "</td><td>" . $row["salary"] . "</td><td>"
                        . $row["hire_date"] . "</td><tr>";
                }
            }
        } elseif (isset($_POST['SortColumnDesc'])) {
            $sortingAttr = $_POST['SortFilterColumn'];

            $sql = "SELECT emp_id, emp_name, address, position, salary, hire_date FROM employees ORDER BY $sortingAttr DESC";

            $output = $conn -> query($sql);

            if ($output -> num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["emp_id"] . "</td><td>" . $row["emp_name"] . "</td><td>"
                        . $row["address"] . "</td><td>" . $row["position"] . "</td><td>" . $row["salary"] . "</td><td>"
                        . $row["hire_date"] . "</td><tr>";
                }
            }
        } elseif (isset($_POST['FilterColumn'])) {
            $filteringAttr = $_POST['SortFilterColumn'];
            $filteringValue = $_POST['FilterInput'];

            echo $filteringAttr;
            echo $filteringValue;

            $sql = "SELECT emp_id, emp_name, address, position, salary, hire_date FROM employees WHERE $filteringAttr = $filteringValue";

            $output = $conn->query($sql);

            if ($output->num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    echo "<tr><td>" . $row["emp_id"] . "</td><td>" . $row["emp_name"] . "</td><td>"
                        . $row["address"] . "</td><td>" . $row["position"] . "</td><td>" . $row["salary"] . "</td><td>"
                        . $row["hire_date"] . "</td><tr>";
                }
            } else {
                $sql = "SELECT emp_id, emp_name, address, position, salary, hire_date FROM employees WHERE $filteringAttr = '$filteringValue'";

                $output = $conn->query($sql);

                if ($output->num_rows > 0) {
                    while ($row = $output->fetch_assoc()) {
                        echo "<tr><td>" . $row["emp_id"] . "</td><td>" . $row["emp_name"] . "</td><td>"
                            . $row["address"] . "</td><td>" . $row["position"] . "</td><td>" . $row["salary"] . "</td><td>"
                            . $row["hire_date"] . "</td><tr>";
                    }
                }
            }
        }

        ?>



         </table>

         <br>

         <h1><b>Fishery Managers</b></h1>

         <br>

         <table style="width: 95%; margin: auto">

             <tr>

                 <th>Fishery ID</th>
                 <th>Fishery Location</th>
                 <th>Employee ID</th>
                 <th>Employee Name</th>
                 <th>Position</th>
                 <th>Hire Date</th>

             </tr>

             <?php

             $sql = "SELECT F_Id, location, emp_id, emp_name, position, hire_date FROM employees JOIN fisheries ON mgr_id = emp_id";

             $output = $conn -> query($sql);

             if ($output -> num_rows > 0) {
                 while ( $row = $output ->fetch_assoc()) {
                     echo "<tr><td>" . $row["F_Id"] . "</td><td>" . $row["location"] . "</td><td>"
                         . $row["emp_id"] . "</td><td>" . $row["emp_name"] . "</td><td>" . $row["position"] . "</td><td>" . $row["hire_date"] . "</td><tr>";
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


     <br>
     <br>
     <br>


</body>
</html>