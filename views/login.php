<!DOCTYPE html>
<?php include('layouts/header.php'); ?>
<link rel="stylesheet" href="/assets/styles/custom.css">

<body id="particles-js">
    <!--  id="single-wrapper" -->
    <div>
        <form action="/login" method="POST" class="frm-single">
            <div class="inside">
                <div class="title"><strong>Đăng Nhập</strong></div>
                <!-- /.title -->
                <?php if (isset($_SESSION['errors'])) { ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['errors'];
                        unset($_SESSION['errors']); ?>
                    </div>
                <?php } ?>
                <div class="frm-input"><input type="text" name="username" placeholder="Tài khoản" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
                <!-- /.frm-input -->
                <div class="frm-input"><input type="password" name="password" placeholder="Mật khẩu" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
                <!-- /.frm-input -->
                <div class="clearfix margin-bottom-20">
                    <div class="pull-left">
                        <div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Ghi nhớ</label></div>
                        <!-- /.checkbox -->
                    </div>
                    <!-- /.pull-left -->
                    <div class="pull-right"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Quên mật khẩu?</a></div>
                    <!-- /.pull-right -->
                </div>
                <!-- /.clearfix -->
                <button type="submit" name="login" class="frm-submit">Đăng nhập<i class="fa fa-arrow-circle-right"></i></button>
                <!-- /.row -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
    </div>
    <!--/#single-wrapper -->
    <?php include('layouts/footer.php'); ?>
    <script src="/assets/scripts/particles.min.js"></script>
    <script src="/assets/scripts/custom-login.js"></script>
</body>

</html>