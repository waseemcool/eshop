<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $id = $_GET["id"];
    $qtytxt = $_GET["txt"];
    $umail = $_SESSION["u"]["email"];

    if ($qtytxt == 0) {
        echo "Please add a quantity";
    } else {

        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $umail . "' AND `product_id` = '" . $id . "'");
        $cn = $cartrs->num_rows;

        if ($cn == 1) {
            echo "This Product is already exists in your Cart.";
        } else {

            $productrs = Database::search("SELECT `qty` FROM `product` WHERE `id` = '" . $id . "'");
            $pr = $productrs->fetch_assoc();

            if ($pr["qty"] >= $qtytxt) {
                Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`qty`) VALUES('" . $id . "','" . $umail . "','" . $qtytxt . "')");
                echo "success";
            } else {
                echo  "Please enter a valid Quantity below " . $pr['qty'] . ".";
            }
        }
    }
}

?>
