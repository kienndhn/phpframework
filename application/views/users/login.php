<div class="content">
    <div class="container-form">
        <div class="signup">
            <h1 class="signup-heading">Đăng nhập</h1>
            <form action="<?php echo URL ?>/users/login" class="signup-form" method="POST" >
                <label for="username" class="signup-label">Email</label>
                <input type="text" name="email" class="signup-input" required placeholder="Nhập email của bạn">
                <label for="password" class="signup-label">Mật khẩu</label>
                <input type="password" name="password" class="signup-input" required placeholder="Nhập mật khẩu của bạn">
                <input type="submit" name="login" class="signup-submit">
            </form>
            <p class="signup-already">
                <span>Bạn chưa có tài khoản ?</span>
                <a href="<?php echo URL?>/users/register" class="signup-login-link">Đăng ký</a>
            </p>
            
            <p class="signup-already" style="padding-top: 20px">
                <span><a href="<?php echo URL?>/users/forgotPassword" class="signup-login-link">Quên mật khẩu?</a></span>
                
            </p>
        </div>
    </div>
</div>