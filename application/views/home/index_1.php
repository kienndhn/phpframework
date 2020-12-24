
<!-- Nội dung trang home index -->
<div class="content">
    <div class="w3-content w3-display-container" style="max-width:800px">
        <img class="mySlides" src="img_nature_wide.jpg" style="width:100%">
        <img class="mySlides" src="img_snow_wide.jpg" style="width:100%">
        <img class="mySlides" src="img_mountains_wide.jpg" style="width:100%">
        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
    </div>
    <div class="container-flex">
        <!-- bên trái -->

        <div class="catagories">
            <div class="catagories-header">
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
                                    <div class="price-product"><?php echo Random::currency_format($pro->price); ?></div>
                                    <div class="btn-add-to-cart" ><button onclick="addProduct('<?php echo URL ?>', '<?php echo $pro->product_id ?>', '<?php echo $pro->price ?>', 1)">Thêm</button></div>
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
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
</style>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-white";
    }
</script>