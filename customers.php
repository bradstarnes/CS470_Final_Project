<html>
<head>
    <?php include('header.php'); ?>

</head>
<body>

<?php
require_once('./includes/dbconnect.php');

// Querying the table
$sql_of_q1 = "SELECT SSN, F_Name, L_Name FROM Customer;";
$q1result = mysqli_query($connection, $sql_of_q1);


?>



<div style="margin-right: 100px">
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'SSN'."</td>";
        echo "<td>".'First Name'."</td>";
        echo "<td>".'Last Name'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result)) //fetches a result row as an associative array.
        {
            echo "<tr>";
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
