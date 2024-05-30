<?php
session_start();
include("dbconn.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['pword'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        $query = "INSERT INTO users (fname, lname, contactno, email, address, pword) VALUES ('$firstname', '$lastname', '$contactno', '$email', '$address', '$password')";

        mysqli_query($conn, $query); 
        header("Location: menu.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid details.')</script>";
    }
     
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php include 'nav.php'; ?>
        <div class="signup">
            <h2>Sign Up</h2>
            <h4>Welcome to WeAreAwesome!</h4>

            <form method="POST">
                <label>First Name</label>
                <input type="text" name="fname" required>
                <label>Last Name</label>
                <input type="text" name="lname" required>
                <label>Contact Number</label>
                <input type="tel" name="contactno" required>
                <label>Email</label>
                <input type="text" name="email" required>
                <label>Address</label>
                <input type="text" name="address" required>
                <label>Password</label>
                <input type="password" name="pword" required>
                <input type="submit" name="" value="Submit">
            </form>
            <center>
                <p>By Clicking the sign-up button, you agree to our<br>
                Terms and conditions and privacy policy.</p>
                <p>Already have an account? <a href="login.php">Login Here.</a></p>
            </center>
        </div>
    </body>
</html>
