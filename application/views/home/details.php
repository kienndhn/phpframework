<!-- nội dung trang xem chi tiết sản phẩm -->
    <div class="content">
        <div class="container-product">
            <div class="left">
                <div class="product-img">
                    <img id="img-product" src="<?php echo URL ?>/uploads/<?php echo $product->image ?>">
                </div>
            </div>
            <div class="right">
                <div class="product-detail">
                    <h3>Tên sản phẩm:</h3><span><?php echo $product->name ?></span>
                </div>
                <div class="product-detail">
                    <h3>Giá sản phẩm:</h3><span><?php echo $product->price ?></span>
                </div>
                <div class="product-detail">
                    <h3>Chi tiết sản phẩm:</h3>
                    <p>
                        <?php echo $product->description ?>
                    </p>
                </div>
                <div class="product-detail">
                    <label>Số lượng: </label><input style="width: 44px;" type="number" name="quantity" value="1" min="1">
                </div>
                <div class="product-detail">
                    <div id="btn-add-to-cart"><button>Add to cart</button></div>
                </div>
            </div>
        </div>
    </div>