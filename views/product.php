<!DOCTYPE html>
<?php include('layouts/header.php'); ?>
<!-- Data Tables -->
<link rel="stylesheet" href="/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
<!-- Datepicker -->
<link rel="stylesheet" href="/assets/plugin/datepicker/css/bootstrap-datepicker.min.css">
<!-- Remodal -->
<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css">
<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal-default-theme.css">

<body>
    <?php
    $route = "product_manager";
    include('layouts/navigation.php');
    ?>
    <?php include('layouts/navbar.php'); ?>
    <!-- /#message-popup -->

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">
                            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal_create">
                                Thêm sản phẩm mới
                            </button>
                            <button type="button" class="btn btn-sm btn-success" id="export_btn">
                                Xuất excel
                            </button>
                        </h4>
                        <!-- /.dropdown js__dropdown -->
                        <div class="table-responsive" cellspacing="0" data-pattern="priority-columns">
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th></th>
                                        <th></th>
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
        <!-- /.main-content -->
    </div>
    <div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="modal_create">
        <form data-toggle="validator" id="form_create">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal_create">Thêm sản phẩm mới</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            <label for="type" class="control-label">Loại</label>
                            <input type="text" data-error="Loại chưa chính xác" class="form-control type" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Tên</label>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control name" data-error="Tên chưa chính xác" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Giá</label>
                            <input type="text" class="form-control price" data-error="Giá chưa chính xác" pattern="^[0-9]{4,}$" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="des" class="control-label">Mô tả</label>
                            <input type="text" class="form-control des">
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Đóng</button>
                        <button type="button" id="create_btn" class="btn btn-primary btn-sm">Lưu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit">
        <form data-toggle="validator" id="form_update">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal_edit">Sửa sản phẩm </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            <label for="type" class="control-label">Loại</label>
                            <input type="text" data-error="Loại chưa chính xác" class="form-control type" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Tên</label>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control name" data-error="Tên chưa chính xác" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Giá</label>
                            <input type="text" class="form-control price" data-error="Giá chưa chính xác" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="des" class="control-label">Mô tả</label>
                            <input type="text" class="form-control des">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Đóng</button>
                            <button type="button" id="edit_modal_btn" class="btn btn-primary btn-sm">Lưu</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal_delete" aria-describedby="modal1Desc">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="remodal-content">
            <h2 id="modal_delete_title">Bạn chắc chắn muốn xóa sản phẩm này ?</h2>
        </div>
        <button data-remodal-action="cancel" class="remodal-cancel">Hủy bỏ</button>
        <button data-remodal-action="confirm" class="remodal-confirm">Đồng ý</button>
    </div>
    <!--/#wrapper -->
    <?php include('layouts/footer.php'); ?>
    <!-- Data Tables -->
    <script src="/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
    <!-- Responsive Table -->
    <script src="/assets/plugin/RWD-table-pattern/js/rwd-table.min.js"></script>
    <!-- <script src="/assets/scripts/datatables.demo.min.js"></script> -->
    <script src="/assets/scripts/datatables_product.js"></script>
    <!-- Validator -->
    <script src="/assets/plugin/validator/validator.min.js"></script>

    <!-- Datepicker -->
    <script src="/assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/scripts/form.demo.min.js"></script>
    <script src="/assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="/assets/scripts/sweetalert.init.min.js"></script>
    <!-- Remodal -->
    <script src="/assets/plugin/modal/remodal/remodal.min.js"></script>
    <script src="/assets/scripts/product.js"> </script>
</body>

</html>