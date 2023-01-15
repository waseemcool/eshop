<?php

require "connection.php";

$text = $_POST["t"];
$selectsearch = $_POST["tt"];


// echo $text,$selectsearch;
$quvry = "SELECT * FROM `product` WHERE product.status_id='1'";
$quvry1 = "SELECT * FROM category";
if ($selectsearch !== "0") {
    $quvry1 .= " WHERE category.id='" . $selectsearch . "'";
    if (empty($text)) {

        if ("0" !== ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }



        $cat = Database::search($quvry1);
        $n = $cat->num_rows;

        for ($x = 0; $x < $n; $x++) {

            $d = $cat->fetch_assoc();
?>
            <div class="col-12">
                <a href="#" class="link-dark link2"><?php echo $d["name"]; ?></a> &nbsp;&nbsp;
                <a href="#" class="link-dark link3">See All&nbsp; &rarr;</a>
            </div>
            <?php
            $quvry .= "AND product.category_id='" . $d["id"] . "'";
            $products = Database::search($quvry);
            $nProduct = $products->num_rows;
            $userProduct = $products->fetch_assoc();

            $results_per_page = 4;
            $number_of_pages = ceil($nProduct / $results_per_page);

            $page_first_result = ((int)$pageno - 1) * $results_per_page;
            $quvry .= "ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "";
            $resultset = Database::search($quvry);
            $norow = $resultset->num_rows;

            ?>
            <div class="col-12">

                <div class="row border border-primary">
                    <div class="col-12 col-lg-12 ">

                        <div class="row  justify-content-center" id="pdetails">

                            <?php

                            for ($y = 0; $y < $resultset->num_rows; $y++) {
                                $product = $resultset->fetch_assoc();
                            ?>

                                <div class="col-6 col-lg-2 card mt-1 mb-1 ">

                                    <?php
                                    $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                    $img = $pimage->fetch_assoc();
                                    ?>

                                    <img src="resources/products/<?php echo $img["code"] ?>" class="card-img-top img-fluid img-thumbnail cart-top-image" alt="...">
                                    <div class="card-body ms-0 m-0">

                                        <h6 class="card-title"><?php echo $product["title"] ?> <span class="badge bg-info">New</span></h6>
                                        <span class="card-text text-primary">RS.<?php echo $product["price"] ?>.00</span><br />

                                        <?php

                                        if ((int)$product["qty"] > 0) {
                                        ?>
                                            <span class="card-text text-warning"><b>In Stock</b></span>
                                            <input type="number" class="form-control mb-1" value="1" id="qtyText<?php echo $product['id']; ?>">
                                            <a href='<?php echo "singleproductview.php?id=" . ($product["id"]); ?>' class="btn btn-success col-12">Buy Now</a>
                                            <button class="btn btn-danger fs mt-1 col-12" onclick="addToCart(<?php echo $product['id']; ?>);">Add To Cart</button>
                                            <button class="btn btn-secondary col-12 mt-2" onclick='addToWatchlist(<?php echo $product["id"]; ?>);'><i class="bi bi-heart-fill"></i></button>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="card-text text-danger"><b>Out Of Stock</b></span>
                                            <input type="number" class="form-control mb-1" value="1">
                                            <a href="#" class="btn btn-success fs disabled">Buy Now</a>
                                            <a href="#" class="btn btn-danger fs disabled">Add To Cart</a>
                                        <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
            <?php


            ?>

            <!-- product view -->
            <?php

            ?>
            <div class="col-12">
                <div class="row">
                    <div class="offset-4 col-4 text-center">
                        <div class="offset-3 mb-5 pagination">
                            <a <?php
                                if ($pageno <= 1) {
                                    echo "#";
                                } else {
                                ?> 
                                onclick="basicSearch('<?php echo ($pageno - 1) ?>');" 
                                <?php
                                    }
                            ?>>&laquo;</a>

                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {

                                if ($page == $pageno) {
                            ?>
                                    <a onclick="basicSearch('<?php echo $page ?>');" class="ms-1 active"><?php echo $page; ?></a>
                                <?php
                                } else {
                                ?>

                                    <a onclick="basicSearch('<?php echo $page ?>');" class="ms-1"><?php echo $page; ?></a>

                            <?php
                                }
                            }

                            ?>
                            <a <?php
                                if ($pageno >= $number_of_pages) {
                                    echo "#";
                                } else {
                                ?> onclick="basicSearch('<?php echo ($pageno + 1) ?>');" 
                                <?php
                                    }
                            ?>>&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        $quvry .= " AND `title` LIKE '%" . $text . "%'";

        if ("0" !== ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }



        $cat = Database::search($quvry1);
        $n = $cat->num_rows;

        for ($x = 0; $x < $n; $x++) {

            $d = $cat->fetch_assoc();
        ?>
            <div class="col-12">
                <a href="#" class="link-dark link2"><?php echo $d["name"]; ?></a> &nbsp;&nbsp;
                <a href="#" class="link-dark link3">See All&nbsp; &rarr;</a>
            </div>
            <?php
            $quvry .= "AND product.category_id='" . $d["id"] . "'";
            $products = Database::search($quvry);
            $nProduct = $products->num_rows;
            $userProduct = $products->fetch_assoc();

            $results_per_page = 4;
            $number_of_pages = ceil($nProduct / $results_per_page);

            $page_first_result = ((int)$pageno - 1) * $results_per_page;
            $quvry .= "ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "";
            $resultset = Database::search($quvry);
            $norow = $resultset->num_rows;

            ?>
            <div class="col-12">

                <div class="row border border-primary">
                    <div class="col-12 col-lg-12 ">

                        <div class="row  justify-content-center" id="pdetails">

                            <?php

                            for ($y = 0; $y < $resultset->num_rows; $y++) {
                                $product = $resultset->fetch_assoc();
                            ?>

                                <div class="col-6 col-lg-2 card mt-1 mb-1 " style="width: 18rem;">

                                    <?php
                                    $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                    $img = $pimage->fetch_assoc();
                                    ?>

                                    <img src="resources/products/<?php echo $img["code"] ?>" class="card-img-top cart-top-image" alt="...">
                                    <div class="card-body ms-0 m-0">

                                        <h6 class="card-title"><?php echo $product["title"] ?> <span class="badge bg-info">New</span></h6>
                                        <span class="card-text text-primary">RS.<?php echo $product["price"] ?>.00</span><br />

                                        <?php

                                        if ((int)$product["qty"] > 0) {
                                        ?>
                                            <span class="card-text text-warning"><b>In Stock</b></span>
                                            <input type="number" class="form-control mb-1" value="1" id="qtyText<?php echo $product['id']; ?>">
                                            <a href='<?php echo "singleproductview.php?id=" . ($product["id"]); ?>' class="btn btn-success col-12">Buy Now</a>
                                            <button class="btn btn-danger fs mt-1 col-12" onclick="addToCart(<?php echo $product['id']; ?>);">Add To Cart</button>
                                            <button class="btn btn-secondary col-12 mt-2" onclick='addToWatchlist(<?php echo $product["id"]; ?>);'><i class="bi bi-heart-fill"></i></button>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="card-text text-danger"><b>Out Of Stock</b></span>
                                            <input type="number" class="form-control mb-1" value="1">
                                            <a href="#" class="btn btn-success fs disabled">Buy Now</a>
                                            <a href="#" class="btn btn-danger fs disabled">Add To Cart</a>
                                        <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
            <?php


            ?>

            <!-- product view -->
            <?php

            ?>
            <div class="col-12">
                <div class="row">
                    <div class="offset-4 col-4 text-center">
                        <div class="offset-3 mb-5 pagination">
                            <a <?php
                                if ($pageno <= 1) {
                                    echo "#";
                                } else {
                                ?> 
                                onclick="basicSearch('<?php echo ($pageno - 1) ?>');" 
                                <?php
                                    }
                            ?>>&laquo;</a>

                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {

                                if ($page == $pageno) {
                            ?>
                                    <a onclick="basicSearch('<?php echo $page ?>');" class="ms-1 active"><?php echo $page; ?></a>
                                <?php
                                } else {
                                ?>

                                    <a onclick="basicSearch('<?php echo $page ?>');" class="ms-1"><?php echo $page; ?></a>

                            <?php
                                }
                            }

                            ?>
                            <a <?php
                                if ($pageno >= $number_of_pages) {
                                    echo "#";
                                } else {
                                ?> 
                                onclick="basicSearch('<?php echo ($pageno + 1) ?>');" 
                                <?php
                                    }
                            ?>>&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
} else if (!empty($text)) {
    $quvry .= " AND `title` LIKE '%" . $text . "%'";


    if ("0" !== ($_POST["page"])) {
        $pageno = $_POST["page"];
    } else {
        $pageno = 1;
    }



    $products = Database::search($quvry);
    $nProduct = $products->num_rows;
    // $userProduct = $products->fetch_assoc();

    $results_per_page = 4;
    $number_of_pages = ceil($nProduct / $results_per_page);

    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $quvry .= "ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "";
    $resultset = Database::search($quvry);
    $norow = $resultset->num_rows;

    ?>
    <div class="col-12">

        <div class="row border border-primary">
            <div class="col-12 col-lg-12 ">

                <div class="row  justify-content-center" id="pdetails">

                    <?php

                    for ($y = 0; $y < $resultset->num_rows; $y++) {
                        $product = $resultset->fetch_assoc();
                    ?>

                        <div class="col-6 col-lg-2 card mt-1 mb-1 " style="width: 18rem;">

                            <?php
                            $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                            $img = $pimage->fetch_assoc();
                            ?>

                            <img src="resources/products/<?php echo $img["code"] ?>" class="card-img-top cart-top-image" alt="...">
                            <div class="card-body ms-0 m-0">

                                <h6 class="card-title"><?php echo $product["title"] ?> <span class="badge bg-info">New</span></h6>
                                <span class="card-text text-primary">RS.<?php echo $product["price"] ?>.00</span><br />

                                <?php

                                if ((int)$product["qty"] > 0) {
                                ?>
                                    <span class="card-text text-warning"><b>In Stock</b></span>
                                    <input type="number" class="form-control mb-1" value="1" id="qtyText<?php echo $product['id']; ?>">
                                    <a href='<?php echo "singleproductview.php?id=" . ($product["id"]); ?>' class="btn btn-success col-12">Buy Now</a>
                                    <button class="btn btn-danger fs mt-1 col-12" onclick="addToCart(<?php echo $product['id']; ?>);">Add To Cart</button>
                                    <button class="btn btn-secondary col-12 mt-2" onclick='addToWatchlist(<?php echo $product["id"]; ?>);'><i class="bi bi-heart-fill"></i></button>
                                <?php
                                } else {
                                ?>
                                    <span class="card-text text-danger"><b>Out Of Stock</b></span>
                                    <input type="number" class="form-control mb-1" value="1">
                                    <a href="#" class="btn btn-success fs disabled">Buy Now</a>
                                    <a href="#" class="btn btn-danger fs disabled">Add To Cart</a>
                                <?php
                                }
                                ?>



                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
    <?php


    ?>

    <!-- product view -->
    <?php

    ?>
    <div class="col-12">
        <div class="row">
            <div class="offset-4 col-4 text-center">
                <div class="offset-3 mb-5 pagination">
                    <a <?php

                        if ($pageno <= 1) {
                            echo "#";
                        } else {
                        ?> 
                        onclick="basicSearch('<?php echo ($pageno - 1) ?>');" 
                        <?php
                            }
                    ?>>&laquo;</a>

                    <?php

                    for ($page = 1; $page <= $number_of_pages; $page++) {

                        if ($page == $pageno) {
                    ?>
                            <a onclick="basicSearch('<?php echo $page ?>');" class="ms-1 active"><?php echo $page; ?></a>
                        <?php
                        } else {
                        ?>

                            <a onclick="basicSearch('<?php echo $page ?>');" class="ms-1"><?php echo $page; ?></a>

                    <?php
                        }
                    }

                    ?>
                    <a <?php
                        if ($pageno >= $number_of_pages) {
                            echo "#";
                        } else {
                        ?> 
                        onclick="basicSearch('<?php echo ($pageno + 1) ?>');" 
                        <?php
                            }
                    ?>>&raquo;</a>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {

    if ("0" !== ($_POST["page"])) {
        $pageno = $_POST["page"];
    } else {
        $pageno = 1;
    }



    $cat = Database::search($quvry1);
    $n = $cat->num_rows;

    for ($x = 0; $x < $n; $x++) {

        $d = $cat->fetch_assoc();
        $quvry = "SELECT * FROM `product` WHERE product.status_id='1'";
        $quvry .= "AND product.category_id='" . $d["id"] . "'";
    ?>
        <div class="col-12">
            <a href="#" class="link-dark link2"><?php echo $d["name"]; ?></a> &nbsp;&nbsp;
            <a href="#" class="link-dark link3">See All&nbsp; &rarr;</a>
        </div>
        <?php

        $products = Database::search($quvry);
        $nProduct = $products->num_rows;
        $userProduct = $products->fetch_assoc();

        $results_per_page = 4;
        $number_of_pages = ceil($nProduct / $results_per_page);

        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $quvry .= "ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "";
        $resultset = Database::search($quvry);
        $norow = $resultset->num_rows;

        ?>
        <div id="<?php echo $d["name"]; ?>">
            <div class="col-12">

                <div class="row border border-primary">
                    <div class="col-12 col-lg-12 ">

                        <div class="row  justify-content-center" id="pdetails">

                            <?php

                            for ($y = 0; $y < $resultset->num_rows; $y++) {
                                $product = $resultset->fetch_assoc();
                            ?>

                                <div class="col-6 col-lg-2 card mt-1 mb-1 " style="width: 18rem;">

                                    <?php
                                    $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                    $img = $pimage->fetch_assoc();
                                    ?>

                                    <img src="resources/products/<?php echo $img["code"] ?>" class="card-img-top cart-top-image" alt="...">
                                    <div class="card-body ms-0 m-0">

                                        <h6 class="card-title"><?php echo $product["title"] ?> <span class="badge bg-info">New</span></h6>
                                        <span class="card-text text-primary">RS.<?php echo $product["price"] ?>.00</span><br />

                                        <?php

                                        if ((int)$product["qty"] > 0) {
                                        ?>
                                            <span class="card-text text-warning"><b>In Stock</b></span>
                                            <input type="number" class="form-control mb-1" value="1" id="qtyText<?php echo $product['id']; ?>">
                                            <a href='<?php echo "singleproductview.php?id=" . ($product["id"]); ?>' class="btn btn-success col-12">Buy Now</a>
                                            <button class="btn btn-danger fs mt-1 col-12" onclick="addToCart(<?php echo $product['id']; ?>);">Add To Cart</button>
                                            <button class="btn btn-secondary col-12 mt-2" onclick='addToWatchlist(<?php echo $product["id"]; ?>);'><i class="bi bi-heart-fill"></i></button>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="card-text text-danger"><b>Out Of Stock</b></span>
                                            <input type="number" class="form-control mb-1" value="1">
                                            <a href="#" class="btn btn-success fs disabled">Buy Now</a>
                                            <a href="#" class="btn btn-danger fs disabled">Add To Cart</a>
                                        <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
            <?php


            ?>

            <!-- product view -->
            <?php

            ?>
            <div class="col-12">
                <div class="row">
                    <div class="offset-4 col-4 text-center">
                        <div class="offset-3 mb-5 pagination">
                            <a <?php
                                if ($pageno <= 1) {
                                    echo "#";
                                } else {
                                ?> 
                                onclick="basicSearch1('<?php echo ($pageno - 1) ?>','<?php echo $d['id'] ?>','<?php echo $d['name']; ?>');" 
                                <?php
                                    }
                            ?>>&laquo;</a>

                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {

                                if ($page == $pageno) {
                            ?>
                                    <a onclick="basicSearch1('<?php echo $page ?>','<?php echo $d['id'] ?>','<?php echo $d['name']; ?>');" class="ms-1 active"><?php echo $page; ?></a>
                                <?php
                                } else {
                                ?>

                                    <a onclick="basicSearch1('<?php echo $page ?>','<?php echo $d['id'] ?>','<?php echo $d['name']; ?>');" class="ms-1"><?php echo $page; ?></a>

                            <?php
                                }
                            }

                            ?>
                            <a <?php
                                if ($pageno >= $number_of_pages) {
                                    echo "#";
                                } else {
                                ?> 
                                onclick="basicSearch1('<?php echo ($pageno + 1) ?>','<?php echo $d['id'] ?>','<?php echo $d['name']; ?>');" 
                                <?php
                                    }
                            ?>>&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

// echo $quvry,$quvry1;