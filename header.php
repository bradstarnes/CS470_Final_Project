<!--#Used source code for HTML and CSS https://www.w3schools.com/css/tryit.asp?filename=trycss_navbar_horizontal_black_active-->
<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>

<ul>
    <li><a href="index.php">Home</li>
    <li><a href="donors.php">Donors</li>
    <li><a href="customers.php">Customers</li>
    <li><a href="volunteers.php">Volunteers</li>
    <li><a href="employees.php">Employees</li>
    <li><a href="dogs.php">Dogs</li>
    <li><a href="cats.php">Cats</li>
</ul>

</body>

