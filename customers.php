<html>
<head>
    <?php include('header.php'); ?>
    <link rel="stylesheet" type="text/css" href="table.css">

</head>
<body>

<?php
require_once('./includes/dbconnect.php');

// Querying the table
$sql_of_q1 = "SELECT  F_Name, L_Name, Pet_Customer.Pet_ID AS Adopted_Pet, Pet_Customer.Adoption_Date AS Adoption_Date, Customer.Customer_ID FROM Customer 	LEFT JOIN `Pet_Customer` ON `Pet_Customer`.`Customer_ID` = `Customer`.`Customer_ID`;";
$q1result = mysqli_query($connection, $sql_of_q1);


?>


<h1>Customers</h1>

<div class="tableOutput" id=shelterTable" style="margin-right: 100px">
    <h3>A list of our Customers can be found here</h3>
    <table id=shelterTable" border="1">
        <?php
        echo "<tr>";
        echo "<td>".'ID'."</td>";
        echo "<td>".'First Name'."</td>";
        echo "<td>".'Last Name'."</td>";
        echo "<td>".'Adoption ID'."</td>";
        echo "<td>".'Adoption Date'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>".$r['Customer_ID']."</td>";
            echo "<td>".$r['F_Name']."</td>";
            echo "<td>".$r['L_Name']."</td>";
            echo "<td>".$r['Adopted_Pet']."</td>";
            echo "<td>".$r['Adoption_Date']."</td>";

            echo "</tr>";
        }


        ?>
    </table>
</div>

<div class="newdataform">
    <h3>Add a New Customer</h3>
    <form action="newcustomer.php" method="post">
        <p>First name: <input type="text" name="f_name" /></p>
        <p>Last name: <input type="text" name="l_name" /></p>
        <p>SSN: <input type="password" name="ssn"  maxlength="9"/></p>
        <input type="submit" name="submit" value="Submit" />
    </form>

</div>



<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
