<html>
<head>
    <?php include('header.php'); ?>
    <?php require_once('./includes/dbconnect.php');?>

</head>
<body>

<?php

// Querying the table
$sql_of_q1 = "SELECT * FROM donor;";
$q1result = mysqli_query($connection, $sql_of_q1);


?>



<div style="margin-right: 100px">
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'ID'."</td>";
        echo "<td>".'Total ($)'."</td>";
        echo "<td>".'Type'."</td>";
        echo "<td>".'Employee '."</td>";
        echo "<td>".'F_Name'."</td>";
        echo "<td>".'L_Name'."</td>";
        echo "<td>".'Company_Name'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>".$r['Donor_ID']."</td>";
            echo "<td>".$r['Donation_Total']."</td>";
            echo "<td>".$r['Donor_Type']."</td>";
            echo "<td>".$r['Employee_ID']."</td>";
            echo "<td>".$r['F_Name']."</td>";
            echo "<td>".$r['L_Name']."</td>";
            echo "<td>".$r['Company_Name']."</td>";

            echo "</tr>";
        }


        ?>


    </table>
</div>


<div class="newDonorForm">
    <form action="newdonor.php" method="post">
        <p>First name: <input type="text" name="f_name" /></p>
        <p>Last name: <input type="text" name="l_name" /></p>
        <p>Company Name: <input type="text" name="company_name" /></p>
        <p>Employee Connection: <input type="text" name="employee_ID" /></p>
        <p>Donor Type: <input type="text" name="donor_Type" /></p>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
