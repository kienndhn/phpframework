/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function addProduct(url, id, price, str) {
    var xhttp = new XMLHttpRequest();
    if (document.getElementById("qty")) {
        str = document.getElementById("qty").value;
    }
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (document.getElementById("card-element")) {
                document.getElementById("card-element").innerHTML = this.responseText;
            } else {
                document.getElementById("alert").style.display = "block";
            }
            if (document.getElementById("qty")) {
                document.getElementById("qty").value = 0;
            }
        }
    };
    xhttp.open("POST", url + "/cart/add/" + id + "/" + price, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + str);
}
function deletePro(url, id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("content").innerHTML = myObj[0];
            document.getElementById("card-element").innerHTML = myObj[1];
        }
    };
    xhttp.open("GET", url + "/cart/delete/" + id, true);
    xhttp.send();
}

function showResult(url, str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
            document.getElementById("livesearch").style.backgroundColor = "white";
        }
    }
    xmlhttp.open("POST", url + "/home/livesearch?q=" +str, true);
    //xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    //xmlhttp.send();
}

function updateQuantity(url, id, str) {

    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (document.getElementById("cost")) {
                document.getElementById("cost").innerHTML = myObj[0];
            }
            document.getElementById("card-element").innerHTML = myObj[1];
        }
    }
    xmlhttp.open("POST", url + "/cart/updateQty/" + id, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("q=" + str);
}

function cancelOrder(url, id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("status-"+id).innerHTML = myObj[0];
            document.getElementById("cancel-"+id).style.display = "none";
            document.getElementById("done-"+id).style.display = "none";
        }
    };
    xhttp.open("GET", url + "/cart/cancelOrder/" + id, true);
    xhttp.send();
}
function deliveredOrder(url, id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("status-"+id).innerHTML = myObj[0];
            document.getElementById("cancel-"+id).style.display = "none";
            document.getElementById("done-"+id).style.display = "none";
        }
    };
    xhttp.open("GET", url + "/cart/deliveredOrder/" + id, true);
    xhttp.send();
}