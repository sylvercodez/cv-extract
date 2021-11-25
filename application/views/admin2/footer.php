<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</div>
</div>
<script src="<?= asset2_url('script/jquery-1.10.2.min.js')?>"></script>
<script src="<?= asset2_url('script/jquery-migrate-1.2.1.min.js')?>"></script>
<script src="<?= asset2_url('script/jquery-ui.js')?>"></script>
<script src="<?= asset2_url('script/bootstrap.min.js')?>"></script>
<script src="<?= asset2_url('script/bootstrap-hover-dropdown.js')?>"></script>
<script src="<?= asset2_url('script/html5shiv.js')?>"></script>
<script src="<?= asset2_url('script/respond.min.js')?>"></script>
<script src="<?= asset2_url('script/jquery.metisMenu.js')?>"></script>
<script src="<?= asset2_url('script/jquery.slimscroll.js')?>"></script>
<script src="<?= asset2_url('script/jquery.cookie.js')?>"></script>
<script src="<?= asset2_url('script/icheck.min.js')?>"></script>
<script src="<?= asset2_url('script/custom.min.js')?>"></script>
<script src="<?= asset2_url('script/jquery.menu.js')?>"></script>
<script src="<?= asset2_url('script/pace.min.js')?>"></script>
<script src="<?= asset2_url('script/holder.js')?>"></script>
<script src="<?= asset2_url('script/responsive-tabs.js')?>"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.css" />
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= asset2_url('script/index.js')?>"></script>
<!--LOADING SCRIPTS FOR CHARTS-->
<?php if(uri_string()=='admin/dashboard' || uri_string()=='admin'):?>
<script>
 //BEGIN COUNTER FOR SUMMARY BOX
 counterNum($(".profit h4 span:first-child"), <?= (int)($incometoday/2)?>, <?= $incometoday?>, 50, 30);
    counterNum($(".income h4 span:first-child"), <?= (int)($compiledsum/2)?>, <?= $compiledsum?>, 100, 50);
    counterNum($(".task h4 span:first-child"), <?= (int)($compiledcount/2)?>, <?= $compiledcount?> , 1, 100);
    counterNum($(".visit h4 span:first-child"), <?=(int)($numberofusers/2)?>, <?=$numberofusers?>, 1, 500);
    function counterNum(obj, start, end, step, duration) {
        $(obj).html(start);
        setInterval(function(){
            var val = Number($(obj).html());
            if (val < end) {
                $(obj).html(val+step);
            } else {
                clearInterval();
            }
        },duration);
    }
    //END COUNTER FOR SUMMARY BOX
</script>
<?php endif;?>
<!--CORE JAVASCRIPT-->
<script src="<?= asset2_url('script/main.js')?>"></script>
<script>        (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-145464-12', 'auto');
    ga('send', 'pageview');


</script>
</body>
</html>