$("#create_btn").on("click", function () {
    let type = $(".type").val();
    let name = $(".name").val();
    let price = $(".price").val();
    let des = $(".des").val();
    $.ajax({
        url: "/product_manager/create",
        type: "POST",
        data: {
            type: type,
            name: name,
            price: price,
            des: des,
        },
        success: function (res) {
            console.log(res);
            if (res && res == 404) {
                title = "Có lỗi xảy ra. Không thể thêm khách hàng mới";
                type = "error";
            } else {
                title = "Thêm mới thành công";
                type = "success";
                $("#form_create").trigger("reset");
                $("#modal_create").modal("hide");
                data_table.ajax.reload();
            }
            return (
                swal({
                    title,
                    type,
                    confirmButtonColor: "#880000",
                }),
                !1
            );
        },
    });
});

$("#example tbody").on("click", ".edit_btn", function () {
    let data = data_table.row($(this).parents("tr")).data();
    let modal_edit = $("#modal_edit");
    let id = data[0];
    modal_edit.find(".type").val(data[1]);
    modal_edit.find(".name").val(data[2]);
    modal_edit.find(".price").val(data[3]);
    modal_edit.find(".des").val(data[4]);
    $("#edit_modal_btn").on("click", function () {
        let type = modal_edit.find(".type").val();
        let name = modal_edit.find(".name").val();
        let price = modal_edit.find(".price").val();
        let des = modal_edit.find(".des").val();
        $.ajax({
            url: "/product_manager/update/" + id,
            type: "POST",
            data: {
                id: id,
                type: type,
                name: name,
                price: price,
                des: des,
            },
            success: function (res) {
                if (res && res == 404) {
                    title = "Có lỗi xảy ra. Không thể chỉnh sửa";
                    type = "error";
                } else {
                    title = "Chỉnh sửa thành công";
                    type = "success";
                    $("#form_update").trigger("reset");
                    $("#modal_edit").modal("hide");
                    data_table.ajax.reload();
                }
                return (
                    swal({
                        title,
                        type,
                        confirmButtonColor: "#880000",
                    }),
                    !1
                );
            },
        });
    });
});

$("#example tbody").on("click", ".delete_btn", function () {
    let data = data_table.row($(this).parents("tr")).data();
    let id = data[0];
    $(".remodal-confirm").on("click", function () {
        $.ajax({
            url: "/product_manager/delete/" + id,
            type: "GET",
            success: function (res) {
                if (res && res == 404) {
                    title = "Có lỗi xảy ra. Không thể xóa khách hàng";
                    type = "error";
                } else {
                    title = "Xóa thành công";
                    type = "success";
                    $(".remodal").modal("hide");
                    data_table.ajax.reload();
                }
                return (
                    swal({
                        title,
                        type,
                        confirmButtonColor: "#880000",
                    }),
                    !1
                );
            },
        });
    });
});
$("#export_btn").on("click", function () {
    $.ajax({
        url: "/product_manager/export",
        type: "POST",
        success: function () {
            window.location = "/product_manager/export";
        },
    });
});
