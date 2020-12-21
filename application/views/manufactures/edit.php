
<div class="content">

    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Thay đổi</h1>
            <form action="<?php echo URL ?>/manufactures/update/<?php echo $manufacture->man_id ?>" method="POST">

                <div class="">
                    <label for="name" class="signup-label">Tên</label>
                    <input value="<?php echo $manufacture->man_name ?>" type="text" required name="manufacture"  placeholder="Nhập tên hãng"  class="signup-input">
                    <input type="hidden" name="man_id" value="<?php echo $manufacture->man_id ?>">
                </div>
                <div class="">
                    <label for="name" class="signup-label">Mô tả hãng</label>
                    <textarea name="Mô tả" class="signup-input" required placeholder="nhập mô tả hãng"><?php echo $manufacture->description ?></textarea>
                    
                </div>

                <div class="">
                    <input type="hidden" name="csrf" value="<?php new Csrf(); echo Csrf::get()?>">
                    <input type="submit" name='editManufacture' value='Thay đổi' class="signup-submit">
                </div>

            </form>
        </div>
    </div>
</div>
