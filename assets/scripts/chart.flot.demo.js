/**
 * Theme: Ninja Admin Template
 * Author: NinjaTeam
 * Module/App: Flot-Chart
 */

(function ($) {
    "use strict";

    var FlotChart = {};

    $(document).ready(function () {
        if ($("#categories-flot-chart").length)
            FlotChart.module.categories.init();
        return false;
    });

    $(window).resize(function () {
        if ($("#categories-flot-chart").length)
            FlotChart.module.categories.init();
        return false;
    });

    FlotChart.module = {
        categories: {
            container: "#categories-flot-chart",
            data: [],
            init: function () {
                $.ajax({
                    url: "/stats/profit_chart",
                    success: function (data) {
                        $.plot(
                            FlotChart.module.categories.container,
                            [Object.entries(JSON.parse(data).data)],
                            {
                                colors: ["#f9c851"],
                                series: {
                                    bars: {
                                        show: true,
                                        barWidth: 0.6,
                                        align: "center",
                                    },
                                },
                                xaxis: {
                                    mode: "categories",
                                    tickLength: 0,
                                },
                            }
                        );
                    },
                });

                return false;
            },
        },
    };
})(jQuery);
