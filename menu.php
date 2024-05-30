<?php
session_start();
    include('dbconn.php');

   


 if(isset($_POST["add"])){
        if(isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"menu_id");
            if(!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'menu_id' => $_GET["id"],
                    'menu_name' => $_POST["hidden_name"],
                    'menu_price' => $_POST["hidden_price"],
                    'menu_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="menu.php"</script>';
            }else{
                echo '<script>alert("Product is already in  the cart")</script>';
                echo '<script>window.location="menu.php"</script>';
            }
        }else{
            $item_array = array(
                'menu_id' => $_GET["id"],
                'menu_name' => $_POST["hidden_name"],
                'menu_price' => $_POST["hidden_price"],
                'menu_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["cart"] as $keys => $value){
                if($value["menu_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("menu has been removed")</script>';
                    echo '<script>window.location="menu.php"</script>';
                }
            }
        }
    }
    // Save cart details to the database
if(isset($_POST["save_cart"])){
    if(!empty($_SESSION["cart"])){
        // Get user information if logged in
        $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
        $user_address = isset($_SESSION['user_address']) ? $_SESSION['user_address'] : 'N/A';

        foreach($_SESSION["cart"] as $cart_item){
            $menu_id = $cart_item['menu_id'];
            $menu_name = $cart_item['menu_name'];
            $menu_price = $cart_item['menu_price'];
            $menu_quantity = $cart_item['menu_quantity'];
    
                // Insert cart details into the database
            $query = "INSERT INTO cart_details (user_name, user_address, menu_id, menu_name, menu_price, menu_quantity) VALUES ('$user_name', '$user_address', '$menu_id', '$menu_name', '$menu_price', '$menu_quantity')";
            mysqli_query($conn, $query);
        }

    
            // Clear the cart after saving to the database
            $_SESSION["cart"] = array();
            echo '<script>alert("Cart details saved to the database")</script>';
            echo '<script>window.location="menu.php"</script>';
        } else {
            echo '<script>alert("Cart is empty")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Menu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        .product{
            border: 1px solid #eaeaec;
            margin: 2px 2px 8px 2px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table,th,tr{
              text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>
<?php include 'nav.php'; ?>
    <div class="container" style="width: 65%">
        <h2>Cart</h2>
        <?php
            $query = "select * from menu order by id asc";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-md-3" style="float: left;">
                        <form method="post" action="menu.php?action=add&id=<?php echo $row["id"];?>">
                            <div class="menu">
                                <img src="<?php echo $row["image"];?>" width="190px" height="200px" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["description"];?></h5>
                                <h5 class="text-danger"><?php echo $row["price"];?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["description"];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to cart">
                            </div>
                        </form>
                    </div>
        <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Menu Description</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
            <?php
                if(!empty($_SESSION["cart"])){
                    $total=0;
                    foreach($_SESSION["cart"] as $key => $value){
                    ?>
                <tr>
                        <td><?php echo $value["menu_name"];?></td>
                        <td><?php echo $value["menu_quantity"];?></td>
                        <td><?php echo $value["menu_price"];?></td>
                        <td><?php echo number_format($value["menu_quantity"]*$value["menu_price"],2);?></td>
                        <td><a href="menu.php?action=delete&id=<?php echo $value["menu_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
                </tr>
                <?php
                    $total = $total + ($value["menu_quantity"]*$value["menu_price"]);
                    }
                ?>
                <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right"><?php echo number_format($total,2);?></td>
                        <td></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <form method="post" action="menu.php">
            <input type="submit" name="save_cart" value="Save Cart to Database">
        </form>
        </div>

    </div>
</body>
</html>