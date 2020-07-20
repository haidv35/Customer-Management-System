$("#create_btn").on("click", function () {
    let firstname = $(".firstname").val();
    let lastname = $(".lastname").val();
    let username = $(".username").val();
    let password = $(".password").val();
    let password_confirm = $(".password_confirm").val();
    let email = $(".email").val();
    let phone = $(".phone").val();
    let address = $(".address").val();
    let dob = $(".datepicker-autoclose").val();
    $.ajax({
        url: "/customer_manager/create",
        type: "POST",
        data: {
            firstname: firstname,
            lastname: lastname,
            username: username,
            password: password,
            password_confirm: password_confirm,
            email: email,
            phone: phone,
            address: address,
            dob: dob,
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
    modal_edit.find(".username").val(data[1]);
    modal_edit.find(".firstname").val(data[2]);
    modal_edit.find(".lastname").val(data[3]);
    modal_edit.find(".datepicker-autoclose").val(data[4]);
    modal_edit.find(".email").val(data[5]);
    modal_edit.find(".phone").val(data[6]);
    modal_edit.find(".address").val(data[7]);
    $("#edit_modal_btn").on("click", function () {
        let firstname = modal_edit.find(".firstname").val();
        let lastname = modal_edit.find(".lastname").val();
        let username = modal_edit.find(".username").val();
        let password = modal_edit.find(".password").val();
        let password_confirm = modal_edit.find(".password_confirm").val();
        let email = modal_edit.find(".email").val();
        let phone = modal_edit.find(".phone").val();
        let address = modal_edit.find(".address").val();
        let dob = modal_edit.find(".datepicker-autoclose").val();
        $.ajax({
            url: "/customer_manager/update/" + id,
            type: "POST",
            data: {
                id: id,
                firstname: firstname,
                lastname: lastname,
                username: username,
                password: password,
                password_confirm: password_confirm,
                email: email,
                phone: phone,
                address: address,
                dob: dob,
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
            url: "/customer_manager/delete/" + id,
            type: "GET",
            success: function (res) {
                if (res && res == 404) {
                    title = "Có lỗi xảy ra. Không thể xóa khách hàng";
                    type = "error";
                } else {
                    title = "Xóa thành công";
                    type = "success";
                    $(".remodal").modal("hide");
                    // location.reload();
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
        url: "/customer_manager/export",
        type: "POST",
        success: function () {
            window.location = "/customer_manager/export";
        },
    });
});
