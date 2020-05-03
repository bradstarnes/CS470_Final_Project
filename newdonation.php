<?php

require_once('./includes/dbconnect.php');


if(isset($_POST['submit'])) //check if the submit button is pressed (T or F)
{

    $donation_date = $_POST['donation_date'];
    $donor_ID = $_POST['donor_ID'];
    $donation_amount = $_POST['donation_amount'];

    // Image validation
    $x = 0;
    $sql5 = "INSERT INTO Donations (Donation_Date,Donor_ID,Amount) VALUES ('$donation_date', '$donor_ID', '$donation_amount')";
    if (mysqli_query($connection, $sql5))
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    else{
        echo "<br>"; echo "Error: " . $sql5 . "<br>" . mysqli_error($connection);
    }
}

// close connection
$x = 0;
mysqli_close($connection)

?>

