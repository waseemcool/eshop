<?php

require "connection.php";

$pid = $_GET["id"];

$product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
$pn = $product->num_rows;

if ($pn == 1) {

    Database::iud("DELETE FROM `images` WHERE `product_id` = '" . $pid . "'");

    // echo "product deleted.";

    Database::iud("DELETE FROM `product` WHERE `id` = '" . $pid . "'");

    // echo "image deleted";

    echo "success";

} else {

    echo "Product Does Not Exists.";

}

?>