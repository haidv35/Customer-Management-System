<div class="main-menu">
    <header class="header">
        <a href="/" class="logo"><i class="ico ti-rocket"></i>BT3</a>
        <button type="button" class="button-close fa fa-times js__menu_close"></button>
    </header>
    <!-- /.header -->
    <div class="content">

        <div class="navigation">
            <h5 class="title"><a href="/">Bảng điều khiển</a></h5>
            <!-- /.title -->
            <ul class="menu js__accordion">
                <li class="<?= (isset($route) && $route == "product_manager") ? "current active" : ""; ?>">
                    <a class="waves-effect" href="/product_manager"><i class="menu-icon ico ti-package"></i><span>Quản lý sản phẩm</span></a>
                </li>
                <li class="<?= (isset($route) && $route == "customer_manager") ? "current active" : ""; ?>">
                    <a class="waves-effect" href="/customer_manager"><i class="menu-icon fa fa-table"></i><span>Quản lý khách hàng</span></a>
                </li>
                <li class="<?= (isset($route) && $route == "transaction") ? "current active" : ""; ?>">
                    <a class="waves-effect" href="/transaction"><i class="menu-icon fa fa-cart-plus"></i><span>Quản lý giao dịch</span></a>
                </li>
                <li class="<?= (isset($route) && $route == "stat") ? "current active" : ""; ?>">
                    <a class="waves-effect" href="/stats"><i class=" menu-icon ti-stats-up"></i><span>Thống kê</span></a>
                </li>
            </ul>
            <!-- /.menu js__accordion -->
        </div>
        <!-- /.navigation -->
    </div>
    <!-- /.content -->
</div>
<!-- /.main-menu -->