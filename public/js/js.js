/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function addProduct(url, id, price) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (document.getElementById("card-element")) {
                document.getElementById("card-element").innerHTML = this.responseText;
            }
            else{
                document.getElementById("alert").style.display="block";
            }
        }
    };
    xhttp.open("GET", url + "/carts/add/" + id + "/" + price, true);
    xhttp.send();

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
    xhttp.open("GET", url + "/carts/delete/" + id, true);
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
    xmlhttp.open("POST", url + "/home/livesearch", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("q=" + str);
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
            document.getElementById("cost").innerHTML = myObj[0];
            document.getElementById("card-element").innerHTML = myObj[1];
        }
    }
    xmlhttp.open("POST", url + "/carts/updateQty/" + id, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("q=" + str);
}
