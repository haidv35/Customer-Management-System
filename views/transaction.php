<!DOCTYPE html>
<?php include('layouts/header.php'); ?>
<!-- Data Tables -->
<link rel="stylesheet" href="/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

<body>
    <?php
    $route = "transaction";
    include('layouts/navigation.php');
    ?>
    <?php include('layouts/navbar.php'); ?>
    <!-- /#message-popup -->

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-xs-12">
                    <div class="box-content">
                        <!-- /.dropdown js__dropdown -->
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tài khoản</th>
                                        <th>Họ Tên</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng số tiền</th>
                                        <th>Ngày mua</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-xs-12 -->
            </div>
        </div>
    </div>

    <?php include('layouts/footer.php'); ?>
    <!-- Data Tables -->
    <script src="/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
    <!-- Responsive Table -->
    <script src="/assets/plugin/RWD-table-pattern/js/rwd-table.min.js"></script>
    <!-- <script src="/assets/scripts/datatables.demo.min.js"></script> -->
    <script src="/assets/scripts/transaction_datatables.js"></script>
</body>

</html>