<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>eShop | Admin | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg, #74EBD5 0%,#9FACE6 100%); min-height: 100px;">

    <div class="container-fluid justify-content-center">
        <div class="row align-content-center">

            <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-primary">Manage All Users</label>
            </div>

            <div class="col-12 bg-light rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtxt" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-primary" onclick="searchUser();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-2">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 text-end d-none d-lg-block">
                        <span class="fs-4 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Email</span>
                    </div>
                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                        <span class="fs-4 fw-bold">User Name</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-4 col-lg-1 bg-white pt-2 pb-2"></div>
                </div>
            </div>

            <?php

            if (isset($_SESSION["k"])) {

                $u = $_SESSION["k"];

            ?>

                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                            <span class="fs-5 fw-bold text-white">1</span>
                        </div>
                        <div class="col-2 bg-light text-end d-none d-lg-block">
                            <img src="resources/demoProfileImg.jpg" style="height: 70px; margin-left: 100px;" />
                        </div>
                        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold text-white"><?php echo $u["email"]; ?></span>
                        </div>
                        <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                            <span class="fs-5 fw-bold"><?php echo $u["fname"] . " " . $u["lname"]; ?></span>
                        </div>
                        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold text-white"><?php echo $u["mobile"]; ?></span>
                        </div>
                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold"><?php
                                                        $rd = $u["register_date"];
                                                        $splitrd = explode(" ", $rd);
                                                        echo $splitrd[0];
                                                        ?></span>
                        </div>
                        <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
                            <?php

                            $s = $u["status_id"];

                            if ($s == "1") {

                            ?>
                                <button id="blockbtn<?php echo $u['email']; ?>" class="btn btn-danger" onclick="blockuser('<?php echo $u['email']; ?>');">Block</button>
                            <?php

                            } else {
                            ?>
                                <button id="blockbtn<?php echo $u['email']; ?>" class="btn btn-success" onclick="blockuser('<?php echo $u['email']; ?>');">Unblock</button>
                            <?php
                            }


                            ?>
                        </div>
                    </div>
                </div>

                <?php

            } else {

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $usersrs = Database::search("SELECT * FROM `user`");
                $d = $usersrs->num_rows;
                $row = $usersrs->fetch_assoc();

                $results_per_page = 20;

                $number_of_pages = ceil($d / $results_per_page);

                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                $srn = $selectedrs->num_rows;

                $c = "0";

                while ($srow = $selectedrs->fetch_assoc()) {

                    $c = $c + 1;

                ?>

                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-12" id="kmsgmodal">
                                <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                                    <span class="fs-5 fw-bold text-white"><?php echo $c; ?></span>
                                </div>
                                <div class="col-2 bg-light text-end d-none d-lg-block">
                                    <img src="resources/demoProfileImg.jpg" style="height: 70px; margin-left: 100px;" />
                                </div>
                                <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white"><?php echo $srow["email"]; ?></span>
                                </div>
                                <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                    <span class="fs-5 fw-bold"><?php echo $srow["fname"] . " " . $srow["lname"]; ?></span>
                                </div>
                                <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white"><?php echo $srow["mobile"]; ?></span>
                                </div>
                                <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold"><?php
                                                                $rd = $srow["register_date"];
                                                                $splitrd = explode(" ", $rd);
                                                                echo $splitrd[0];
                                                                ?></span>
                                </div>
                                <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
                                    <?php

                                    $s = $srow["status_id"];

                                    if ($s == "1") {

                                    ?>
                                        <button id="blockbtn<?php echo $srow['email']; ?>" class="btn btn-danger" onclick="blockuser('<?php echo $srow['email']; ?>');">Block</button>
                                    <?php

                                    } else {
                                    ?>
                                        <button id="blockbtn<?php echo $srow['email']; ?>" class="btn btn-success" onclick="blockuser('<?php echo $srow['email']; ?>');">Unblock</button>
                                    <?php
                                    }


                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }

                ?>

                <div class="col-12 fs-5 d-flex justify-content-center fw-bold mt-3 mb-3">
                    <div class="pagination">
                        <a href="<?php
                                    if ($pageno <= 1) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno - 1);
                                    }
                                    ?>">&laquo;</a>
                        <?php

                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $pageno) {
                        ?>
                                <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 active"><?php echo $page; ?></a>
                            <?php
                            } else {
                            ?>
                                <a href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>
                            <?php
                            }
                            ?>

                        <?php
                        }

                        ?>

                        <a href="<?php

                                    if ($pageno >= $number_of_pages) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno + 1);
                                    }

                                    ?>">&raquo;</a>
                    </div>
                </div>
            <?php
            }
            ?>

            <!-- Modal -->
            <div class="modal fade modal-dialog-scrollable" id="msgmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">My Messages</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- ... -->

                            <div class="col-12 py-5 px-4">
                                <div class="row rounded overflow-hidden shadow">
                                    <div class="col-12 px-0">
                                        <div class="bg-white">

                                            <div class="bg-light px-4 py-2">
                                                <h5 class="mb-0 py-1">Recent</h5>
                                            </div>

                                            <div class="message-box">
                                                <div class="list-group rounded-0">
                                                    <a href="#" class="list-group-item list-group-item-action text-white rounded-0 bg-primary">
                                                        <div class="media">
                                                            <img src="resources/demoProfileImg.jpg" width="50px" class="rounded-circle" />
                                                            <div class="me-4">
                                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                                    <h6 class="mb-0">Kamal</h6>
                                                                    <small class="small fw-bold">01-10</small>
                                                                </div>
                                                                <p class="mb-0">Got it. Thankyou!</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="row px-4 py-5 text-white chatbox">
                                            <!-- senders's message -->

                                            <div class="media mb-3 w-50">
                                                <img src="resources/demoProfileImg.jpg" width="50px" class="rounded-circle mb-1" />
                                                <div class="media-body me-3">
                                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                                        <p class="mb-0 text-black-50">Got it. Thankyou!</p>
                                                    </div>
                                                    <p class="small text-black-50 text-end">10:15 | 10.10.2021</p>
                                                </div>
                                            </div>

                                            <!-- senders's message -->

                                            <!-- receiver's message -->

                                            <div class="media w-50 mb-3">
                                                <div class="media-body">
                                                    <div class="bg-primary rounded py-2 px-3 mb-2">
                                                        <p class="mb-0 text-white">Have You got the Product?</p>
                                                    </div>
                                                    <p class="small text-black-50">10:15 | 10.10.2021</p>
                                                </div>
                                            </div>

                                            <!-- receiver's message -->

                                            <!-- text -->

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="input-group">
                                                        <input type="text" placeholder="Type a message..." aria-describedby="sendbtn" class="form-control rounded-0 border-0 py-4 bg-light" />
                                                        <div class="input-group-append">
                                                            <button id="sendbtn" class="btn btn-link fs-1"><i class="bi bi-cursor-fill"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- text -->

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- ... -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php require "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>