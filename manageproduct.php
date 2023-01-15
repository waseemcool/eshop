<!DOCTYPE html>

<html>

<head>
    <title>eShop | Admin | Manage Product</title>

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

            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                        <span class="fs-5 fw-bold text-white">1</span>
                    </div>
                    <div class="col-2 bg-light text-end d-none d-lg-block">
                        <img src="resources/empty.svg" style="height: 70px; margin-left: 100px;" />
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold text-white">abdullahzufar04@gmail.com</span>
                    </div>
                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                        <span class="fs-5 fw-bold">Abdullah Zufar</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold text-white">0771414818</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold">2021-10-01</span>
                    </div>
                    <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
                        <button class="btn btn-danger">Block</button>
                    </div>
                </div>
            </div>

            <div class="col-12 fs-5 d-flex justify-content-center fw-bold mt-3 mb-3">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>

            <?php require "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>