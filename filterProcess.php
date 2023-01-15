<?php

session_start();
$user = $_SESSION["u"];

require "connection.php";

$search = $_POST["s"];
$age = $_POST["a"];
$qty = $_POST["q"];
$condition = $_POST["c"];

// echo $search;
// echo $age;
// echo $qty;
// echo $condition;
$qvry = "SELECT * FROM `product` WHERE user_email='" . $user["email"] . "'";
if ($condition == "1") {
    $qvry .= "AND `condition_id`='1'";
} else if ($condition == "2") {
    $qvry .= "AND `condition_id`='2'";
} else if (!empty($search)) {
    $qvry .= " AND `title` LIKE '%" . $search . "%'";
} else if ($age == "1") {
    $qvry .= "ORDER BY `datetime_added` DESC";
} else if ($age == "2") {
    $qvry .= "ORDER BY `datetime_added` ASC";
} else if ($qty == "1") {
    $qvry .= "ORDER BY `qty` DESC";
} else if ($qty == "2") {
    $qvry .= "ORDER BY `qty` ASC";
}
$quvry1 = $qvry;
// echo $qvry;
// echo "<br/>";
// echo $quvry1;
?>

<div class="row justify-content-center">

    <?php
    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    $products = Database::search($qvry);
    $nProduct = $products->num_rows;
    $userProduct = $products->fetch_assoc();

    $results_per_page = 6;
    $number_of_pages = ceil($nProduct / $results_per_page);

    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::search($quvry1);
    $srn = $selectedrs->num_rows;

    while ($productImage = $selectedrs->fetch_assoc()) {

        // for ($x = 0; $x < $srn; $x++) {
        // $productImage = $selectedrs->fetch_assoc();
    ?>
        <div class="card mb-3 mt-3 col-12 col-lg-6">
            <div class="row">
                <div class="col-md-4 mt-4">

                    <?php

                    $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id`= '" . $productImage["id"] . "'");
                    $pir = $pimgrs->fetch_assoc();

                    ?>

                    <img src="resources/products/<?php echo $pir["code"]; ?>" class="img-fluid rounded-start" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">

                        <h5 class="card-title fw-bold"><?php echo $productImage["title"] ?></h5>
                        <span class="card-text text-primary fw-bold">Rs.<?php echo $productImage["price"] ?>.00</span>
                        <br />
                        <span class="card-text text-success fw-bold"><?php echo $productImage["qty"] ?> Items Left</span>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="checked" onclick="changeStatus(<?php echo $productImage['id'] ?>);" <?php

                                                                                                                                                                    if ($productImage["status_id"] == 2) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    }
                                                                                                                                                                    ?> />

                            <label class="form-check-label fw-bold text-info" for="checked" id="checkLable<?php echo $productImage['id']; ?>">
                                <?php
                                if ($productImage["status_id"] == 2) {
                                    echo "Make your Product Avtive";
                                } else {
                                    echo "Make your Product Deavtive";
                                }
                                ?>
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="row g-1">
                                    <div class="col-12 col-lg-6 d-grid">
                                        <a href="#" class="btn btn-success fs">Update</a>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <a href="#" class="btn btn-danger fs" onclick="deleteModal(<?php echo $productImage['id'] ?>);">Delete</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModel<?php echo $productImage['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-warning" id="exampleModalLabel">Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you want to delete this product
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" onclick="deleteProduct(<?php echo $productImage['id'] ?>);">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    <?php
    }

    ?>

</div>