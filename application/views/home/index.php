
<!-- Nội dung trang home index -->
<div class="content">
    <div class="slider" style="max-width:800px">
        <img class="mySlides" src="<?php echo URL ?>/uploads/800-300-800x300-10.png" style="width:100%">
        <img class="mySlides" src="<?php echo URL ?>/uploads/800-300-800x300-13.png" style="width:100%">
        <img class="mySlides" src="<?php echo URL ?>/uploads/macm1-800-300-800x300.png" style="width:100%">
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
    
</style>

<script src="<?php echo URL ?>/js/process.js"></script>