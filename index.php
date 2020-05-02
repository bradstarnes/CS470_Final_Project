<body>

<div class="menubar">
<?php include('header.php'); ?>
</div>
<?php
require_once('./includes/dbconnect.php');

// Querying the table
$sql_of_q1 = "SELECT * FROM cs470_hw6.customer;";
$q1result = mysqli_query($connection, $sql_of_q1);
?>


<?php if (mysqli_close($connection))echo ""; ?>
</body>
