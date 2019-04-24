<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
		jQuery(document).ready(function() {    
		   App.init();
           //TableManaged.init();
		});
	</script>
</head>
<?php if ( Yii::$app->user->isGuest ){ ?>
<body class="login">
<?php $this->beginBody() ?>
<div class="logo">
<img src="http://clients2.5stardesigners.net/ringreminderadmin/frontend/web/css/assets/img/logo-big.png" alt="" /> 
</div>
<div class="content">
<?= $content ?>
</div>
<div class="copyright">
CopyRight &copy; Ring Reminders <?= date('Y') ?>
</div>
<?php }else{ ?>
<body class="page-header-fixed">
<div class="header navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">
<a class="brand" href="index.php">
<img src="http://clients2.5stardesigners.net/ringreminderadmin/frontend/web/css/assets/img/logo.png" alt="logo" />
</a>
<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
<img src="assets/img/menu-toggler.png" alt="" />
</a>
<ul class="nav pull-right">
<li class="dropdown user">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
<img alt="" src="assets/img/avatar1_small.jpg" />
<span class="username">Logout</span>
<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu">
 <?php
$menuItems[] = '<li>'
. Html::beginForm(['/site/logout'], 'post')
. Html::submitButton(
'Logout (' . Yii::$app->user->identity->username . ')',
['class' => 'btn btn-link logout']
)
. Html::endForm()
. '</li>';
echo Nav::widget([
'options' => ['class' => 'navbar-nav navbar-right'],
'items' => $menuItems,
]);
?>
</ul>
</li>
</ul>
</div>
</div>
</div>
<div class="page-container">
<div class="page-sidebar nav-collapse collapse" style="display: block;">
<ul class="page-sidebar-menu">
<li>
<div class="sidebar-toggler hidden-phone"></div>
</li>
<li>&nbsp;</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'index'); ?>">
<a href="index.php">
<i class="icon-home"></i> 
<span class="title">Dashboard</span>
<span class="selected"></span>
</a>
</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'channels,allchannel,editchannels'); ?>">
<a href="javascript:;"><i class="icon-th"></i><span class="title">Channel</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li >
<a href="?r=site/allchannel">All Channel</a>
</li>
<li >
<a href="?r=site/channels">Add New Channel</a>
</li>
</ul>
</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'alltournament,tournaments,edittournament'); ?>">
<a href="javascript:;"><i class="icon-sitemap"></i><span class="title">Tournament</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li >
<a href="?r=site/alltournament">All Tournament</a>
</li>
<li >
<a href="?r=site/tournaments">Add New Tournament</a>
</li>
</ul>
</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'allboxer,boxers,editboxer'); ?>">
<a href="javascript:;"><i class="icon-user"></i><span class="title">Boxers</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li >
<a href="?r=site/allboxer">All Boxer</a>
</li>
<li >
<a href="?r=site/boxers">Add New Boxer</a>
</li>
</ul>
</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'allmatches,match,editmatch,viewallmatches'); ?>">
<a href="javascript:;"><i class="icon-table"></i><span class="title">Matches</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li >
<a href="?r=site/allmatches">All Matches</a>
</li>
<li >
<a href="?r=site/match">Add New Match</a>
</li>
</ul>
</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'notification'); ?>">
<a href="javascript:;"><i class="icon-gift"></i><span class="title">Notification</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li >
<a href="?r=site/notification">Send Notification</a>
</li>
</ul>
</li>
<li class="<?php echo Yii::$app->MyComponent->menuactive(Yii::$app->controller->action->id,'allusers'); ?>">
<a href="javascript:;"><i class="icon-bar-chart"></i><span class="title">Users</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li >
<a href="?r=site/allusers">All Site User</a>
</li>
</ul>
</li>
</ul>
</div>
<?= $content ?>
</div>
<div class="footer">
<div class="footer-inner">
<?= date('Y') ?> &copy; Ring Reminders.
</div>
<div class="footer-tools">
<span class="go-top">
<i class="icon-angle-up"></i>
</span>
</div>
</div>
<?php } ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
