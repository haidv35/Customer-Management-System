<!DOCTYPE html>
<?php include('layouts/header.php'); ?>

<body>
    <?php
    $route = "stat";
    include('layouts/navigation.php');
    ?>
    <?php include('layouts/navbar.php'); ?>

    <div id="wrapper">
        <div class="main-content">

            <div class="row small-spacing">
                <div class="col-lg-6 col-xs-12">
                    <div class="box-content">
                        <div id="3dpie-highcharts"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="box-content">
                        <h4 class="box-title">Thống kê lợi nhuận theo tháng</h4>
                        <!-- /.dropdown js__dropdown -->
                        <div id="categories-flot-chart" class="flot-chart" style="height: 320px"></div>
                        <!-- /#flot-chart-1.flot-chart -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>


        </div>
        <!-- /.main-content -->
    </div>
    <!--/#wrapper -->
    <?php include('layouts/footer.php'); ?>
    <!-- Hightcharts -->
    <script src="/assets/plugin/chart/highcharts/highcharts.js"></script>
    <script src="/assets/plugin/chart/highcharts/highcharts-3d.js"></script>
    <script src="/assets/plugin/chart/highcharts/themes/grid-light.js"></script>
    <script src="/assets/scripts/chart.3d.init.js"></script>

    <!-- Flot Chart -->
    <script src="assets/plugin/chart/plot/jquery.flot.min.js"></script>
    <script src="assets/plugin/chart/plot/jquery.flot.tooltip.min.js"></script>
    <script src="assets/plugin/chart/plot/jquery.flot.categories.min.js"></script>
    <script src="assets/plugin/chart/plot/jquery.flot.pie.min.js"></script>
    <script src="assets/plugin/chart/plot/jquery.flot.stack.min.js"></script>
    <script src="assets/scripts/chart.flot.demo.js"></script>
</body>

</html>