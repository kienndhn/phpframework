
<?php //require_once ROOT ."/views/inc/header.php"     ?>
<div class="content">
    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Thay đổi ảnh đại diện</h1>
            <form class="signup-form" enctype="multipart/form-data" action="<?php echo URL ?>/users/avatar/<?php echo Session::get('user_id') ?>" method="POST">

                <label class="signup-label" for="inputGroupFile01">Chọn ảnh đại diện</label>
                <input name='image' type="file" class="signup-input" id="inputGroupFile01">


                <input class="signup-submit" name='addAvatar' type="submit" value='Upload'>

                <small><?php echo isset($errImg) ? '<div class="text-danger">' . $errImg . '</div>' : '' ?></small>
            </form>
        </div>

    </div>
</div>


<?php
//require_once ROOT ."/views/inc/footer.php" ?>