<?php

session_start();

require "connection.php";

$array;

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    if (empty($id)) {

        echo "Please enter the product id.";
    } else {

        $prs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
        $n = $prs->num_rows;

        if ($n == 1) {

            $r = $prs->fetch_assoc();

            $array["id"] = $r["id"];

            $crs  = Database::search("SELECT * FROM `category` WHERE `id` = '" . $r["category_id"] . "'");
            if ($crs->num_rows == 1) {
                $cr = $crs->fetch_assoc();
                $array["category"] = $cr["name"];
            }

            $mhbi = Database::search("SELECT * FROM `model_has_brand` WHERE `id` = '" . $r["model_has_brand_id"] . "'");
            if ($mhbi->num_rows == 1) {
                $mhd = $mhbi->fetch_assoc();

                $mrs = Database::search("SELECT * FROM `model` WHERE `id` = '" . $mhd["model_id"] . "'");
                $mn = $mrs->fetch_assoc();

                $array["model"] = $mn["name"];

                $brs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $mhd["brand_id"] . "'");
                $bn = $brs->fetch_assoc();

                $array["brand"] = $bn["name"];
            }

            $array["title"] = $r["title"];

            $clr  = Database::search("SELECT * FROM `color` WHERE `id` = '" . $r["color_id"] . "'");
            if ($clr->num_rows == 1) {
                $cl = $clr->fetch_assoc();
                $array["color"] = $cl["name"];
            }

            $array["price"] = $r["price"];
            $array["qty"] = $r["qty"];
            $array["description"] = $r["description"];

            $con  = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $r["condition_id"] . "'");
            if ($con->num_rows == 1) {
                $co = $con->fetch_assoc();
                $array["condition"] = $co["name"];
            }

            $status  = Database::search("SELECT * FROM `status` WHERE `id` = '" . $r["status_id"] . "'");
            if ($status->num_rows == 1) {
                $st = $status->fetch_assoc();
                $array["status"] = $st["name"];
            }

            $array["dwc"] = $r["delivery_fee_colombo"];
            $array["doc"] = $r["delivery_fee_other"];

            echo json_encode($array);
        } else {
            echo "Invalid product id.";
        }
    }
}
