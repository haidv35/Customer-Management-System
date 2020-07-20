<!DOCTYPE html>
<?php include('layouts/header.php'); ?>

<body>
    <?php include('layouts/navigation.php'); ?>
    <?php include('layouts/navbar.php'); ?>

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-lg-4 col-xs-12">
                    <div class="box-content bg-danger text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico ti-shopping-cart text-white"></i>
                            <h3 class="counter text-white"><?= $total_product_sold ?></h3>
                            <p class="text text-white">Sản phẩm đã bán</p>
                        </div>
                        <!-- .statistics-box .with-icon -->
                    </div>
                    <!-- /.box-content -->


                    <div class="box-content bg-warning text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico ti-user text-white"></i>
                            <h3 class="counter text-white"><?= $total_customer ?></h3>
                            <p class="text text-white">Tổng khách hàng</p>
                        </div>
                        <!-- .statistics-box .with-icon -->
                    </div>

                    <div class="box-content bg-info text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico small	fa fa-money"></i>
                            <h3 class="counter" id="total_revenue"><?= $total_revenue ?></h3>
                            <p class="text text-white">Tổng doanh thu</p>
                        </div>
                    </div>
                    <!-- /.box-content -->


                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-3 col-xs-12 -->
                <div class="col-lg-8 col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">Thống kê tuần</h4>
                        <!-- /.box-title -->
                        <div id="svg-animation-chartist-chart" class="chartist-chart" style="height: 314px"></div>
                        <!-- /#svg-animation-chartist-chart.chartist-chart -->
                    </div>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-9 col-xs-12 -->
            </div>
            <!-- /.row small-spacing -->

        </div>
        <!-- /.main-content -->
    </div>
    <!--/#wrapper -->

    <?php include('layouts/footer.php'); ?>
    <!-- Chartist Chart -->
    <script src="/assets/plugin/chart/chartist/chartist.min.js"></script>
    <script src="/assets/scripts/jquery.chartist.demo.js"></script>
    <script>
        let balance = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format($("#total_revenue").text());
        $("#total_revenue").text(balance);
    </script>
</body>

</html>