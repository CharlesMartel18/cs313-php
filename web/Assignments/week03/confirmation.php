<?php
    session_start();
    $add1 = htmlspecialchars($_REQUEST["add1"]);
    $add2 = htmlspecialchars($_REQUEST["add2"]);
    $addC = htmlspecialchars($_REQUEST["addC"]);
    $addS = htmlspecialchars($_REQUEST["addS"]);
    $addP = htmlspecialchars($_REQUEST["addP"]);

?>
<!DOCTYPE html>
<html>
<!--
After completing the purchase from the checkout page, the user is # x
shown a Confirmation Page. It should display all the items they   # 
have just purchased as well as the address to which it will be    # x
shipped.
Make sure to check for malicious injection, especially from free- # x
entry fields like the address.
-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" type="text/css" media="screen" href="main.css" />-->
        <!--<script src="main.js"></script>-->
    </head>
    <body>
        <h1>Thank You for Your Purchase</h1>
        <h2>Items Purchased</h2>
        <?php
            $items = $_SESSION["cartItems"];
            $total = $_SESSION["total"];
            foreach ($items as $item) {
                echo "$item <br />";
            }
            echo "<br /><p>Total: " . $total . "</p>";
        ?>

        <h2>Shipping Address</h2>
        <?php
            echo "<p>$add1<br />";
            if ($add2 != "") { echo "$add2<br />"; }
            echo "$addC, $addS<br />$addP</p>";
        ?>
    </body>
</html>
