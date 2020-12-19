
<!-- Nội dung trang home index -->
<div class="content">
    <div class="container-flex">
        <!-- bên trái -->

        <div class="catagories">
            <div class="catagories-header">
                <img src="<?php echo URL ?>list.png">
                <span>Tất cả danh mục</span>
                <ul class="catagories-list">
                    <?php
                    if ($categories) {
                        foreach ($categories as $cat) {
                            ?>
                            <li><a href="<?php echo URL ?>/home/proCategory/<?php echo $cat->cat_id ?>"><span><?php echo $cat->cat_name ?></span></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="catagories-header">
                <img src="<?php echo URL ?>list.png">
                <span>Hãng</span>
                <ul class="catagories-list">
                    <?php
                    if ($manufactures) {
                        foreach ($manufactures as $man) {
                            ?>
                            <li><a href="<?php echo URL ?>/home/proManufacture/<?php echo $man->man_id ?>"><span><?php echo $man->man_name ?></span></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="alert" id="alert">
                <span class="closebtn">&times;</span>  
                <strong><a href="<?php echo URL . '/users/login' ?>">đăng nhập</a></strong> 
            </div>

        </div>
        <!-- bên phải -->
        <div class="products">

            <div class="products-list" id="products">
                <?php
                if ($products) {
                    foreach ($products as $pro) {
                        ?>
                        <div class="product">

                            <div class="product-view">

                                <div class="product-img">
                                    <a href="<?php echo URL ?>/home/details/<?php echo $pro->product_id ?>"><img id="img-product" src="<?php echo URL ?>/uploads/<?php echo $pro->image ?>" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <div class="name-product"><?php echo $pro->name ?></div>
                                    <div class="price-product"><?php echo $pro->price ?> Đồng</div>
                                    <div class="btn-add-to-cart" ><button onclick="addProduct('<?php echo URL ?>', '<?php echo $pro->product_id ?>', '<?php echo $pro->price ?>')">Add to cart</button></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<style>
    .alert {
        display: none;
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #4CAF50;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<script>
//    function addProduct(url, id, price) {
//        var xhttp = new XMLHttpRequest();
//        xhttp.onreadystatechange = function () {
//            if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("card-element").innerHTML = this.responseText;
//            }
//        };
//        xhttp.open("GET", url + "/carts/add/" + id + "/" + price, true);
//        xhttp.send();
//    }
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;

            div.style.display = "none";
        }
    }
</script>