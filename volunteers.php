<html>
<head>
    <?php require_once('./includes/dbconnect.php'); ?>
    <?php include('header.php'); ?>

</head>
<body>

<?php

// Querying the table
$sql_of_q1 = "SELECT * FROM Volunteer;";
$q1result = mysqli_query($connection, $sql_of_q1);
?>



<div style="margin-right: 100px">
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'ID'."</td>";
        echo "<td>".'Supervisor ID'."</td>";
        echo "<td>".'SSN'."</td>";
        echo "<td>".'First Name'."</td>";
        echo "<td>".'Last Name'."</td>";
        echo "<td>".'Address'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>".$r['Volunteer_ID']."</td>";
            echo "<td>".$r['Supervisor_ID']."</td>";
            echo "<td>".$r['SSN']."</td>";
            echo "<td>".$r['F_Name']."</td>";
            echo "<td>".$r['L_Name']."</td>";
            echo "<td>".$r['Address']."</td>";

            echo "</tr>";
        }


        ?>


    </table>
</div>


<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
