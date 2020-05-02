<html>
<head>
    <?php include('header.php'); ?>

</head>
<body>

<?php
require_once('./includes/dbconnect.php');

// Querying the table
$sql_of_q1 = "SELECT * FROM Employee;";
$q1result = mysqli_query($connection, $sql_of_q1);

echo ("SQL STUFF". $sql);
?>



<div style="margin-right: 100px">
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'ID'."</td>";
        echo "<td>".'Address'."</td>";
        echo "<td>".'Salary'."</td>";
        echo "<td>".'SSN'."</td>";
        echo "<td>".'F_Name'."</td>";
        echo "<td>".'L_Name'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($sql)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>".$r['Employee_ID']."</td>";
            echo "<td>".$r['Address']."</td>";
            echo "<td>".$r['Salary']."</td>";
            echo "<td>".$r['SSN']."</td>";
            echo "<td>".$r['F_Name']."</td>";
            echo "<td>".$r['L_Name']."</td>";

            echo "</tr>";
        }


        ?>


    </table>
</div>


<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
