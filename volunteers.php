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


<h1>Volunteers</h1>
<div class="tableOutput" style="margin-right: 100px">
    <h3>A list of our Volunteers can be found here</h3>

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
<div class="newdataform">
    <h3>Add a New Volunteer</h3>
    <form action="newdonor.php" method="post">
        <p>First name: <input type="text" name="f_name" /></p>
        <p>Last name: <input type="text" name="l_name" /></p>
        <p>Company Name: <input type="text" name="company_name" /></p>
        <p>Employee Connection: <input type="text" name="employee_ID" /></p>
        <p>Donor Type: <input type="text" name="donor_Type" /></p>
        <input type="submit" name="submit" value="Submit" />
    </form>

    <h3>Add a New Donation</h3>
    <form action="newdonation.php" method="post">
        <p>Donation Date: <input type="date" name="donation_date" /></p>
        <p>Donor ID (Choose from Table to Left): <input type="text" name="donor_ID" /></p>
        <p>Amount: <input type="text" name="donation_amount" /></p>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
