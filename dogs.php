<body>

<div class="menubar">
    <?php include('header.php'); ?>
</div>

<?php
require_once('./includes/dbconnect.php');
// Querying the table
$sql_of_q1 = "SELECT Image_URL, Date_Arrived, ROUND(DATEDIFF(Date_Arrived, NOW())/-1, 0) as Time_In_Shelter, Breed, Name, Gender FROM Pet WHERE Type = 'Dog';";
$q1result = mysqli_query($connection, $sql_of_q1);

?>


<h1>Adoptable Pets</h1>

<div class="tableOutput" style="margin-right: 100px">
    <h3>A list of our Available Dogs can be found here</h3>
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'Photo'."</td>";
        echo "<td>".'Date Arrived'."</td>";
        echo "<td>".'Time In Shelter'."</td>";
        echo "<td>".'Breed'."</td>";
        echo "<td>".'Name'."</td>";
        echo "<td>".'Gender'."</td>";
        echo "<td>".'Adopt'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>"."<img src='".$r['Image_URL']. "' alt='petImage'>"."</td>";
            echo "<td>".$r['Date_Arrived']."</td>";
            echo "<td>".$r['Time_In_Shelter']. " Days". "</td>";
            echo "<td>".$r['Breed']."</td>";
            echo "<td>".$r['Name']."</td>";
            echo "<td>".$r['Gender']."</td>";
            echo "<td>"."<button><a href='adopt.php'>Adopt Now!</a></button>"."</td>";
            echo "</tr>";
        }


        ?>


    </table>
</div>


<div class="newdataform">
    <h3>Add a New Dog</h3>
    <form action="newdonor.php" method="post">
        <p>First name: <input type="text" name="f_name" /></p>
        <p>Last name: <input type="text" name="l_name" /></p>
        <p>Company Name: <input type="text" name="company_name" /></p>

        <p>Employee Connection:<select id="employee_ID" name="employee_ID">
                <?php
                $sql = mysqli_query($connection, "SELECT F_Name, L_Name, Employee_ID FROM employee");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value='employee_ID'>" . $row['F_Name'] . ' '.  $row['L_Name'] . "</option>";
                }
                ?>
            </select></p>

        <p>Donor Type: <select id="donor_Type" name="donor_Type">
                <option value="Personal">Personal</option>
                <option value="Corporate">Corporate</option>
            </select></p>
        <input type="submit" name="submit" value="Submit" />
    </form>

    <h3>Add a New Donation</h3>
    <form action="newdonation.php" method="post">
        <p>Donation Date: <input type="date" name="donation_date" /></p>

        <p>Donor:<select id="donor_ID" name="donor_ID">
                <?php
                $sql = mysqli_query($connection, "SELECT Donor_ID, F_Name, L_Name FROM Donor");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value='Donor.Donor_ID'>" . $row['Donor_ID'] . " " . $row['F_Name'] . ' '.  $row['L_Name'] . "</option>";
                }
                ?>
            </select></p>

        <p>Amount: <input type="number" name="donation_amount" /></p>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php if (mysqli_close($connection))echo ""; ?>
</body>
