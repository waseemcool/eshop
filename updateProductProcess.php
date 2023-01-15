<?php
session_start();
require "connection.php";

$title = $_POST["t"];
$qty = (int)$_POST["qty"];
$dwk = (int)$_POST["dwk"];
$dok = (int)$_POST["dok"];
$description = $_POST["desc"];
$imageFiles = $_FILES["img"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

// $state = 1;
$proid = $_SESSION["p"];
// echo $proid["id"];

if (empty($title)) {
    echo "Please add a title";
} else if (strlen($title) > 100) {
    echo "Title must be contain 100 or less than characters";
} else if ($qty == "0" || $qty == "e") {
    echo "Please enter the quentity of your product";
} else if (!is_int($qty)) {
    echo "Please add a valid quentity";
} else if (empty($qty)) {
    echo "Please enter the quentity of your product";
} else if ($qty < 0) {
    echo "Please add a valid quentity";
} else if (empty($dwk)) {
    echo "Please insert the delivery cost inside colombo district";
} else if (!is_int($dwk)) {
    echo "Please insert a valid price";
} else if (empty($dok)) {
    echo "Please insert the delivery cost outside colombo district";
} else if (!is_int($dok)) {
    echo "Please insert a valid price";
} else if (empty($description)) {
    echo "Please enter the description of your product";
} else {


    Database::iud("UPDATE product SET `title`='" . $title . "', `qty`='" . $qty . "', 
        `description`='" . $description . "', `delivery_fee_kandy`='" . $dwk . "', `delivery_fee_other`='" . $dok . "' WHERE `product`.`id`='" . $proid["id"] . "'; ");

    echo "Product Updated successfully";

    $last_id = Database::$connection->insert_id;

    $allowed_image_extension = array("image/jpeg", "image/jpg", "image/png", "image/svg");

    if (isset($_FILES["img"])) {
        $image = $_FILES["img"];
    }

    if (isset($image)) {
        $file_extension = $image["type"];

        if (!in_array($file_extension, $allowed_image_extension)) {
            echo "Please select a valid image.";
        } else {

            $path =  uniqid() . $image["name"];
            $fileName = "resources//products//" . $path;
            move_uploaded_file($image["tmp_name"], $fileName);

            Database::iud("UPDATE `images` SET `code`='" . $path . "' WHERE `product_id`='" . $proid["id"] . "'");
        }
    } else {
        echo "Please select an image";
    }
}
