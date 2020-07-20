<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">

        <div class="ico-item">
            <div class="switch">
                <input type="checkbox" id="switch-1" <?php echo (isset($_COOKIE['THEME']) && $_COOKIE['THEME'] == 'black') ? "checked" : "" ?>>
                <label for="switch-1" style="min-height:16px"></label>
            </div>
        </div>
        <div class="ico-item">
            <i class="ti-user"></i>
            <ul class="sub-ico-item">
                <li><a href="#">Cài đặt</a></li>
                <li><a class="js__logout" href="#">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="ico-item">
            <p><?= $_COOKIE['USER']; ?></p>
        </div>
    </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->