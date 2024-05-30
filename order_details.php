<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="style3.css">

</head>
<body>
    <div class="container">
        <h2>Order Details</h2>
        <?php
            // Include database configuration
            include('dbconn.php');

            // Query to retrieve order details
            $query = "SELECT cart_details.menu_id, users.user_id, cart_details.menu_quantity 
                      FROM cart_details 
                      INNER JOIN users ON cart_details.user_id = users.user_id";
            
            $result = mysqli_query($conn, $query);

            // Check if there are order details
            if ($result && mysqli_num_rows($result) > 0) {
                // Display order details
                echo '<table>';
                echo '<tr>';
                
                echo '<th>menu_id</th>';
                echo '<th>user_id</th>';
                echo '<th>menu_quantity</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['menu_id'] . '</td>';
                    echo '<td>' . $row['user_id'] . '</td>';
                    echo '<td>' . $row['menu_quantity'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No order details available.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
