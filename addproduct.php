<!DOCTYPE html>

<html>

<head>

    <title>eShop|Add Product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row gy-3">
            <!-- heading -->

            <div class="col-12 mb-3">
                <h3 class="h2 text-center text-primary">Add Product</h3>
            </div>
            <!-- heading -->

            <!-- category,brand,model -->

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Select Product Category</label>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="form-select" id="ca">
                                    <option value="0">Select Category</option>
                                    <option value="1">Cell Phones & Accessories</option>
                                    <option value="2">Computer & Tablets</option>
                                    <option value="3">Cameras</option>
                                    <option value="4">Camera Drones</option>
                                    <option value="5">Video Gane Consoles</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Select Product Brand</label>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="form-select" id="br">
                                    <option value="0">Select Brand</option>
                                    <option value="1">Sony</option>
                                    <option value="2">Samsung</option>
                                    <option value="3">HTC</option>
                                    <option value="4">Huawei</option>
                                    <option value="5">Vivo</option>
                                    <option value="6">Oppo</option>
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
                                <select class="form-select" id="mo">
                                    <option value="0">Select Model</option>
                                    <option value="1">Ericson 1</option>
                                    <option value="2">Galaxy J3</option>
                                    <option value="3">Ultra</option>
                                    <option value="4">P20</option>
                                    <option value="5">Y20</option>
                                    <option value="6">A95</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- category,brand,model -->

            <hr class="hrbreak1" />

            <!-- title -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label lbl1">Add a Title to your Product</label>
                    </div>
                    <div class="offset-lg-2 col-12 col-lg-8">
                        <input class="form-control" type="text" id="ti" />
                    </div>
                </div>
            </div>

            <!-- title -->

            <hr class="hrbreak1" />

            <!-- condition,color,qty -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Select Product Condition</label>
                            </div>
                            <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked>
                                <label class="form-check-label" for="bn">
                                    Brandnew
                                </label>
                            </div>
                            <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="us">
                                <label class="form-check-label" for="us">
                                    Used
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Select Product Color</label>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                        <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr1" checked>
                                        <label class="form-check-label" for="clr1">
                                            Gold
                                        </label>
                                    </div>
                                    <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                        <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr2">
                                        <label class="form-check-label" for="clr2">
                                            Silver
                                        </label>
                                    </div>
                                    <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                        <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr3">
                                        <label class="form-check-label" for="clr3">
                                            Graphite
                                        </label>
                                    </div>
                                    <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                        <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr4">
                                        <label class="form-check-label" for="clr4">
                                            Pacific Blue
                                        </label>
                                    </div>
                                    <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                        <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr5">
                                        <label class="form-check-label" for="clr5">
                                            Jet Black
                                        </label>
                                    </div>
                                    <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                        <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                        <label class="form-check-label" for="clr6">
                                            Rose Gold
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Add Product Quantity</label>
                                <input class="form-control" type="number" value="0" min="0" id="qty" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- condition,color,qty -->

            <hr class="hrbreak1" />

            <!-- cost,payment method -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Cost Per Item</label>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs.</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost" />
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
                        <label class="form-label lbl1">Delivery Cost</label>
                    </div>
                    <div class="offset-lg-1 col-12 col-lg-3">
                        <label class="form-label">Delivery Cost Within Colombo</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs.</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwk" />
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label lbl1"></label>
                    </div>
                    <div class="offset-lg-1 col-12 col-lg-3 mt-3">
                        <label class="form-label">Delivery Cost Out Of Colombo</label>
                    </div>
                    <div class="col-12 col-lg-7 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs.</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dok" />
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- delivery cost -->

            <hr class="hrbreak1" />

            <!-- description -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label lbl1">Product Description</label>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" cols="100" rows="30" style="background-color: honeydew;" id="desc"></textarea>
                    </div>
                </div>
            </div>

            <!-- description -->

            <hr class="hrbreak1" />

            <!-- product img -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label lbl1">Add Product Image</label>
                    </div>
                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="resources/addproductimg.svg" id="prev" />
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-lg-6 mt-2">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input class="d-none" type="file" accept="img/*" id="imguploader" />
                                        <label class="btn btn-primary col-5 col-lg-8" for="imguploader" onclick="changeImg();">Upload</label>
                                    </div>
                                    <!-- <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                                        <button class="btn btn-primary">Upload</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- product img -->

            <hr />

            <!-- notice -->

            <div class="col-12">
                <label class="form-label lbl1">Notice...</label>
                <br />
                <label class="form-label">We are taking 5% of the product price from every product as a service charge.</label>
            </div>

            <!-- notice -->

            <!-- save btn -->

            <div class="col-12">
                <div class="row">
                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid">
                        <button class="btn btn-success searchbtn" onclick="addProduct();">Add Product</button>
                    </div>
                </div>
            </div>
            <!-- save btn -->

            <!-- /////////////////////////////////////////////////////////////////////// -->



            <!-- footer -->
            <?php

            require "footer.php";

            ?>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>