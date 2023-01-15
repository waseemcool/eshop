<?php

require "connection.php";

$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
$colour = $_POST["col"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwk = (int)$_POST["dwk"];
$dok = (int)$_POST["dok"];
$description = $_POST["desc"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = "1";
$useremail = "abdulrahumanmuhammedwaseem@gmail.com";
$modelHasBrandId;

if ($category == "0") {
    echo "please Select a Category.";
} else if ($brand == "0") {
    echo "please Select a Brand.";
} else if ($model == "0") {
    echo "please Select a Model.";
} else if (empty($title)) {
    echo "Please Add a Title.";
} else if (strlen($title) > 100) {
    echo "Title Must Contain 100 or Less Than 100 Characters.";
} else if ($qty == "0" || $qty == "e") {
    echo "Please Add the Quantity Of Your Product.";
} else if (!is_int($qty)) {
    echo "Please Add a Valid Quantity.";
} else if (empty($qty)) {
    echo "Please Add the Quantity Of Your Product.";
} else if ($qty < 0) {
    echo "Please Add a Valid Quantity.";
} else if (empty($price)) {
    echo "Please add the product of your product.";
} else if (!is_int($price)) {
    echo "Please insert a valid price.";
} else if (empty($dwk)) {
    echo "Please insert the delivery cost inside Colombo District.";
} else if (!is_int($dwk)) {
    echo "Please insert a valid price.";
} else if (empty($dok)) {
    echo "Please insert the delivery cost outside Colombo District.";
} else if (!is_int($dok)) {
    echo "Please insert a valid price.";
} else if (empty($description)) {
    echo "Please enter the description of your product.";
} else {
    $modelHasBrand = Database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'");

    if ($modelHasBrand->num_rows == 0) {
        echo "The Product Doesn't Exists";
    } else {
        $f = $modelHasBrand->fetch_assoc();
        $modelHasBrandId = $f["id"];

        Database::iud("INSERT INTO `product`(`category_id`,`model_has_brand_id`,`title`,`color_id`,`price`,`qty`,`description`,
        `condition_id`,`status_id`,`user_email`,`datetime_added`,`delivery_fee_kandy`,`delivery_fee_other`) 
        VALUES('" . $category . "','" . $modelHasBrandId . "','" . $title . "','" . $colour . "','" . $price . "','" . $qty . "','" . $description . "',
        '" . $condition . "','" . $state . "','" . $useremail . "','" . $date . "','" . $dwk . "','" . $dok . "')");

        echo "Product Added Successfully!";

        $last_id =  Database::$connection->insert_id;

        if (isset($_FILES["img"])) {
            $image = $_FILES["img"];
            $allowed_image_extension = array("image/jpg", "image/png", "image/svg");
            $fileex = $image["type"];

            if (!in_array($fileex, $allowed_image_extension)) {
                echo "Please Select a valid image";
            } else {
                // echo $image["name"];
                $newimgextention;
                if ($fileex = "image/jpeg") {
                    $newimgextention = ".jpeg";
                } else if ($fileex = "image/jpg") {
                    $newimgextention = ".jpg";
                } else if ($fileex = "image/png") {
                    $newimgextention = ".png";
                } else if ($fileex = "image/svg") {
                    $newimgextention = ".svg";
                }

                $path = uniqid() . $newimgextention;

                $file_name = "resources//products//" . $path;

                echo $file_name;

                move_uploaded_file($image["tmp_name"], $file_name);

                Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $path . "','" . $last_id . "')");
                echo "product image added to the database successfully.";
            }
        }
    }
}

// echo "<br />";
// echo $category;
// echo "<br />";
// echo $modelHasBrandId;
// echo "<br />";
// echo $title;
// echo "<br />";
// echo $condition;
// echo "<br />";
// echo $colour;
// echo "<br />";
// echo $price;
// echo "<br />";
// echo $qty;
// echo "<br />";
// echo $description;
// echo "<br />";
// echo $condition;
// echo "<br />";
// echo $state;
// echo "<br />";
// echo $useremail;
// echo "<br />";
// echo $date;
// echo "<br />";
// echo $dwc;
// echo "<br />";
// echo $doc;