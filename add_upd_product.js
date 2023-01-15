function changeImage() {

    var image = document.getElementById("imageUploader");
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

    var color;

    if (document.getElementById("clr1").checked) {
        color = 1;
    } else if (document.getElementById("clr2").checked) {
        color = 2;
    } else if (document.getElementById("clr3").checked) {
        color = 3;
    } else if (document.getElementById("clr4").checked) {
        color = 4;
    } else if (document.getElementById("clr5").checked) {
        color = 5;
    } else if (document.getElementById("clr6").checked) {
        color = 6;
    }

    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delivery_within_kandy = document.getElementById("dwk");
    var delivery_out_of_kandy = document.getElementById("dok");
    var description = document.getElementById("desc");
    var image = document.getElementById("imageUploader");


    // var form = new FormData();
    // alert(category.value);
    // alert(brand.value);
    // alert(model.value);
    // alert(title.value);
    // alert(condition);
    // alert(color);
    // alert(qty.value);
    // alert(price.value);
    // alert(delivery_within_colombo.value);
    // alert(delivery_out_of_colombo.value);
    // alert(description.value);
    // alert(image.files[0]);



    var form = new FormData();
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("col", color);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwk", delivery_within_kandy.value);
    form.append("dok", delivery_out_of_kandy.value);
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

// function changeProductView() {

//     var add = document.getElementById("addProductBox");
//     var update = document.getElementById("updateProductBox");

//     add.classList.toggle("d-none");
//     update.classList.toggle("d-none");

// }

// search to update
function searchtoupdate() {
    var id = document.getElementById("serachtoupdate").value;
    var title = document.getElementById("ti");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            // alert(text);
            var object = JSON.parse(text);
            alert(object["title"]);

            title.value = object["title"];

        }
    }
    request.open("GET", "searchToUpdateProcess.php?id=" + id, true);
    request.send();
}

function updateProduct() {


    var title = document.getElementById("ti");
    var qty = document.getElementById("qty");
    var delivery_within_kandy = document.getElementById("dwk");
    var delivery_out_of_kandy = document.getElementById("dok");
    var description = document.getElementById("desc");
    var image = document.getElementById("imageUploader");


    // var form = new FormData();
    // alert(category.value);
    // alert(brand.value);
    // alert(model.value);
    // alert(title.value);
    // alert(condition);
    // alert(color);
    // alert(qty.value);
    // alert(price.value);
    // alert(delivery_within_colombo.value);
    // alert(delivery_out_of_colombo.value);
    // alert(description.value);
    // alert(image.files[0]);

    var form = new FormData();
    form.append("t", title.value);
    form.append("qty", qty.value);
    form.append("dwk", delivery_within_kandy.value);
    form.append("dok", delivery_out_of_kandy.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
        }
    };
    r.open("POST", "updateProductProcess.php", true);
    r.send(form);

}