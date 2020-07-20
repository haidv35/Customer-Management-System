/**
 * Theme: Ninja Admin Template
 * Author: NinjaTeam
 * Module/App: Chartist-Chart
 */

(function ($) {
    "use strict";

    var ChartistChart = {};

    $(document).ready(function () {
        if ($("#svg-animation-chartist-chart").length)
            ChartistChart.svgAnimation();
        return false;
    });

    ChartistChart = {
        svgAnimation: function () {
            $.ajax({
                url: "/dashboard/get_week_stats/",
                success: function (data) {
                    var chart = new Chartist.Line(
                        "#svg-animation-chartist-chart",
                        {
                            labels: [
                                "Thứ hai",
                                "Thứ ba",
                                "Thứ tư",
                                "Thứ năm",
                                "Thứ sáu",
                                "Thứ bảy",
                                "Chủ nhật",
                            ],
                            series: JSON.parse(data),
                        },
                        {
                            low: 0,
                            showArea: true,
                            showPoint: false,
                            fullWidth: true,
                            axisY: {
                                offset: 10,
                            },
                        }
                    );
                },
            });

            chart.on("draw", function (data) {
                if (data.type === "line" || data.type === "area") {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path
                                .clone()
                                .scale(1, 0)
                                .translate(0, data.chartRect.height())
                                .stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint,
                        },
                    });
                }
            });
            return false;
        },
    };
})(jQuery);
