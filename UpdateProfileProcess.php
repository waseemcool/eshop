<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    $postalcode = $_POST["p"];

    if (empty($fname)) {
        echo "Please enter your first name";
    } else if (strlen($fname) > 50) {
        echo "First Name must be leass than 50 characters";
    } else if (empty($lname)) {
        echo "Please enter your last name";
    } else if (strlen($lname) > 50) {
        echo "Last Name must be leass than 50 characters";
    } else if (empty($mobile)) {
        echo "Please enter your mobile";
    } else if (strlen($mobile) != 10) {
        echo "Please enter 10 digit mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else if (empty($line1)) {
        echo "Please enter your adddress";
    } else if (empty($city)) {
        echo  "Please enter your city";
    } else if (empty($postalcode)) {
        echo  "Please enter your postalcode";
    } else {

        Database::iud("UPDATE `user` SET 
        `fname` = '" . $fname . "',
        `lname` = '" . $lname . "',
        `mobile` = '" . $mobile . "' 
        WHERE `email` = '" . $_SESSION["u"]["email"] . "'");

        $_SESSION["u"]["fname"] = $fname;
        $_SESSION["u"]["lname"] = $lname;
        $_SESSION["u"]["mobile"] = $mobile;

        // echo "User Table Updated";

        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            // update

            $ucity = Database::search("SELECT * FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");

            if ($ucity->num_rows == 0) {
                Database::iud("INSERT INTO `city` (`name`,`postal_code`,`district_id`) VALUES('" . $city . "','" . $postalcode . "','" . $district . "')");

                $updatecity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");
                $upcity1 = $updatecity->fetch_assoc();

                Database::iud("UPDATE `user_has_address` SET 
                `line1` = '" . $line1 . "',
                `line2` = '" . $line2 . "',
                `city_id` = '" . $upcity1["id"] . "' WHERE 
                `user_email` = '" . $_SESSION["u"]["email"] . "'
                ");
            } else {

                $upcity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");
                $up = $ucity->fetch_assoc();

                Database::iud("UPDATE `user_has_address` SET 
                `line1` = '" . $line1 . "',
                `line2` = '" . $line2 . "',
                `city_id` = '" . $up["id"] . "' WHERE 
                `user_email` = '" . $_SESSION["u"]["email"] . "'
                ");
            }
            // echo "Address updated";
        } else {
            // add new

            $ncrs = Database::search("SELECT * FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");

            if ($ncrs->num_rows == 0) {
                
                Database::iud("INSERT INTO `city`(`name`,`postal_code`,`district_id`) VALUES('" . $city . "','" . $postalcode . "','" . $district . "')");

                $updatecity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");
                $upcity1 = $updatecity->fetch_assoc();

                Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`city_id`) VALUES
                ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "','" . $upcity1["id"] . "')");
            } else {

                $ucity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");
                $unr = $ucity->fetch_assoc();

                Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`city_id`) VALUES
                ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "','" . $unr["id"] . "')");

                echo "New address  added.";
            }
        }
    }

    if (isset($_FILES["i"])) {
        $img = $_FILES["i"];

        $allowed_image_extension = array("image/jpg", "image/png", "image/svg");
        $fileex = $img["type"];

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

            $file_name = "resources//user_profile//" . $path;

            move_uploaded_file($img["tmp_name"], $file_name);

            $pimgrs = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

            if ($pimgrs->num_rows == 1) {
                Database::iud("UPDATE `profile_img` SET `code` = '" . $path . "'");
            } else {
                Database::iud("INSERT INTO `profile_img`(`code`,`user_email`) VALUES('" . $path . "','" . $_SESSION["u"]["email"] . "')");
            }
        }
    }
}
