<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
         'frontend/web/css/assets/plugins/bootstrap/css/bootstrap.min.css',
        'frontend/web/css/assets/plugins/bootstrap/css/bootstrap-responsive.min.css',
        'frontend/web/css/assets/plugins/font-awesome/css/font-awesome.min.css',
        'frontend/web/css/assets/css/style-metro.css',
        'frontend/web/css/assets/css/style.css',
        'frontend/web/css/assets/css/style-responsive.css',
        'frontend/web/css/assets/css/themes/default.css',
        'frontend/web/css/assets/plugins/uniform/css/uniform.default.css',
        'frontend/web/css/assets/plugins/select2/select2_metro.css',
        'frontend/web/css/assets/css/pages/login.css',
        'frontend/web/css/assets/plugins/gritter/css/jquery.gritter.css',
        'frontend/web/css/assets/plugins/bootstrap-daterangepicker/daterangepicker.css',
        'frontend/web/css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/jqvmap.css',
        'frontend/web/css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css',
        'frontend/web/css/assets/css/pages/tasks.css',
        'frontend/web/css/assets/css/jquery-ui.css',
        'frontend/web/css/assets/css/jquery-ui-timepicker-addon.css',
    ];
    public $js = [
        'frontend/web/css/assets/plugins/jquery-1.10.1.min.js',
        'frontend/web/css/assets/plugins/jquery-migrate-1.2.1.min.js',
        'frontend/web/css/assets/plugins/bootstrap/js/bootstrap.min.js',
        'frontend/web/css/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js',
        'frontend/web/css/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'frontend/web/css/assets/plugins/jquery.blockui.min.js',
        'frontend/web/css/assets/plugins/jquery.cookie.min.js',
        'frontend/web/css/assets/plugins/uniform/jquery.uniform.min.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/jquery.vmap.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
        'frontend/web/css/assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',
        'frontend/web/css/assets/plugins/flot/jquery.flot.js',
        'frontend/web/css/assets/plugins/flot/jquery.flot.resize.js',
        'frontend/web/css/assets/plugins/jquery.pulsate.min.js',
        'frontend/web/css/assets/plugins/bootstrap-daterangepicker/date.js',
        'frontend/web/css/assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
        'frontend/web/css/assets/plugins/gritter/js/jquery.gritter.js',
        'frontend/web/css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js',
        'frontend/web/css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js',
        'frontend/web/css/assets/plugins/jquery.sparkline.min.js',
        'frontend/web/css/assets/scripts/app.js',
        'frontend/web/css/assets/scripts/index.js',
        'frontend/web/css/assets/scripts/tasks.js',
        'frontend/web/css/assets/scripts/jquery-ui.js',
        'frontend/web/css/assets/scripts/jquery-ui-timepicker-addon.js',
        'frontend/web/css/assets/plugins/data-tables/jquery.dataTables.js',
        'frontend/web/css/assets/plugins/data-tables/DT_bootstrap.js',
        'frontend/web/css/assets/scripts/table-managed.js',
        'frontend/web/css/assets/plugins/select2/select2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
    );
}
