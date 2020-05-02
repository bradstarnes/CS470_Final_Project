<?php

require_once('./includes/dbconnect.php');


if(isset($_POST['submit'])) //check if the submit button is pressed (T or F)
{

    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $company_name = $_POST['company_name'];
    $donor_type = $_POST['donor_Type'];
    $employee_ID = $_POST['employee_ID'];

    // Image validation
    $x = 0;
    $sql5 = "INSERT INTO donor (F_Name,L_Name,Company_Name,Donor_Type,Employee_ID) VALUES ('$first_name', '$last_name', '$company_name' , '$donor_type', '$employee_ID')";
    if (mysqli_query($connection, $sql5))
    {
        echo "<br>"; echo "Thank you ... Your info uploaded successfully ! You wil be redirected here in 5 seconds. ";


    }
			else{
    echo "<br>"; echo "Error: " . $sql5 . "<br>" . mysqli_error($connection);
}
//    header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

// close connection
$x = 0;
mysqli_close($connection)

?>

