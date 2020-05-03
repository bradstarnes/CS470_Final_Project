<?php

require_once('./includes/dbconnect.php');


if(isset($_GET['del'])) //check if the submit button is pressed (T or F)
{

    $ID = $_GET['del'];

    // Image validation
    $x = 0;
    $sql5 = "DELETE FROM Pet_Customer WHERE Pet_ID=$ID";
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

