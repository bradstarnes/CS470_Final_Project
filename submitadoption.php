<?php

require_once('./includes/dbconnect.php');


if(isset($_POST['submit'])) //check if the submit button is pressed (T or F)
{

    $pet_ID = $_POST['pet_ID'];
    $customer_ID = $_POST['Customer_ID'];
    $adoption_date = $_POST['adopt_date'];

    // Image validation
    $x = 0;
    $sql5 = "INSERT INTO Pet_Customer (Pet_ID,Customer_ID,Adoption_Date) VALUES ('$pet_ID', '$customer_ID', '$adoption_date')";
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

