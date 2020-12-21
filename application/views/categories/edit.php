
<div class="content">

    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Thay đổi</h1>
            <form action="<?php echo URL ?>/categories/update/<?php echo $category->cat_id ?>" method="POST">

                <div class="">
                    <label for="name" class="signup-label">Tên danh mục</label>
                    <input value="<?php echo $category->cat_name ?>" type="text" name="category" placeholder="nhập tên danh mục" class="signup-input" required>
                    <input type="hidden" name="cat_id" value="<?php echo $category->cat_id ?>">
                </div>
                <div class="">
                    <label for="name" class="signup-label">Mô tả danh mục</label>
                    <textarea name="description" class="signup-input" required placeholder="nhập mô tả danh mục"><?php echo $category->description ?></textarea>                
                </div>

                <div class="">
                    <input type="hidden" name="csrf" value="<?php new Csrf();
                    echo Csrf::get() ?>">     
                    <input class="signup-submit"  type="submit" name='editManufacture' value='Thay đổi'>
                </div>

            </form>
        </div>
    </div>
</div>