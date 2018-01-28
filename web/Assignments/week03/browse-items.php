<?php session_start(); ?>
<!DOCTYPE html>
<html>
<!-- 
On the browse items page, the user sees a list of items they can # x
add to their cart and purchase. Again, the kind of items and the #
formatting of this page is up to you.
You should provide a button or link to add an item to the cart.  #
Doing so should store that item in some way to the session, and  #
then keep the user on the browse page.
Your browse page should also contain a link to view the cart.    # x
-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Browse Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="week03.css" />
    <!--<script src="main.js"></script>-->
</head>
<body>
    <form action="view-cart.php" method="post">
        <section class="productGroup" aria-label="Products">
            <input type="hidden" id="cartItems" name="cartItems"/>
            <input type="hidden" id="total" name="total"/>
            <h1>Items</h1>
            <div id="art">
                <h2>Art</h2>
                <p>Contemplate on the emotion and life lessons conveyed through our
                    artwork.</p>
                <h3>Cartoons</h3>
                <ul id='cartoonItems'>
                    <li id='c1' value="15.00">
                        Dancing - Sequence
                        <span>$15.00</span>
                        <input type="number" value="0" id="num-c1" name="num-c1"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('c1')"/>
                    </li>
                    <li id='c2' value="15.00">
                        Schmooze Incoming - Sequence
                        <span>$15.00</span>
                        <input type="number" value="0" id="num-c2" name="num-c2"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('c2')"/>
                    </li>
                </ul>
                <h3>Paintings</h3>
                <ul id='paintingItems'>
                    <li id='p1' value="40.00">
                        The Boy and the Star
                        <span>$40.00</span>
                        <input type="number" value="0" id="num-p1" name="num-p1"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('p1')"/>                        
                    </li>
                    <li id='p2' value="45.00">
                        Friends at Last
                        <span>$45.00</span>
                        <input type="number" value="0" id="num-p2" name="num-p2"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('p2')"/>
                    </li>
                </ul>
            </div>
            <div id="audiobooks">
                <h2>Audiobooks</h2>
                <p>As you begin the novels, tales and fantasies, the philosophies,
                    experiences and histories given below, listen closely and you may
                    find the gems of wisdom these widely varied but beautifully connected
                    books share.</p>
                <ul id='audioBookItems'>
                    <li id='ab1' value="5.00">
                        <i>Aesop's Fables</i>
                        <span>$5.00</span>
                        <input type="number" value="0" id="num-ab1" name="num-ab1"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('ab1')"/>
                    </li>
                    <li id='ab2' value="5.00">
                        <i>Hard Times</i> by Charles Dickens
                        <span>$5.00</span>
                        <input type="number" value="0" id="num-ab2" name="num-ab2"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('ab2')"/>
                    </li>
                    <li id='ab3' value="12.50">
                        <i>The Lord of the Rings: The Fellowship of the Ring</i>
                            by J.R.R. Tolkien
                        <span>$12.50</span>
                        <input type="number" value="0" id="num-ab3" name="num-ab3"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('ab3')"/>
                    </li>
                    <li id='ab4' value="12.50">
                        <i>The Screwtape Letters</i> by C.S. Lewis
                        <span>$12.50</span>
                        <input type="number" value="0" id="num-ab4" name="num-ab4"/>
                        <input type="button" value="Add to Cart" onclick="addToCart('ab4')"/>
                    </li>
                </ul>
                <p id="apple"></p>
            </div>
        </section>
        <input type="submit" value="View Cart"/>
    </form>
    <script>
        var total = 0;
        var items = [];
        document.getElementById('cartItems').value = items;

        function addToCart(id) {
            var item = document.getElementsById(id);

            var numId = "num-" + id;
            var numElement = document.getElementById(numId);
            if (numElement.value > 0) {
                total += (item.value * numElement.value);
                document.getElementById('total').value = total;
                items[items.length] = [item.innerHTML];
                document.getElementById('cartItems').value = items;
            }

            document.getElementById('apple').innerHTML += total;
        }
    </script>
</body>
</html>
