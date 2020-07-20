<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
		<script src="/assets/script/html5shiv.min.js"></script>
		<script src="/assets/script/respond.min.js"></script>
	<![endif]-->
<!-- 
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/scripts/jquery.min.js"></script>
<script src="/assets/scripts/modernizr.min.js"></script>
<script src="/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/plugin/nprogress/nprogress.js"></script>
<script src="/assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="/assets/plugin/waves/waves.min.js"></script>

<script src="/assets/scripts/main.min.js"></script>

<script>
    function a() {
        $.ajax({
            url: "/dashboard/theme/black",
            type: "GET",
            success: function(res) {
                location.reload();
            }
        });
    }

    function b() {
        $.ajax({
            url: "/dashboard/theme/white",
            method: "GET",
            success: function(res) {
                location.reload();
            }
        });
    }

    $("#switch-1").on('click', function() {
        if ($(this).is(":checked")) {
            a();
        } else if ($(this).is(":not(:checked)")) {
            b();
        }
        // return (this.tog = !this.tog) ? a() : b();
    });
</script>