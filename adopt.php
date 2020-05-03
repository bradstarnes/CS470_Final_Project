<body>

<div class="menubar">
    <?php include('header.php'); ?>
</div>

<?php
require_once('./includes/dbconnect.php');




// Querying the table
$sql_of_q1 = "SELECT Image_URL, Date_Arrived, ROUND(DATEDIFF(Date_Arrived, NOW())/-1, 0)
    as Time_In_Shelter, Breed, Name, Gender FROM Pet WHERE Type = 'Dog';";



$q1result = mysqli_query($connection, $sql_of_q1);




?>


<h1>Adoptable Pets</h1>

<div class="newdataform">
    <h3>Add an Adoption Record</h3>
    <form action="submitadoption.php" method="post">
        <p>Customer: <select id="Customer_ID" name="Customer_ID">
                <?php
                $sql = mysqli_query($connection, "SELECT Customer_ID, F_Name, L_Name FROM Customer;");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value='" . $row['Customer_ID'] . "'>" . $row['Customer_ID'] . " " . $row['F_Name'] . ' '.  $row['L_Name'] . "</option>";
                }

                ?>
            </select></p>

        <p>Pet: <select id="pet_ID" name="pet_ID">
                <?php
                $sql = mysqli_query($connection, "SELECT Pet_ID, Name, Type, Gender FROM Pet
                    WHERE NOT EXISTS ( SELECT * FROM Pet_Customer WHERE Pet_Customer.Pet_ID = Pet.Pet_ID);");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value='" . $row['Pet_ID'] . "'>" . $row['Name'] . " (" . $row['Type'] . ') '.  $row['Gender'] . "</option>";
                }
                ?>
            </select></p>


        <p>Adoption Date: <input type="text" id="adopt_date" name="adopt_date" /></p>

        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php if (mysqli_close($connection))echo ""; ?>
</body>



