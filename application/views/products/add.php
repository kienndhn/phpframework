
<div class="content">
    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Thêm sản phẩm mới</h1>
            <form action="<?php echo URL ?>/products/add" class="signup-form" method="POST" enctype="multipart/form-data">
                <label for="name" class="signup-label">Tên</label>
                <input type="text"  name="name" placeholder="Nhập tên sản phẩm"  class="signup-input" required>
                <label for="color" class="signup-label">Màu</label>
                <input type="text"  name="color" placeholder="Nhập danh sách màu"  class="signup-input" required>
                <label for="size" class="signup-label">Kích thước</label>
                <input type="text" name="size" placeholder="Nhập kích thước" class="signup-input" required>
                <label for="price" class="signup-label">Giá</label>
                <input type="text" name="price" placeholder="Nhập giá bán" class="signup-input" required>
                <label for="image" class="signup-label">Ảnh</label>
                <input name='image' type="file"  class="signup-input" required>
                <div style="margin: 20px 0;" class="signup-input">
                    <div >
                        <label class="signup-label" for="inputGroupSelect01">Phân loại</label>
                    </div>
                    <select class="custom-select"  name='cat'>
                        <option selected>Chọn loại...</option>
                        <?php foreach ($cat as $cate) { ?>
                            <option  value="<?php echo $cate->cat_id ?>">
                                <?php echo $cate->cat_name ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div style="margin: 20px 0;" class="signup-input">
                    <div >
                        <label class="signup-label" for="inputGroupSelect01">Hãng</label>
                    </div>
                    <select class="custom-select" name='man'>
                        <option selected>Choose...</option>
                        <?php foreach ($man as $man) { ?>
                            <option  value="<?php echo $man->man_id ?>">
                                <?php echo $man->man_name ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                </div>

                <div >
                    <label class="signup-label" for="inputGroupSelect01">Mô tả sản phẩm</label>
                    <textarea class="signup-input" name="description" required placeholder="Nhập mô tả sản phẩm" ></textarea>
                </div>
                
                <input  name="csrf" value="<?php new Csrf(); echo Csrf::get()?>" type="hidden">
                <input type="submit" name="addProduct" class="signup-submit" value="Thêm">
            </form>
        </div>
    </div>
</div>