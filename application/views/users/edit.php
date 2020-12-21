
<?php //require_once ROOT ."/views/inc/header.php"   ?>
<!--
<div class=" ">

            <div class="row">
                <div class="col-8  m-auto">
                    <div class="card my-4">
                        <div class="card-header">
                            <h3 class='text-muted text-center'>Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="////////<?php echo URL ?>/users/update/<?php echo $user->user_id ?>" method="POST">
                                <div class="form-group">
                                    <input value="////////<?php echo $user->full_name ?>" type="text" name="full_name" placeholder="Full Name" class="form-control <?php echo isset($errName) ? 'is-invalid' : '' ?>">
<?php echo isset($errName) ? '<div class="invalid-feedback">' . $errName . '</div>' : '' ?>
                                </div>
                                <div class="form-group">
                                    <input value="////////<?php echo $user->email ?>" type="text" name="email" placeholder="Email" class="form-control <?php echo isset($errEmail) ? 'is-invalid' : '' ?>">
<?php echo isset($errEmail) ? '<div class="invalid-feedback">' . $errEmail . '</div>' : '' ?>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="oldPass" value="////////<?php echo $user->password ?>">
                                    <input  type="password" name="password" placeholder="Password" class="form-control ////////<?php echo isset($errPassword) ? 'is-invalid' : '' ?>">
<?php echo isset($errPassword) ? '<div class="invalid-feedback">' . $errPassword . '</div>' : '' ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name='editProfile' value='Edit' class="btn btn-success btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->


<div class="content">
      <div class="container-form">
          <div class="signup">
              <h1 class="signup-heading">Thay đổi thông tin</h1>
              <form action="<?php echo URL?>/users/update/<?php echo $user->user_id ?>" method="POST" class="signup-form" method="POST" >
                  <label for="username" class="signup-label">Email</label>
                  <input type="text" name="email" class="signup-input" required placeholder="Nhập email" value="<?php echo $user->email?>">
                  <label for="username" class="signup-label">User name</label>
                  <input type="text" name="email" class="signup-input" required placeholder="Nhập tên" value="<?php echo $user->full_name?>">
                  <input type="hidden" name="oldPass" value="<?php echo $user->password ?>">
                  <label for="username" class="signup-label">Nhập mật khẩu mới</label>
                  <input type="password" name="password" placeholder="Password" class="signup-input">
                  <input type="submit" name="editProfile" class="signup-submit">
              </form>
          </div>
      </div>
  </div>

