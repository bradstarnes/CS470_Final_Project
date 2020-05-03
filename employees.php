<html>
<head>
    <?php include('header.php'); ?>

</head>
<body>

<?php
require_once('./includes/dbconnect.php');

// Querying the table
$sql_of_q1 = "SELECT Employee_ID, Address, Salary, F_Name, L_Name FROM Employee;";
$q1result = mysqli_query($connection, $sql_of_q1);

?>


<h1>Employees</h1>

<div class="tableOutput" style="margin-right: 100px">
    <table border="1">
        <h3>A list of our Employees can be found here</h3>


        <?php
        echo "<tr>";
        echo "<td>".'ID'."</td>";
        echo "<td>".'Address'."</td>";
        echo "<td>".'Salary'."</td>";
        echo "<td>".'F_Name'."</td>";
        echo "<td>".'L_Name'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>".$r['Employee_ID']."</td>";
            echo "<td>".$r['Address']."</td>";
            echo "<td>".$r['Salary']."</td>";
            echo "<td>".$r['F_Name']."</td>";
            echo "<td>".$r['L_Name']."</td>";

            echo "</tr>";
        }


        ?>


    </table>
</div>


<div class="newdataform">
    <h3>Add a New Employee</h3>
    <form action="newemployee.php" method="post">
        <p>First name: <input type="text" name="f_name" /></p>
        <p>Last name: <input type="text" name="l_name" /></p>
        <p>SSN: <input type="password" name="ssn"  maxlength="9"/></p>
        <p>Address: <input type="text" name="address" /></p>
        <p>Salary: <input type="number" name="salary" /></p>

        <input type="submit" name="submit" value="Submit" />
    </form>
</div>



<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
