<?php

session_start();

if (isset($_SESSION["u"])) {

    $customer = $_SESSION["u"]["email"];
    $email = $_GET["email"];

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop | Messages</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body onload="refresher('<?php echo $email; ?>');">
        <div class="container-fluid">
            <div class="row">
                <?php require "header.php"; ?>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 py-5 px-4">
                    <div class="row rounded-lg overflow-hidden shadow">
                        <div class="col-5 px-0">
                            <div class="bg-white">

                                <div class="bg-gray px-4 py-2 bg-light">
                                    <p class="h5 mb-0 py-1">Recent</p>
                                </div>

                                <div class="messages-box">
                                    <div class="list-group rounded-0" id="rcv">

                                        

                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- massage box -->
                        <div class="col-7 px-0">
                            <div class="row px-4 py-5 chat-box bg-white" id="chatrow"><!-- massage load venne methana -->


                            </div>
                        </div>

                        <div class="offset-5 col-7">
                            <div class="row bg-white">

                                <!-- text -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="input-group">
                                            <input type="text" id="msgtxt" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                            <div class="input-group-append">
                                                <button id="button-addon2" class="btn btn-link fs-1" onclick="sendmessage('<?php echo $email; ?>');"> <i class="bi bi-cursor-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- text -->

                            </div>
                        </div>

                    </div>
                </div>

                <?php require "footer.php"; ?>
            </div>
        </div>



        <script src="script.js"></script>

    </body>

    </html>

<?php

}

?>