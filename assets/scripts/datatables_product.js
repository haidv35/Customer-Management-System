let data_table = $("#example").DataTable({
    ajax: {
        url: "/product_manager/json_data",
        dataSrc: "data",
    },
    columnDefs: [
        {
            targets: -2,
            defaultContent:
                '<button class="btn btn-xs edit_btn" data-toggle="modal" data-target="#modal_edit""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>',
        },
        {
            targets: -1,
            defaultContent:
                '<button type="button" class="btn btn-xs delete_btn" data-remodal-target="remodal"><i class="fa fa-trash" aria-hidden="true"></i></button>',
        },
    ],
    fixedColumns: true,
});
