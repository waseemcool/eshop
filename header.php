<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="col-12">
        <div class="row">
            <div class="offset-lg-1 col-12 col-lg-5 align-self-start">
                <span class="text-start label1"><b>Welcome</b>

                    <?php

                    if (isset($_SESSION["u"])) {
                        $user = $_SESSION["u"]["fname"];
                        echo $user ." ". "|";
                    ?>
                        <span class="text-start label2" onclick="signout();">Sign Out</span>
                    <?php
                    } else {
                    ?>
                        <a href="index.php">H! Sign In or Register</a>
                    <?php
                    }

                    ?>

                </span>|
                <span class="text-start label2">Help and Contact</span> |
            </div>
            <div class="offset-lg-4 col-12 col-md-6 col-lg-2 align-self-end">
                <div class="row mt-1 mb-1">
                    <div class="col-1 col-lg-2 mt-1">
                        <span class="text-start label2" onclick="goToAddProduct();">Sell</span>
                    </div>
                    <div class="col-2 col-lg-6 dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            My eShop
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                            <li><a class="dropdown-item" href="purchasedhistory.php">Purchase History</a></li>
                            <li><a class="dropdown-item" href="messages.php">Message</a></li>
                            <li><a class="dropdown-item" href="sellerproductview.php">My Products</a></li>
                            <li><a class="dropdown-item" href="userprofile.php">My Profile</a></li>
                        </ul>
                    </div>
                    <div class="col-1 col-lg-3 mt-1 ms-5 ms-lg-0 carticon" style="cursor: pointer;" onclick="goToCart();"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>