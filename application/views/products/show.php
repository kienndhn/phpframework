<div class="content">
    <div class="container-cart" style="text-align: center">
        <div class="profile">
            <h5 class="signup-heading"><?php echo $product->name ?></h5>
            <div class="show">

                <div  >
                    <img src="<?php echo URL ?>/uploads/<?php echo $product->image ?>" alt="" class="img-fluid">
                </div>
                <div  >
                    <ul class="show-product" style="display: grid">
                        <li  >
                            <strong>Tên: </strong> <?php echo $product->name ?>
                        </li>
                        <li>
                            <strong>Giá: </strong> <?php echo Random::currency_format($product->price) ?>
                        </li>
                        <li  >
                            <strong>ID: </strong> <?php echo $product->product_id ?>
                        </li>
                        <li>
                            <strong>Màu: </strong> <?php echo $product->color ?>
                        </li>
                        <li>
                            <strong>Kích thước: </strong> <?php echo $product->size ?>
                        </li>

                        <li>
                            <strong>Hãng: </strong> <?php echo $product->man_name ?>
                        </li>
                        <li>
                            <strong>Loại: </strong> <?php echo $product->cat_name ?>
                        </li>
                        <li>
                            <strong>Mô tả: </strong> <?php echo $product->description ?>
                        </li>
                        <li>
                            <strong>Trạng thái: </strong> <?php echo $product->active == 0 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">InActive</span>' ?>
                        </li>
                        <li>
                            <strong>Creator: </strong> <?php echo $product->creator ?>
                        </li>
                        <li>
                            <strong>Ngày thêm: </strong> <?php echo $product->created_at ?>
                        </li>
                    </ul>
                </div>

            </div>


            <h5  >Thư viện ảnh</h5>
            <?php if (count($gallary) > 0) { ?>
                <div>
                    <a class="signup-submit" href="<?php echo URL ?>/products/deleteGallary/<?php echo $product->product_id ?>">Xóa thư viện</a>
                </div>
            <?php }
            ?>
            <div  >
                <?php if (count($gallary) > 0) { ?>
                    <?php foreach ($gallary as $image) { ?>
                        <div class= >
                            <a href="<?php echo URL ?>/uploads/<?php echo $image->product_id ?>/<?php echo $image->image_name ?>" data-fancybox="gallery" data-caption="<?php echo $image->image_name ?>">
                                <img  style='height:200px' src="<?php echo URL ?>/uploads/<?php echo $image->product_id ?>/<?php echo $image->image_name ?>" alt="" />
                            </a>
                            <div>
                                <a href="<?php echo URL ?>/products/deleteGallaryImage/<?php echo $image->gallary_id ?>/<?php echo $image->product_id ?>/<?php echo $image->image_name ?>" class="delete btn btn-sm btn-danger">Xóa</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <form method="POST" action="<?php echo URL ?>/products/upload_images/<?php echo $product->product_id ?>"  enctype="multipart/form-data">
                <div  >
                    <input type="file" name="file" >
                    <input type="submit" value="Thêm" name="addGallary">
                </div>
            </form>

        </div>
    </div>
</div>