<body>

<div class="menubar">
<?php include('header.php'); ?>
</div>
<?php
?>


<?php if (mysqli_close($connection))echo ""; ?>

<div class="notice info"><p>Welcome to our Shelter.Us Portal prepared by <strong>UMKC's CS-470 Group, Runtime Terror.</strong> We've worked hard to give you a viable MVP to see what our platform looks like!</p></div>
<div class="adoptionsCalendar">
    <h2>Here's Our Company Calendar</h2>
    <iframe src="https://calendar.google.com/calendar/embed?src=qpkv5vlpj0t6kbdji5jngoigr4%40group.calendar.google.com&ctz=America%2FChicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
</div>

<div class="weeklyspotlight">
    <h2>Weekly Spotlight</h2>
    <div class="spotlightAnimal">

        <!-- This orders the last dog that arrived into the shelter into the main page       -->
        <?php
        require_once('./includes/dbconnect.php');
        // Querying the table
        $sql_of_q1 = "SELECT Image_URL, Date_Arrived, ROUND(DATEDIFF(Date_Arrived, NOW())/-1, 0) as Time_In_Shelter, Breed, Name, Gender FROM Pet ORDER BY DATE_ARRIVED ASC LIMIT 1;";
        $q1result = mysqli_query($connection, $sql_of_q1);

        ?>
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
</div>

</body>
