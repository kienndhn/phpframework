<div class="content">
    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Đăng ký</h1>
            <form action="#" class="signup-form" autocomplete="off">
                <label for="username" class="signup-label">Họ tên</label>
                <input type="text" id="username" name="username" class="signup-input" required placeholder="nhập Họ và Tên">
                
                <label for="email" class="signup-label">Email</label>
                <input type="text" id="email" name="email" class="signup-input" required placeholder="Nhập email">
                
                <label for="password" class="signup-label">Mật khẩu</label>
                <input type="password" id="password" name="password" class="signup-input" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Mật khẩu có tối thiểu 8 kí tự, gồm chữ hoa, chữ thường và số" required placeholder="Nhập mật khẩu">
               
                <label for="password2" class="signup-label">Xác nhận mật khẩu</label>
                <input type="password" id="password2" name="password2" class="signup-input" required placeholder="Xác nhận mật khẩu" onkeyup="checkPasswork(this.value, <?php echo URL?>)">
                <input type="submit" name='register' class="signup-submit" value="Đăng kí">
            </form>
            <p class="signup-already">
                <span>Bạn đã có tài khoản ?</span>
                <a href="<?php echo URL ?>/users/login" class="signup-login-link">Đăng nhập</a>
            </p>
        </div>
    </div>
</div>

<!--<form action="<?php echo URL ?>/users/register" method="POST">
    <div class="input-form">
        <h2 class='text-muted text-center'>Register</h2>
        <div class="">

            <div class="">
                <input class="input-text" type="text" name="full_name" placeholder="Full Name" class="form-control <?php echo isset($errName) ? 'is-invalid' : '' ?>">
                <?php echo isset($errName) ? '<div class="invalid-feedback">' . $errName . '</div>' : '' ?>
            </div>
            <div class="">
                <input class="input-text" type="text" name="email" placeholder="Email" class="form-control <?php echo isset($errEmail) ? 'is-invalid' : '' ?>">
                <?php echo isset($errEmail) ? '<div class="invalid-feedback">' . $errEmail . '</div>' : '' ?>
            </div>
            <div class="">
                <input class="input-text" type="password" name="password" placeholder="Password" class="form-control <?php echo isset($errPassword) ? 'is-invalid' : '' ?>">
                <?php echo isset($errPassword) ? '<div class="invalid-feedback">' . $errPassword . '</div>' : '' ?>
            </div>
            <div class="">
                <input class="input-text" type="password" name="password2" placeholder="Confirm Password" class="form-control <?php echo isset($errPassword2) ? 'is-invalid' : '' ?>">
                <?php echo isset($errPassword2) ? '<div class="invalid-feedback">' . $errPassword2 . '</div>' : '' ?>                                </div>
            <div class="btn">
                <input type="submit" name='register' value='Create Account' id="btn">
            </div>

        </div>
</form>    -->