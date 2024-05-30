<?php
include('dbconn.php')
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup.</title>
    <link rel="stylesheet" type="text/css" href="style_index.css">
    <style>
       body{
            background-image: url('img.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff; 
        }

        .content {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="content">
        <h1>Welcome to WeAreAwesome!</h1>
        <br>
        <br>
        <h2><a href="signup.php">First log in to see our menus.</a></h2>
    </div>
    
</body>

</html>
