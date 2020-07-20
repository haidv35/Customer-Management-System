let data_table = $("#example").DataTable({
    ajax: {
        url: "/transaction/json_data",
        dataSrc: "data",
    },
});
