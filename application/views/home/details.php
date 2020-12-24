<!-- nội dung trang xem chi tiết sản phẩm -->
<div class="content">
    <div class="alert" id="alert">
        <span class="closebtn">&times;</span>  
        <strong><a href="<?php echo URL . '/users/login' ?>">đăng nhập</a></strong> 
    </div>
    <div class="container-product">

        <div class="left">
            <img class="product-img" src="<?php echo URL ?>/uploads/<?php echo $product->image ?>">

        </div>
        <div class="right">
            <div class="product-detail">
                <h3>Tên sản phẩm:</h3><span><?php echo $product->name ?></span>
            </div>
            <div class="product-detail">
                <h3>Giá sản phẩm:</h3><span><?php echo $product->price ?></span>
            </div>
            <div class="product-detail">
                <h3>Các màu:</h3>
                <p>
                    <?php echo $product->color ?>
                </p>
            </div>
            <div class="product-detail">
                <h3>Chi tiết sản phẩm:</h3>
                <p>
                    <?php echo $product->description ?>
                </p>
            </div>
            <div class="product-detail">
                <label>Số lượng: </label><input id="qty" style="width: 44px;" type="number" name="quantity" value="0" max="10" min="0">
            </div>
            <div class="product-detail">
                <div class="btn-add-to-cart" ><button onclick="addProduct('<?php echo URL ?>', '<?php echo $product->product_id ?>', '<?php echo $product->price ?>', 1)">Add to cart</button></div>
            </div>
        </div>
    </div>
</div>

