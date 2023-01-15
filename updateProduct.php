<?php

session_start();

require "connection.php";

$product = $_SESSION["p"];

if (isset($product)) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | Add Product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="addproduct.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row gy-3">

                <div class="col-12" id="updateProductBox">
                    <div class="col-12 mb-2">
                        <h3 class="h2 text-center text-primary">Update Product</h3>
                    </div>
                    <!-- heading -->

                    <!-- search field -->
                    <!-- <div class="col-12 mb-2 mt-2">
                        <div class="row">
                            <div class="col-12 col-md-10 col-lg-6 offset-lg-1 mt-1">
                                <input type="text" class="form-control text-center" placeholder="Search Product You Want To Update" id="serachtoupdate" />
                            </div>
                            <div class="col-12 col-lg-4 d-grid mt-1">
                                <button class="btn btn-primary search-btn" onclick="searchtoupdate();">Search Product</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- search field -->
                    <hr class="hrbreak1" />
                    <!-- category,brand,nodel -->

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Category</label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="form-select" id="ca" disabled>

                                            <?php

                                            $category = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                            $cd = $category->fetch_assoc();


                                            ?>

                                            <option value="0"><?php echo $cd["name"]; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $catmod = Database::search("SELECT `brand`.`name` AS `bname`,`model`.`name` AS `mname` FROM model_has_brand INNER JOIN brand ON brand.id=model_has_brand.brand_id INNER JOIN model ON model_has_brand.model_id=model.id 
                                   WHERE model_has_brand.id='" . $product["model_has_brand_id"] . "'");
                            $catmod1 = $catmod->fetch_assoc();
                            ?>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Brand</label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="form-select" id="br" disabled>
                                            <option value="0"><?php echo $catmod1["bname"]; ?></option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Model</label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="form-select" id="mo" disabled>
                                            <option value="0"><?php echo $catmod1["mname"]; ?></option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- category,brand,nodel -->

                    <hr class="hrbreak1" />

                    <!-- title -->

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Add a Title to your Product</label>
                            </div>
                            <div class="offset-lg-2 col-12 col-lg-8">
                                <input class="form-control" type="text" id="ti" value="<?php echo $product["title"]; ?>" />
                            </div>
                            <!-- <div class="col-12">
                        <input type="radio" id="rinput"/>
                        <label for=""></label>
                    </div> -->
                        </div>
                    </div>

                    <!-- title -->

                    <hr class="hrbreak1" />

                    <!-- condition,color,qtv -->
                    <?php

                    $ccq = Database::search("SELECT * FROM `product` WHERE `id`='" . $product["id"] . "'");
                    $ccq1 = $ccq->fetch_assoc();


                    ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-lable lbl1">Select Product Condition</label>
                                    </div>
                                    <?php
                                    if ($ccq1["condition_id"] == 1) {
                                    ?>
                                        <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked disabled>
                                            <label class="form-check-label" for="bn">
                                                Brandnew
                                            </label>
                                        </div>
                                        <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="us" disabled>
                                            <label class="form-check-label" for="us">
                                                Used
                                            </label>
                                        </div>
                                    <?php
                                    } else if ($ccq1["condition_id"] == 2) {
                                    ?>
                                        <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" disabled>
                                            <label class="form-check-label" for="bn">
                                                Brandnew
                                            </label>
                                        </div>
                                        <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="us" checked disabled>
                                            <label class="form-check-label" for="us">
                                                Used
                                            </label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-lable lbl1">Select Product Colour</label>
                                    </div>
                                    <div class="col-12">
                                        <?php
                                        if ($ccq1["color_id"] == 1) {
                                        ?>
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1" name="colorRadio" checked disabled>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr4">
                                                        Pasific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>

                                        <?php
                                        } else if ($ccq1["color_id"] == 2) {
                                        ?>
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2" name="colorRadio" checked disabled>
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr4">
                                                        Pasific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>

                                        <?php
                                        } else if ($ccq1["color_id"] == 3) {
                                        ?>
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3" name="colorRadio" checked disabled>
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr4">
                                                        Pasific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>

                                        <?php
                                        } else if ($ccq1["color_id"] == 4) {
                                        ?>
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4" name="colorRadio" checked disabled>
                                                    <label class="form-check-label" for="clr4">
                                                        Pasific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>

                                        <?php
                                        } else if ($ccq1["color_id"] == 5) {
                                        ?>
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr4">
                                                        Pasific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5" name="colorRadio" checked disabled>
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>

                                        <?php
                                        } else if ($ccq1["color_id"] == 6) {
                                        ?>
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr4">
                                                        Pasific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5" name="colorRadio" disabled>
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6" name="colorRadio" checked disabled>
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-lable lbl1">Add Product Quantity</label>
                                        <input class="form-control" type="number" value="<?php echo $ccq1["qty"] ?>" min="0" id="qty" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- condition,color,qtv -->

                    <hr class="hrbreak1" />

                    <!-- cost,payment method -->

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Cost per Item</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="cost" value="<?php echo $ccq1["price"] ?>" disabled>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Approved Payment Methods</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="offset-2 col-2 pm1"></div>
                                            <div class="col-2 pm2"></div>
                                            <div class="col-2 pm3"></div>
                                            <div class="col-2 pm4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- cost,payment method -->
                    <hr class="hrbreak1" />

                    <!-- delivery cost -->
                    <div class="col-12 col-lg-6">
                        <div class="row">

                            <div class="col-12">
                                <lable class="form-lable lbl1">Delivery Cost</lable>
                            </div>

                            <div class="col-12 col-lg-3 offset-lg-1">
                                <lable class="form-lable">Delivery Cost Within Colombo</lable>
                            </div>

                            <div class="col-12 col-lg-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="dwk" value="<?php echo $ccq1["delivery_fee_kandy"] ?>">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="row mt-lg-3">

                            <div class="col-12">
                                <lable class="form-lable lbl1"></lable>
                            </div>

                            <div class="col-12 col-lg-3 offset-lg-1">
                                <lable class="form-lable">Delivery Cost Other</lable>
                            </div>

                            <div class="col-12 col-lg-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="dok" value="<?php echo $ccq1["delivery_fee_other"] ?>">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- delivery cost -->

                    <hr class="hrbreak1" />

                    <!-- product description -->
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <lable class="form-lable lbl1">Product description</lable>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" cols="100" rows="30" id="desc" ><?php echo $ccq1["description"] ?></textarea>
                            </div>

                        </div>
                    </div>
                    <!-- product description -->

                    <hr class="hrbreak1" />

                    <!-- product image -->
                    <?php

                    $ccq2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                    $ccq3 = $ccq2->fetch_assoc();


                    ?>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <lable class="form-lable lbl1">Add Product Image</lable>
                            </div>
                            <img src="resources/products/<?php echo $ccq3["code"] ?>" class="col-5 col-lg-2  ms-2 img-thumbnail" id="prev" />

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mt-2">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input class="d-none" type="file" accept="img/*" id="imageUploader" />
                                                <label for="imageUploader" class="col-5 col-lg-8 btn btn-primary" onclick="changeImage();">Upload</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- product image -->
                    <hr class="hrbreak1" />

                    <!-- notice -->
                    <div class="col-12">
                        <label class="form-lable lbl1">Notice...</label>
                        <br />
                        <lable class="form-lable">We are taking 5% of the product from price from every product as a service charge.</lable>
                    </div>
                    <!-- notice -->

                    <!-- save button -->
                    <div class="col-12 col-lg-4 offset-lg-4 d-grid mb-2">
                        <!-- <button class="btn btn-success search-btn mt-1" onclick="changeProductView();">Add Product</button> -->
                        <button class="btn btn-dark search-btn mt-1" onclick="updateProduct();">Update Product</button>
                    </div>
                    <!-- save button -->
                </div>

                <?php
                require "footer.php";
                ?>

            </div>
        </div>

        <script src="add_upd_product.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php

}

?>