<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 21/08/2020
 * Time: 1:49 PM
 */
    include ('element/meta.php');
    include('component/header-login.php');
?>
<div class="ajax-loading">
    <?php include_once('element/loading.php'); ?>
</div>
<main>
    <section id="wrap-login-admin">
        <div class="main-login bg-white">
            <h3 class="title-login-admin">Welcome <span class="brand">Vans admin</span></h3>
            <div class="form-admin-login">
                <form >
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="text" name="email" id="inputEmail" class="form-control">
                        <p class="invalid-feedback" id="errorEmail"></p>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Mật khẩu</label>
                        <input type="password" name="password" id="inputPassword" class="form-control">
                        <p class="invalid-feedback" id="errorPassword"></p>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"  name="rememberLogin" class="custom-control-input" id="remember">
                        <label class="custom-control-label" for="remember">Ghi nhớ tài khoản</label>
                    </div>
                    <p class="alert alert-danger" id="failed-login" style="display: none; margin-bottom: 0" ></p>
                    <button id="btnLogin" class="btn bg-orange" type="button">Đăng nhập</button>
                </form>
            </div>
        </div>
    </section>
</main>
<script>
    var url = "<?php echo Helpers::getUrlPage().'loginadmin/check'?>";
</script>
<?php
    include('component/footer-login.php');
    include ('element/script.php');
?>

