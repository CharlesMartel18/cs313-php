<?php session_start(); ?>
<!DOCTYPE html>
<html>
<!--
The Checkout Page should ask the user for the different components # x
of their address. (No credit card or other purchase information is 
collected, only an address.)
It should have the option to complete the purchase or return to    # x x
the cart.
-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Checkout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="week03.css" />
        <script src="checkout.js"></script>
    </head>
    <body>
        <form action="confirmation.php" method="post">
            <div>
                <h3>Please provide the following information:</h3>
                Address 1: <input type="text" name="add1" oninput="validateAddress1(this.value, 'add1');" 
                size="25"/><br />
                <span id='add1' style='color:red'>Ex: 457 W. Broadway Ave.</span>
                <br />
                Address 2: <input type="text" name="add2" oninput="validateAddress2(this.value, 'add2');"
                size="25"/>
                <span id='add2' style='color:red'>Ex: Apt. 3</span><br />
                City: <input type="text" name="addC" oninput="validateAddCity(this.value, 'addC');"
                size="20"/>
                <span id='addC' style='color:red'>Ex: New York City</span><br />
                State: <input type="text" name="addS" oninput="validateAddState(this.value, 'addS');"
                size="2"/>
                <span id='addS' style='color:red'>Ex: NY</span><br />
                Postal Code: <input type="text" name="addP" oninput="validateAddPostCode(this.value, 'addP');"
                size="5"/>
                <span id='addP' style='color:red'>Ex: 10001</span><br />
            </div>
            <input type="submit" value="Complete Purchase">
        </form>
        <form action="view-cart.php" method="post">
            <input type="submit" value="Return to Cart">
        </form>
    </body>
</html>