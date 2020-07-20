<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý khách hàng</title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="/assets/styles/style.min.css">

    <!-- Themify Icon -->
    <link rel="stylesheet" href="/assets/fonts/themify-icons/themify-icons.css">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="/assets/plugin/waves/waves.min.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="/assets/plugin/sweet-alert/sweetalert.css">

    <!-- Percent Circle -->
    <link rel="stylesheet" href="/assets/plugin/percircle/css/percircle.css">

    <!-- Chartist Chart -->
    <link rel="stylesheet" href="/assets/plugin/chart/chartist/chartist.min.css">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="/assets/plugin/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

    <?php
    if (isset($_COOKIE['THEME'])) {
        echo ($_COOKIE['THEME'] == 'black') ? '<link rel="stylesheet" href="/assets/styles/style-black.min.css">' : '';
    }
    ?>

</head>