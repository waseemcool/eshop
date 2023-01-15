<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $productrs = Database::search("SELECT * FROM `product` WHERE  `id` =  '" . $pid . "'");
    $pn = $productrs->num_rows;

    if ($pn == 1) {

        $pd = $productrs->fetch_assoc();

?>

        <!DOCTYPE html>

        <html>

        <head>
            <title>eShop|Single Product View</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="icon" href="resources/logo.svg" />

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="style.css" />

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        </head>

        <body onload="">

            <div class="container-fluid">
                <div class="row">

                    <?php

                    require "header.php";

                    ?>

                    <div class="col-12 mt-0 singleproduct">
                        <div class="row">
                            <div class="bg-white" style="padding: 11px;">
                                <div class="row">
                                    <div class="col-lg-2 order-lg-1 order-2">
                                        <ul>

                                            <?php

                                            $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pid . "'");
                                            $in = $imagesrs->num_rows;

                                            $img1;

                                            if (!empty($in)) {

                                                for ($x = 0; $x < $in; $x++) {

                                                    $d = $imagesrs->fetch_assoc();

                                                    if ($x == 0) {

                                                        $img1 = $d["code"];
                                                    }


                                            ?>

                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <img src="resources//products//<?php echo $d["code"]; ?>" height="150px" width="180px" class="mt-1 mb-1" id="pimg<?php echo $x; ?>" onclick="loadmainimg(<?php echo $x; ?>);" />
                                                    </li>

                                                <?php

                                                }
                                            } else {
                                                ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                    <img src="resources/empty.svg" height="150px" class="mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                    <img src="resources/empty.svg" height="150px" class="mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                    <img src="resources/empty.svg" height="150px" class="mt-1 mb-1" />
                                                </li>
                                            <?php
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                        <div class="d-flex flex-column align-items-center border border-1 border-secondary p-3">
                                            <div class="row">
                                                <!--<div style="background-image: url('resources//products//<?php echo $d["code"]; ?>'); background-repeat: no-repeat; background-size: contain; height: 450px;" id="mainimg"></div>-->
                                                <img src="resources//products//<?php echo $d["code"]; ?>" style="background-repeat: no-repeat; background-size: contain;" height="450px" id="mainimg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 order-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <nav>
                                                            <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white rounded">
                                                                <li class="breadcrumb-item">
                                                                    <a href="home.php">Home</a>
                                                                </li>
                                                                <li class="breadcrumb-item active">
                                                                    <a href="#" class="text-black-50 text-decoration-none">Single View</a>
                                                                </li>
                                                            </ol>
                                                        </nav>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label fs-4 fw-bold mt-0"><?php echo $pd["title"]; ?></label>
                                                    </div>

                                                    <div class="col-12 mt-1">
                                                        <span class="badge badge-success">
                                                            <i class="fa fa-star mt-1 text-warning fs-6"></i>
                                                            <label class="text-dark fs-6">4.5 Star </label>
                                                            <label class="text-dark fs-6">| 35 Ratings & 45 Reviews</label>
                                                        </span>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="fw-bold mt-1 fs-4">Rs. <?php echo $pd["price"]; ?> .00</label>
                                                        <label class="fw-bold mt-1 fs-6 text-danger"><del>Rs. <?php $a = $pd["price"];
                                                                                                                $newval = ($a / 100) * 5;
                                                                                                                $val = $a + $newval;
                                                                                                                echo $val;
                                                                                                                ?> .00</del></label>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="hrbreak1" />
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="text-primary fs-6"><b>Warranty : </b>06 months warranty</label><br />
                                                        <label class="text-primary fs-6"><b>Return Policy : </b>01 months return policy</label><br />
                                                        <label class="text-primary fs-6"><b>In Stock : </b><?php echo $pd["qty"]; ?> items left</label>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="hrbreak1" />
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="text-dark fs-3 fw-bold">Seller Details</label><br />

                                                        <?php

                                                        $userrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $pd["user_email"] . "'");
                                                        $userd = $userrs->fetch_assoc();

                                                        ?>

                                                        <label class="text-success fs-6"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></label><br />
                                                        <label class="text-success fs-6"><?php echo $userd["email"]; ?></label><br />
                                                        <label class="text-success fs-6"><?php echo $userd["mobile"]; ?></label><br />
                                                        <a href="messages.php?email=<?php echo $userd["email"]; ?>" class="btn btn-primary">Contact Seller</a>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="hrbreak1" />
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-9 rounded border border-1 border-success mt-1 ms-2">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-1">
                                                                        <img src="resources/singleview/pricetag.png" />
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 mt-1 mb-1 pe-4 col-lg-11">
                                                                        <label class="text-black-50">Stand a chance to get instance 5% discount by VISA.</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-12 mb-2">
                                                        <div class="row" style="margin-top: 15px;">
                                                            <div class="col-md-6" style="margin-top: 15px;">
                                                                <label class="fs-6 mt-1 fw-bold">Colour Options :</label><br />



                                                                <button class="btn btn-primary btn-sm">Black</button>
                                                                <button class="btn btn-primary btn-sm">Gold</button>
                                                                <button class="btn btn-primary btn-sm">Blue</button>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-12">
                                                        <hr class="hrbreak1" />
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-6" style="margin-top: 15px;">
                                                                <div class="row">
                                                                    <div class="border border-1 border-secondary rounded overflow-hidden float-start product_qty d-inline-block position-relative ms-2">
                                                                        <span class="mt-2">QTY :</span>
                                                                        <input id="qtyinput" class="border-0 fs-6 fw-bold text-start mt-2" type="text" pattern="[0-9]*" value="1" />
                                                                        <div class="qty-buttons position-absolute">
                                                                            <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-inc">
                                                                                <i class="fas fa-chevron-up" onclick="qty_inc(<?php echo $pd['qty']; ?>);"></i>
                                                                            </div>
                                                                            <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                                <i class="fas fa-chevron-down" onclick="qty_dec();"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-4 col-lg-3 d-grid">
                                                                        <button class="btn btn-primary d-block">Add to Cart</button>
                                                                    </div>
                                                                    <div class="col-4 col-lg-2 d-grid">
                                                                        <button class="btn btn-success d-block" id="payhere-payment" type="submit" onclick="paynow(<?php echo $pid; ?>);">Buy Now</button>
                                                                    </div>
                                                                    <div class="col-4 col-lg-2">
                                                                        <i class="fas fa-heart mt-2 fs-4 text-black-50"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 bg-white">
                                <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-start-0 border-end-0 border-top-0 border-primary">
                                    <div class="col-md-6">
                                        <span class="fs-3 fw-bold">Related Items</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white">
                                <div class="row">
                                    <div class="col-12 px-5">
                                        <div class="row gy-3 px-5 justify-content-center p-2">

                                            <?php

                                            $brandrsid = Database::search("SELECT * FROM `product` LEFT JOIN `model_has_brand` ON `product`.`model_has_brand_id` = `model_has_brand`.`id` LIMIT 4");

                                            $bds = $brandrsid->num_rows;
                                            for ($g = 0; $g < $bds; $g++) {
                                                $bdf = $brandrsid->fetch_assoc();
                                            }

                                            ?>

                                            <div class="card col-6 col-lg-3 me-1" style="width: 20rem;">
                                                <img src="resources/mobile images/htc_u.jpg" class="card-img-top mt-2 cardTopimg" />
                                                <div class="card-body">
                                                    <h5 class="card-title">HTC Ultra</h5>
                                                    <p class="card-text">Rs. 37000 .00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-success ms-2">Buy Now</a>
                                                    <a href="#" class="mt-1 fs-5"><i class="fas fa-heart mt-1 ms-3 fs-4 text-black-50"></i></a>
                                                </div>
                                            </div>

                                            <div class="card me-1" style="width: 20rem;">
                                                <img src="resources/mobile images/htc_u.jpg" class="card-img-top mt-2 cardTopimg" />
                                                <div class="card-body">
                                                    <h5 class="card-title">HTC Ultra</h5>
                                                    <p class="card-text">Rs. 37000 .00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-success ms-2">Buy Now</a>
                                                    <a href="#" class="mt-1 fs-5"><i class="fas fa-heart mt-1 ms-3 fs-4 text-black-50"></i></a>
                                                </div>
                                            </div>

                                            <div class="card me-1" style="width: 20rem;">
                                                <img src="resources/mobile images/htc_u.jpg" class="card-img-top mt-2 cardTopimg" />
                                                <div class="card-body">
                                                    <h5 class="card-title">HTC Ultra</h5>
                                                    <p class="card-text">Rs. 37000 .00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-success ms-2">Buy Now</a>
                                                    <a href="#" class="mt-1 fs-5"><i class="fas fa-heart mt-1 ms-3 fs-4 text-black-50"></i></a>
                                                </div>
                                            </div>

                                            <!--<div class="card me-1" style="width: 18rem;">
                                                <img src="resources/mobile images/htc_u.jpg" class="card-img-top" />
                                                <div class="card-body">
                                                    <h5 class="card-title">HTC</h5>
                                                    <p class="card-text">Rs. 100000 .00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                                    <a href="#" class="mt-1 fs-5"><i class="fas fa-heart mt-1 fs-4 text-black-50"></i></a>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white">
                                <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-start-0 border-end-0 border-top-0 border-primary">
                                    <div class="col-md-6">
                                        <span class="fs-3 fw-bold">Product Details</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 bg-white">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fs-5 fw-bold">Brand</label>
                                            </div>
                                            <div class="col-10">
                                                <label class="form-label fs-5 fw-bold">Sony</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fs-5 fw-bold">Model</label>
                                            </div>
                                            <div class="col-10">
                                                <label class="form-label fs-5 fw-bold">Ericson 1</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fs-5 fw-bold">Description</label>
                                            </div>
                                            <div class="col-10">
                                                <textarea class="form-control" cols="60" rows="10" disabled><?php echo $pd["description"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 bg-white">
                        <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-start-0 border-end-0 border-top-0 border-primary">
                            <div class="col-md-6">
                                <span class="fs-3 fw-bold">Feedbacks...</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row g-1">

                            <?php

                            $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $pid . "'");
                            $feed = $feedbackrs->num_rows;

                            if ($feed == 0) {

                            ?>

                                <div class="col-12">
                                    <label class="form-label fs-3 text-center text-black">There are no feedbacks to view</label>
                                </div>

                                <?php

                            } else {

                                for ($a = 0; $a < $feed; $a++) {
                                    $feedrow = $feedbackrs->fetch_assoc();

                                    Database::search("SELECT * FROM `user` WHERE `email` = '" . $feedrow["user_email"] . "'");

                                ?>

                                    <div class="col-12 col-lg-4 border border-2 border-danger rounded">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fs-5 fw-bold text-primary">Abdul Rahman Muhammed Waseem</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="fs-5 text-dark"><?php echo $feedrow["feed"]; ?></span>
                                            </div>
                                            <div class="col-12 text-end">
                                                <span class="fs-6 text-black-50"><?php echo $feedrow["date"]; ?></span>
                                            </div>
                                        </div>
                                    </div>

                            <?php

                                }
                            }

                            ?>

                        </div>
                    </div>

                    <?php

                    require "footer.php";

                    ?>

                </div>
            </div>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php

    }
}

?>