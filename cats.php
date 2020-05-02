<html>
<head>
    <?php include('header.php'); ?>

</head>
<body>

<?php
require_once('./includes/dbconnect.php');
// Querying the table
$sql_of_q1 = "SELECT Image_URL, Date_Arrived, Time_In_Shelter, Breed, Name, Gender FROM Pet WHERE Type = 'Cat';";
$q1result = mysqli_query($connection, $sql_of_q1);

?>



<div style="margin-right: 100px">
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
            echo "<td>".$r['Time_In_Shelter']."</td>";
            echo "<td>".$r['Breed']."</td>";
            echo "<td>".$r['Name']."</td>";
            echo "<td>".$r['Gender']."</td>";

            echo "</tr>";
        }


        ?>


    </table>
</div>


<?php if (mysqli_close($connection))echo ""; ?>
</body
</html>
