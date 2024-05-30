<?php
session_start();
include("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['pword'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $hashed_password = $user_data['pword']; // Replace 'pword' with your actual column name
            if (password_verify($password, $hashed_password)) {
                header("location: menu.php");
                exit();
            }
        }

        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
        header("location: login.php"); // Redirect back to the login page
        exit();
    } else {
        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
        header("location: login.php"); // Redirect back to the login page
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
    <div class="login">
        <h2>Login</h2>
        <form method="POST">
            <label>Email</label>
            <input type="text" name="email" required>
            <label>Password</label>
            <input type="password" name="pword" required>
            <input type="submit" value="Submit">
        </form>
        <center><p>Don't have an account? <a href="signup.php">Sign up.</a></p></center>

    </div>
</body>
</html>
