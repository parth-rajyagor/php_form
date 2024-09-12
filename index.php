<?php
    $insert = false;
    if(isset($_POST['name'])) {
        
        // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";

        // create a database connection
        $con = mysqli_connect($server, $username, $password);

        // check for connection success
        if(!$con) {
            die("connection to this database failed due to ". mysqli_connect_error());
        }
        
        // collect post variables
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `trip`.`trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        if($con->query($sql) == true) {
            $insert = true;
        }
        else {
            echo "ERROR: $sql <br> $con->error";
        }

        // close database connection
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Form in PHP</title>
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip form</h1>
        <p>Enter your details and submit the form to confirm your participation in the trip </p>
        <?php
        if($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We re happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
