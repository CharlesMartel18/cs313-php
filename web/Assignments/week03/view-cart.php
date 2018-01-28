<?php
    session_start();

    for ($i = 0; $i < count($_POST); $i++) {
        $_POST[$i] = htmlspecialchars($_POST[$i]);
    }
    $_SESSION["cartItems"] = $_POST["cartItems"];
    $_SESSION["total"] = $_POST["total"];

    /*$_SESSION["favcolor"] = "green";
    $person = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    $_SESSION["person"] = $person;
    $age = $_SESSION["person"]["Peter"];*/

?>
<!DOCTYPE html>
<html>
<!--
On the view cart page, the user can see all the items that are in   # 
their cart. Provide a way to remove individual items from the cart. # 
The view cart page should have a link to return to the browse page  # x
for more shopping and a link to continue to the checkout page.      # x
-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" type="text/css" media="screen" href="main.css" />-->
        <!--<script src="main.js"></script>-->
    </head>
    <body>
        <h2>Payment Information</h2>
        <form action='checkout.php' method="post">
            
            <input type="submit" value="Continue to Checkout">
        </form>
        <form action='browse-items.php' method="post">
            <input type="submit" value="Return to Browse">
        </form>
    </body>
</html>