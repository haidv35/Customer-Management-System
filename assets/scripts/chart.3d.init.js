!(function (t) {
    "use strict";
    var e = {};
    t(document).ready(function () {
        return e.pie_3d(), !1;
    }),
        t(window).resize(function () {
            return !1;
        }),
        (e = {
            pie_3d: function () {
                let options = {
                    chart: {
                        type: "pie",
                        options3d: {enabled: !0, alpha: 45, beta: 0},
                    },
                    title: {
                        text: "Thống kê % số lượng sản phẩm đã bán",
                    },
                    tooltip: {
                        pointFormat:
                            "{series.name}: <b>{point.percentage:.1f}%</b>",
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: !0,
                            cursor: "pointer",
                            depth: 35,
                            dataLabels: {enabled: !0, format: "{point.name}"},
                        },
                    },
                    series: [{type: "pie", name: "Số lượng mua"}],
                };
                $.ajax({
                    url: "/stats/percent_chart",
                    success: function (data) {
                        // console.log(Object.entries(JSON.parse(data).data));
                        options.series[0].data = Object.entries(
                            JSON.parse(data).data
                        );
                        t("#3dpie-highcharts").highcharts(options);
                    },
                });
            },
        });
})(jQuery);
