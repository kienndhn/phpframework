<?php// require_once ROOT ."/views/inc/header.php" ?>
<!--    <div class="  mt-4">
        <div class="row">
            <div class="col-10 col-md-8 m-auto">
            <?php
            
            echo  isset($err) ?  '<div class="text-danger">'.$err.'</div>' : '' 
             ?>
            <h5  class='text-center mb-4'>Type New Password</h5>
            <form method="POST" action='<?php echo URL ?>/users/resetPassword/<?php echo $vkey ?>'>
                <div class="input-group">
                    <input type="password"  name='password' class="form-control <?php echo  isset($errPassword) ?  'is-invalid' : '' ?>" placeholder='Enter new password'>
                    
                    <div class="input-group-btn">
                        <input type="submit" name='newPassword' value="New Password" class="btn btn-success">
                    </div>
                    <p><?php echo  isset($errPassword) ?  '<div class="invalid-feedback">'.$errPassword.'</div>' : '' ?></p>
                </div>
                
            </form>
            <small class="text-muted">Type new password and hit it in the login form</small>
            </div>
        </div>
    </div>-->
<div class="content">
    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Tạo mật khẩu mới</h1>
            
            <form action="<?php echo URL ?>/users/resetPassword/<?php echo $vkey ?>" class="signup-form" method="POST" >
                <label for="password" class="signup-label">Nhập mật khẩu mới</label>
                <input type="password" id="password" name="password" class="signup-input" required placeholder="Nhập mật khẩu mới">
                
                <label for="password2" class="signup-label">Xác nhận mật khẩu</label>
                <input type="password" id="password2" name="password2" class="signup-input" required placeholder="Xác nhận mật khẩu">
                <p id="err"></p>
                <button onclick="resetPwd('<?php echo URL ?>', '<?php echo $vkey ?>')" id="mySubmit" name="newPassword" class="signup-submit">
            </form>
            
            
            
        </div>
    </div>
</div>
<!--<form method="POST" action='<?php echo URL ?>/users/resetPassword/<?php echo $vkey ?>'>
    <div class="input-form">
        <div class="">
            <h2 class="text-muted text-center">New Password</h2>
            <small class="text-center">Enter your email to send an email for you, then check your email to can get new password</small>
        </div>
        <div>
            <input class="input-text" type="text" name='password' placeholder="New password">
        </div>
        <input type="submit" name='newPassword' value="Reset password" id="btn">
    </div>
</form>-->
<?php //require_once ROOT ."/views/inc/footer.php" ?>
