<html>
<head>
    <?php include('header.php'); ?>
    <?php require_once('./includes/dbconnect.php');?>

</head>
<body>

<?php

// Querying the table
$sql_of_q1 = "SELECT Donor.Donor_ID, FORMAT(SUM(Donations.Amount), 0) AS Donation_Total, Donor_Type, Employee_ID, F_Name, L_Name, Company_Name FROM Donor INNER JOIN `Donations` ON `Donations` . `Donor_ID` = `Donor`. `Donor_ID`GROUP BY Donor.Donor_ID;";
$q1result = mysqli_query($connection, $sql_of_q1);


$sql_of_q2 = "SELECT Donation_Date, Donor_ID, Amount FROM Donations;";
$q12esult = mysqli_query($connection, $sql_of_q2);


?>

<div class="row">
    <h1>Donors</h1>
    <div class="tableOutput" style="margin-right: 100px">
        <h3>A list of our Donors can be found here</h3>
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


    <div class="newdataform">
        <h3>Add a New Donor</h3>
        <form action="newdonor.php" method="post">
            <p>First name: <input type="text" name="f_name" /></p>
            <p>Last name: <input type="text" name="l_name" /></p>
            <p>Company Name: <input type="text" name="company_name" /></p>

            <p>Employee Connection:<select id="employee_ID" name="employee_ID">
                    <?php
                    $sql = mysqli_query($connection, "SELECT F_Name, L_Name, Employee_ID FROM Employee");
                    while ($row = $sql->fetch_assoc()){
                        echo "<option value='" . $row['Employee_ID'] . "'>" . $row['Employee_ID'] . " " . $row['F_Name'] . ' '.  $row['L_Name'] . "</option>";
                    }
                    ?>
                </select></p>

            <p>Donor Type: <select id="donor_Type" name="donor_Type">
                    <option value="Personal">Personal</option>
                    <option value="Corporate">Corporate</option>
                </select></p>
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>
</div>




<div class="row">
    <div class="tableOutput" style="margin-right: 100px">
        <h3>A list of our Donations can be found here</h3>
        <table border="1">


            <?php
            echo "<tr>";
            echo "<td>".'Total ($)'."</td>";
            echo "<td>".'Donor_ID'."</td>";
            echo "<td>".'Date '."</td>";

            echo "</tr>";
            while($r = mysqli_fetch_assoc($q12esult)) //fetches a result row as an associative array.
            {
                echo "<tr>";
                echo "<td>".$r['Amount']."</td>";
                echo "<td>".$r['Donor_ID']."</td>";
                echo "<td>".$r['Donation_Date']."</td>";
                echo "</tr>";
            }


            ?>


        </table>
    </div>
    <div class="newdataform">
        <h3>Add a New Donation</h3>
        <form action="newdonation.php" method="post">
            <p>Donation Date: <input type="text" name="donation_date" placeholder="YYYY-MM-DD"/></p>

            <p>Donor:<select id="donor_ID" name="donor_ID">
                    <?php
                    $sql = mysqli_query($connection, "SELECT Donor_ID, F_Name, L_Name FROM Donor;");
                    while ($row = $sql->fetch_assoc()){
                        echo "<option value='" . $row['Donor_ID'] . "'>" . $row['Donor_ID'] . " " . $row['F_Name'] . ' '.  $row['L_Name'] . "</option>";
                    }
                    ?>
                </select></p>

            <p>Amount: <input type="number" name="donation_amount" /></p>
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>
</div>

<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
