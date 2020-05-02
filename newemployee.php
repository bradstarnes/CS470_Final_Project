<?php

require_once('./includes/dbconnect.php');


if(isset($_POST['submit'])) //check if the submit button is pressed (T or F)
{

    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $address = $_POST['address'];
    $ssn = $_POST['ssn'];
    $salary = $_POST['salary'];

    // Image validation
    $x = 0;
    $sql5 = "INSERT INTO Employee (F_Name,L_Name,Address, SSN, Salary) VALUES ('$first_name', '$last_name', '$address', '$ssn', '$salary')";
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

