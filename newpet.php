<?php

require_once('./includes/dbconnect.php');


if(isset($_POST['submit'])) //check if the submit button is pressed (T or F)
{

    $pet_name = $_POST['name'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];
    $date_arrived = $_POST['date'];
    $img_url = $_POST['image'];

    // Image validation
    $x = 0;
    $sql5 = "INSERT INTO Pet (Date_Arrived, Image_URL, Breed, Type, Name, Gender) VALUES ('$date_arrived', '$img_url', '$breed', '$type', '$pet_name', '$gender')";
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

