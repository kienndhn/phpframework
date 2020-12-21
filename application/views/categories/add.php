
<div class="content">

    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Thêm Danh mục mới</h1>
            <form action="<?php echo URL ?>/categories/add" method="POST">

                <div class="form-group">
                    <label for="name" class="signup-label">Tên danh mục</label>
                    <input type="text" name="category" placeholder="Enter category name" class="signup-input" required>
                </div>
                <div class="">
                    <label for="name" class="signup-label">Mô tả</label>
                    <textarea name="description" placeholder="Mô tả danh mục" class="signup-input" required></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="csrf" value="<?php new Csrf(); echo Csrf::get() ?>">
                    <input class="signup-submit" type="submit" name='addCategory' value='Thêm'>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
