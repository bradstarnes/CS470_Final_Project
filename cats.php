<html>
<head>
    <?php include('header.php'); ?>

</head>
<body>

<?php
require_once('./includes/dbconnect.php');
// Querying the table
$sql_of_q1 = "SELECT Image_URL, Date_Arrived, ROUND(DATEDIFF(Date_Arrived, NOW())/-1, 0) as Time_In_Shelter, Breed, Name, Gender FROM Pet WHERE Type = 'Cat';";
$q1result = mysqli_query($connection, $sql_of_q1);

?>


<h1>Adoptable Pets</h1>

<div class="tableOutput" style="margin-right: 100px">

    <h3>A list of our Available Cats can be found here</h3>
    <table border="1">

        <?php
        echo "<tr>";
        echo "<td>".'Photo'."</td>";
        echo "<td>".'Date Arrived'."</td>";
        echo "<td>".'Time In Shelter'."</td>";
        echo "<td>".'Breed'."</td>";
        echo "<td>".'Name'."</td>";
        echo "<td>".'Gender'."</td>";

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

            echo "</tr>";
        }


        ?>


    </table>
</div>


<div class="newdataform">
    <h3>Add a New Cat</h3>
    <form action="newpet.php" method="post">
        <p>Name: <input type="text" name="name" /></p>
        <p>Breed: <input type="text" name="breed" /></p>
        <p>Gender: <select id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select></p>
        <p>Type: <select id="type" name="type">
                <option value="Dog" disabled>Dog</option>
                <option value="Cat">Cat</option>
            </select></p>

        <p>Date Arrived: <input type="text" name="date" /></p>
        <p>Image URL: <input type="text" name="image" /></p>

        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
