function changeView() {

    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");

}

function signUp() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                document.getElementById("msg").innerHTML = "";

                changeView();

            } else {
                document.getElementById("msg").innerHTML = text;
            }

        }
    };
    r.open("POST", "signUpProcess.php", true);
    r.send(f);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };
    r.open("POST", "signInProcess.php", true);
    r.send(formData);

}

var bm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {

                alert("Verification email sent.Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(text);
            }

        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {
    var np = document.getElementById("np");
    var npd = document.getElementById("npd");

    if (npd.innerHTML == "Show") {
        np.type = "text";
        npd.innerHTML = "Hide";
    } else {
        np.type = "Password";
        npd.innerHTML = "Show";
    }

}

function showPassword2() {
    var np = document.getElementById("rnp");
    var npd = document.getElementById("rnpd");

    if (npd.innerHTML == "Show") {
        np.type = "text";
        npd.innerHTML = "Hide";
    } else {
        np.type = "Password";
        npd.innerHTML = "Show";
    }

}

function resetPassword() {

    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                alert("Password Reset Success");
                bm.hide();

            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(formData);

}

function goToAddProduct() {
    window.location = "addproduct.php";
}

function changeImg() {
    var image = document.getElementById("imguploader");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}

function addProduct() {
    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("bn").checked) {
        condition = 1;
    } else if (document.getElementById("us").checked) {
        condition = 2;
    }

    var colour;

    if (document.getElementById("clr1").checked) {
        colour = 1;
    } else if (document.getElementById("clr2").checked) {
        colour = 2;
    } else if (document.getElementById("clr3").checked) {
        colour = 3;
    } else if (document.getElementById("clr4").checked) {
        colour = 4;
    } else if (document.getElementById("clr5").checked) {
        colour = 5;
    } else if (document.getElementById("clr6").checked) {
        colour = 6;
    }

    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delivery_within_kandy = document.getElementById("dwk");
    var delivery_outof_kandy = document.getElementById("dok");
    var description = document.getElementById("desc");
    var image = document.getElementById("imguploader");

    var form = new FormData();
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("col", colour);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwk", delivery_within_kandy.value);
    form.append("dok", delivery_outof_kandy.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
        }
    };

    r.open("POST", "addProductProcess.php", true);
    r.send(form);

}

function signout() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "home.php";
            }
        }
    };
    r.open("GET", "signout.php", true);
    r.send();

}

function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var img = document.getElementById("profileimg");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("p", postalcode.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location.reload();
        }
    };

    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);

}

// change  status

function changeStatus(id) {

    var productid = id;
    var statuslabel = document.getElementById("checklabel" + productid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "deactive") {
                statuslabel.innerHTML = "Make Your Product Active";
            } else if (t == "active") {
                statuslabel.innerHTML = "Make Your Product Dective";
            }
        }
    };

    r.open("GET", "statusChangeProcess.php?p=" + productid, true);
    r.send();

}

// delete model

function deleteModel(id) {

    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm);
    k.show();

}

// delete product

function deleteproduct(id) {

    var productid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {
                k.hide();
                window.location = "sellerproductview.php";
            }
        }
    };

    request.open("GET", "deleteproductprocess.php?id=" + productid, true);
    request.send();

}

// filters

function addFilters() {

    var search = document.getElementById("s");

    var age;

    if (document.getElementById("n").checked) {
        age = 1;
    } else if (document.getElementById("o").checked) {
        age = 2;
    } else {
        age = 0;
    }

    var qty;

    if (document.getElementById("l").checked) {
        qty = 1;
    } else if (document.getElementById("h").checked) {
        qty = 2;
    } else {
        qty = 0;
    }

    var condition;

    if (document.getElementById("b").checked) {
        condition = 1;
    } else if (document.getElementById("u").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var form = new FormData();
    form.append("s", search.value);
    form.append("a", age);
    form.append("q", qty);
    form.append("c", condition);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("filter").innerHTML = text;
        }
    }
    r.open("POST", "filterprocess.php", true);
    r.send(form);

}

// clearfilter

function clearfilter() {
    window.location = "sellerproductview.php?page=1";
}

// search to update

function searchtoupdate() {
    var id = document.getElementById("searchToUpdate").value;
    var title = document.getElementById("ti");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            var Object = JSON.parse(text);

            title.value = Object["title"];

        }
    };

    request.open("GET", "searchToUpdateProcess.php?id=" + id, true);
    request.send();

}

// send id to update

function sendid(id) {

    var id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "updateProduct.php";
            }

        }
    };

    r.open("GET", "sendProductProcess.php?id=" + id, true);
    r.send();

}

///////////////////////////////////load main img////////////////////////////////

function loadmainimg(id) {

    var pid = id;

    var img = document.getElementById("pimg" + pid).src;
    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";

    alert(img);

}

// qty update

function qty_inc(qty) {

    var pqty = qty;

    var input = document.getElementById("qtyinput");

    if (input.value < pqty) {
        var newvalue = parseInt(input.value) + 1;
        input.value = newvalue.toString();
    } else {

        alert("Maximum quantity count has been achieved");

    }


}

function qty_dec() {
    var input = document.getElementById("qtyinput");

    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();
    } else {
        alert("Minimum quantity count has been achieved.");
    }

}

////////////////////////////////basic Search///////////////////////

// basic search

// function basicSearch() {

//     var searchText = document.getElementById("basic_search_txt").value;
//     var searchSelect = document.getElementById("basic_search_select").value;

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             var ar = JSON.parse(t);
//             for (var i = 0; i < ar.length; i++) {

//                 var divrow = document.createElement("div");
//                 divrow.className = "row";

//                 var div = document.createElement("div");
//                 div.className = "card col-6 col-lg-2 mt-1 mb-1 ms-1";
//                 var img = document.createElement("img");
//                 img.src = "resources/products/" + ar[i]["image"];
//                 var div1 = document.createElement("div");
//                 div1.className = "card-body";
//                 var h5 = document.createElement("h5");
//                 h5.className = "card-title";
//                 h5.innerHTML = ar[i]["title"];
//                 var span1 = document.createElement("span");
//                 span1.innerHTML = "New";
//                 var span2 = document.createElement("span");
//                 span2.className = "card-text text-primary";
//                 span2.innerHTML = ar[i]["price"];
//                 var br = document.createElement("br");
//                 var span3 = document.createElement("span");
//                 span3.className = "card-text text-warning";
//                 span3.innerHTML = "In Stock";
//                 var input = document.createElement("input");
//                 input.type = "number";
//                 input.value = ar[i]["qty"];
//                 input.className = "form-control mb-1";
//                 var a1 = document.createElement("a");
//                 a1.className = "btn btn-success";
//                 a1.innerHTML = "Buy Now"
//                 var a2 = document.createElement("a");
//                 a2.className = "btn btn-danger";
//                 a2.innerHTML = "Add To Cart";

//                 divrow.appendChild(div);
//                 div.appendChild(div1);
//                 div.appendChild(img);
//                 div1.appendChild(h5);
//                 h5.appendChild(span1);
//                 div1.appendChild(span2);
//                 div1.appendChild(br);
//                 div1.appendChild(span3);
//                 div1.appendChild(input);
//                 div1.appendChild(a1);
//                 div1.appendChild(a2);

//                 document.getElementById("pdetails").appendChild(div);

//             }
//         }
//     };

//     r.open("GET", "basicSearchProcess.php?t=" + searchText + "&s=" + searchSelect);
//     r.send();

// }

function basicSearch(x) {
    var searchtext = document.getElementById("basic_search_txt").value;
    var searchselect = document.getElementById("basic_search_select").value;
    // alert(searchtext);

    var form = new FormData();
    form.append("t", searchtext);
    form.append("tt", searchselect);
    form.append("page", x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            document.getElementById("basicsearch").innerHTML = text;
        }
    };
    r.open("POST", "basicSearchProcess.php", true);
    r.send(form);

}

function basicSearch1(x, y, z) {
    // alert(x);
    // alert(y);
    // alert(z);
    var form = new FormData();
    form.append("page", x);
    form.append("catagaty", y);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            document.getElementById(z).innerHTML = text;
        }
    };
    r.open("POST", "basicsecpropagi.php", true);
    r.send(form);
}

// addToWatchlist

function addToWatchlist(id) {

    var pid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "watchlist.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToWatchlistProcess.php?id=" + pid, true);
    r.send();

}

// goToCart

function goToCart() {
    window.location = "cart.php";
}

// deletefromwatchlist

function deletefromwatchlist(id) {

    var wid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                // window.location = "watchlist.php";
                window.location.reload();
            }
        }
    }

    request.open("GET", "removeWatchlistItemProcess.php?id=" + wid);
    request.send();

}

// addToCart

function addToCart(id) {

    var qtytxt = document.getElementById("qtytxt" + id).value;
    var pid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();

}

// deletefromCart

function deletefromCart(id) {

    var cid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            }
        }
    };

    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();

}

// paynow

function paynow(id) {

    var qty = document.getElementById("qtyinput").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var obj = JSON.parse(t);

            var mail = obj["email"];
            var amount = obj["amount"];

            if (t == "1") {
                alert("Please sign In first");
                window.location = "index.php";
            } else if (t == "2") {
                alert("Please Update your Profile First");
                window.location = "userprofile.php";
            } else {
                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, mail, amount, qty);

                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218128", // Replace your Merchant ID
                    "return_url": "http://localhost/abcd/singleproductview.php?id=" + id, // Important
                    "cancel_url": "http://localhost/abcd/singleproductview.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": obj["amount"] + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                payhere.startPayment(payment);
            }

        }
    }

    r.open("GET", "buynowprocess.php?id=" + id + "&qty=" + qty, true);
    r.send();

}

// saveInvoice(orderId,id,mail,amount)

function saveInvoice(orderId, id, mail, amount, qty) {

    var orderid = orderId;
    var pid = id;
    var email = mail;
    var total = amount;
    var pqty = qty;

    var f = new FormData();
    f.append("oid", orderid);
    f.append("pid", pid);
    f.append("email", email);
    f.append("total", total);
    f.append("pqty", pqty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {

                window.location = "invoice.php?id=" + orderid;

            }
        }
    };

    r.open("POST", "saveinvoice.php", true);
    r.send(f);

}

// print

function printDiv() {

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;

}

// Feedback

function addFeedback(id) {

    var feedmodel = document.getElementById("feedbackModal" + id);
    k = new bootstrap.Modal(feedmodel);

    k.show();

}

// save feedback

function saveFeedback(id) {

    var pid = id;
    var feedtxt = document.getElementById("feedtxt" + pid).value;

    var f = new FormData();
    f.append("i", pid);
    f.append("ft", feedtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                k.hide();
            }
        }
    };

    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);

}

// adminverification

function adminverification() {

    var e = document.getElementById("e").value;

    var f = new FormData();
    f.append("e", e);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Verification Code sending success") {
                var verificationModal = document.getElementById("verficationmodal");
                k = new bootstrap.Modal(verificationModal);

                k.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminverificationprocess.php", true);
    r.send(f);

}

function verify() {

    var verificationcode = document.getElementById("v").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                window.location = "adminpanel.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "verifyprocess.php?v=" + verificationcode, true);
    r.send();

}

// blockuser

function blockuser(email) {

    var mail = email;

    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success1") {
                // window.location.reload();
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "success2") {
                // window.location.reload();
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    };

    r.open("POST", "userBlockProcess.php", true);
    r.send(f);

}

// searchUser

function searchUser() {

    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "manageusers.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "searchuser.php?s=" + text.value, true);
    r.send();

}

// advancedSearch

function advancedSearch(x) {
    // alert(x);
    // var x = 1;
    var s = document.getElementById("s1").value;
    var ca = document.getElementById("ca1").value;
    var br = document.getElementById("br1").value;
    var mo = document.getElementById("mo1").value;
    var co = document.getElementById("co1").value;
    var col = document.getElementById("col1").value;
    var prif = document.getElementById("prif1").value;
    var prit = document.getElementById("prit2").value;

    // alert(s);
    // alert(ca);
    // alert(br);
    // alert(mo);
    // alert(co);
    // alert(col);
    // alert(prif);
    // alert(prit);

    var form = new FormData();
    form.append("page", x);
    form.append("s", s);
    form.append("c", ca);
    form.append("b", br);
    form.append("m", mo);
    form.append("co", co);
    form.append("col", col);
    form.append("prif", prif);
    form.append("prit", prit);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // 
            document.getElementById("filter").innerHTML = text;
        }
    };
    r.open("POST", "advancedSearchProcess.php", true);
    r.send(form);

}

// dailysellings

function dailysellings() {

    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;
    var link = document.getElementById("historylink");

    link.href = "sellinghistory.php?f=" + from + "&t=" + to;

}

function viewmsgmodal() {

    var pop = document.getElementById("msgmodal");

    k = new bootstrap.Modal(pop);
    k.show();

}

// addnewmodel

function addnewmodel() {

    var pop = document.getElementById("addnewmodal");

    k = new bootstrap.Modal(pop);
    k.show();

}

// savecategory

function savecategory() {

    var txt = document.getElementById("categorytxt").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Category saved successfully.");
                window.location.reload();
            } else {
                alert("t");
            }
        }
    };

    r.open("GET", "addNewCategoryProcess.php?t=" + txt, true);
    r.send();

}

// singleviewmodal

function singleviewmodal() {

    var pop = document.getElementById("singleproductview");

    k = new bootstrap.Modal(pop);
    k.show();

}

// Message

function sendmessage(mail) {

    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                // alert("Message Sent Successfully");
                refresher(email);
                document.getElementById("msgtxt").value = "";

            } else {
                alert("t");
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}

// refresher

function refresher(email) {

    setInterval(refreshmsgare(email), 500);
    setInterval(refreshrecentarea, 500);

}

// refres msg view area

function refreshmsgare(mail) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}