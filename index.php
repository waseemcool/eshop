<!DOCTYPE html>

<html>

<head>
    <title>eShop</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="main-background">

    <div class="container-fluid vh-100 d-flex justify-content-center">

        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center title1">Hi, Welcome to eShop</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background">

                    </div>
                    <div class="col-12 col-lg-6" id="signUpBox">
                        <div class="row g-2">

                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                                <p id="msg" class="text-danger"></p>
                            </div>

                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" id="fname" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" type="text" id="lname" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" id="password" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input class="form-control" type="text" id="mobile" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select" id="gender">
                                    <?php
                                        require "connection.php";
                                        $r = Database::search("SELECT * FROM `gender`");
                                        $n = $r->num_rows;
                                        for($x=0;$x<$n;$x++) {
                                            $d = $r->fetch_assoc();
                                            ?>
                                    <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                    <?php
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark" onclick="changeView();">Alredy Have an Account? Sign
                                    In</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-none" id="signInBox">
                        <div class="row g-2">

                            <div class="col-12">
                                <p class="title2">Sign In to Your Account</p>
                                <p id="msg2" class="text-danger"></p>
                            </div>

                            <?php
                            
                            $e = "";
                            $p = "";

                            if(isset($_COOKIE["e"])){
                                $e = $_COOKIE["e"];
                            }

                            if(isset($_COOKIE["p"])){
                                $p = $_COOKIE["p"];
                            }
                            
                            ?>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="form-control" value="<?php echo $e; ?>" type="email" id="email2" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input class="form-control" value="<?php echo $p; ?>" type="password" id="password2" />
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" />
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="changeView();">New to eShop? Sign Up</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- content -->

            <!-- footer -->
            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy; 2021 eShop.lk All Rights Reserved</p>
            </div>
            <!-- footer -->

            <!-- Modal -->
            <div class="modal fade" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Password Reset</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" type="text" id="np" />
                                        <button class="btn btn-outline-primary" type="button" id="npd" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" type="text" id="rnp" />
                                        <button class="btn btn-outline-primary" type="button" id="rnpd" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input class="form-control" type="text" id="vc" />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

        </div>

    </div>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>