
<div class="content">

    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Thêm Hãng mới</h1>

            <form action="<?php echo URL ?>/manufactures/add" method="POST">

                    <label for="name" class="signup-label">Tên</label>
                    <input type="text" name="manufacture" placeholder="Nhập tên hãng" class="signup-input" required>
                   
                <div class="">
                    <label for="name" class="signup-label">Mô tả hãng</label>
                    <textarea name="description" placeholder="Mô tả hãng" class="signup-input"></textarea>
                              
                </div>
                <div class="form-group">
                    <input type="hidden" name="csrf" value="<?php new Csrf(); echo Csrf::get() ?>">
                    <input class="signup-submit" type="submit" name='addManufacture' value='Thêm'>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

