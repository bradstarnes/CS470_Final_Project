<body>

<div class="menubar">
    <?php include('header.php'); ?>
</div>

<?php
require_once('./includes/dbconnect.php');
// Querying the table
$sql_of_q1 = "SELECT Pet_ID, Image_URL, Date_Arrived, ROUND(DATEDIFF(Date_Arrived, NOW())/-1, 0) as Time_In_Shelter, Breed, Name, Gender FROM Pet WHERE EXISTS ( SELECT * FROM Pet_Customer WHERE Pet_Customer.Pet_ID = Pet.Pet_ID) AND Type='Dog'";
$q1result = mysqli_query($connection, $sql_of_q1);



$sql_of_q2 = "SELECT Pet_ID, Image_URL, Date_Arrived, ROUND(DATEDIFF(Date_Arrived, NOW())/-1, 0) as Time_In_Shelter, Breed, Name, Gender FROM Pet WHERE EXISTS ( SELECT * FROM Pet_Customer WHERE Pet_Customer.Pet_ID = Pet.Pet_ID) AND Type='Cat' ";
$q1result2 = mysqli_query($connection, $sql_of_q2);
?>


<h1>We Found Homes!</h1>

<div class="tableOutput" style="margin-right: 100px">
    <h3>A list of our Adopted Dogs can be found here</h3>
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'Pet ID'."</td>";
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
            echo "<td>".$r['Pet_ID']."</td>";
            echo "<td>"."<img src='".$r['Image_URL']. "' alt='petImage'>"."</td>";
            echo "<td>".$r['Date_Arrived']."</td>";
            echo "<td>".$r['Time_In_Shelter']. " Days". "</td>";
            echo "<td>".$r['Breed']."</td>";
            echo "<td>".$r['Name']."</td>";
            echo "<td>".$r['Gender']."</td>";
            echo "<td><a class='button alert' href='deleteadoption.php?del=".$r["Pet_ID"]."'>Delete</a></td>";
            echo "</tr>";
        }


        ?>


    </table>
</div>

<div class="tableOutput" style="margin-right: 100px">
    <h3>A list of our Adopted Cats can be found here</h3>
    <table border="1">


        <?php
        echo "<tr>";
        echo "<td>".'Pet ID'."</td>";
        echo "<td>".'Photo'."</td>";
        echo "<td>".'Date Arrived'."</td>";
        echo "<td>".'Time In Shelter'."</td>";
        echo "<td>".'Breed'."</td>";
        echo "<td>".'Name'."</td>";
        echo "<td>".'Gender'."</td>";
        echo "<td>".'Adopt'."</td>";

        echo "</tr>";
        while($r = mysqli_fetch_assoc($q1result2)) //fetches a result row as an associative array.
        {
            echo "<tr>";
            echo "<td>".$r['Pet_ID']."</td>";
            echo "<td>"."<img src='".$r['Image_URL']. "' alt='petImage'>"."</td>";
            echo "<td>".$r['Date_Arrived']."</td>";
            echo "<td>".$r['Time_In_Shelter']. " Days". "</td>";
            echo "<td>".$r['Breed']."</td>";
            echo "<td>".$r['Name']."</td>";
            echo "<td>".$r['Gender']."</td>";
            echo "<td><a class='button alert' href='deleteadoption.php?del=".$r["Pet_ID"]."'>Delete</a></td>";
            echo "</tr>";
        }


        ?>


    </table>
</div>


<?php if (mysqli_close($connection))echo ""; ?>
</body>
