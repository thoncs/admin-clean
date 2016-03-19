<?php if ( ! defined('MONSTRA_ACCESS')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="<?php echo Site::url(); ?>" />
    <link rel="dns-prefetch" href="//www.google-analytics.com" />
    <link rel="dns-prefetch" href="//www.gravatar.com" />

    <title><?php echo Site::name(); ?> :: <?php echo __('Administration', 'system'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Monstra Admin Area" />
    <link rel="icon" href="<?php echo Option::get('siteurl'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo Option::get('siteurl'); ?>/favicon.ico" type="image/x-icon" />

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo Site::url(); ?>/admin/themes/clean/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Site::url(); ?>/public/assets/css/messenger.css" type="text/css" />
    <?php Stylesheet::add('public/assets/css/chocolat.css', 'backend', 2); ?>
    <?php Stylesheet::add('public/assets/css/bootstrap-fileupload.css', 'backend', 3); ?>
    <?php Stylesheet::add('public/assets/css/icheck-blue.css', 'backend', 4); ?>
    <?php Stylesheet::add('admin/themes/clean/css/clean.css', 'backend', 5); ?>
    <?php Stylesheet::load(); ?>

    <!-- JavaScripts -->
    <script src="<?php echo Site::url(); ?>/public/assets/js/jquery.min.js"></script>
    <script src="<?php echo Site::url(); ?>/public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo Site::url(); ?>/public/assets/js/messenger.min.js"></script>
    <script src="<?php echo Site::url(); ?>/public/assets/js/icheck.min.js"></script>
    <script src="<?php echo Site::url(); ?>/public/assets/js/moment.min.js"></script>
    <script src="<?php echo Site::url(); ?>/public/assets/js/daterangepicker.js"></script>
    
    <?php Javascript::add('public/assets/js/jquery.chocolat.js', 'backend', 3); ?>
    <?php Javascript::add('public/assets/js/bootstrap-fileupload.js', 'backend', 4); ?>
    <?php Javascript::add('admin/themes/clean/js/clean.js', 'backend', 5); ?>
    <?php Javascript::load(); ?>

    <?php Action::run('admin_header'); ?>

    <script>
        $(document).ready(function() {

          $('.chocolat').Chocolat({
              overlayColor          : '#000',
              leftImg               : "<?php echo Option::get('siteurl'); ?>/public/assets/img/chocolat/left.gif",
              rightImg              : "<?php echo Option::get('siteurl'); ?>/public/assets/img/chocolat/right.gif",
              closeImg              : "<?php echo Option::get('siteurl'); ?>/public/assets/img/chocolat/close.gif",
              loadingImg            : "<?php echo Option::get('siteurl'); ?>/public/assets/img/chocolat/loading.gif"
          });

          $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
          });

        });
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
  </head>

  <body class="page-<?php echo Request::get('id'); ?>">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#admin-navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Site::url(); ?>/admin/index.php?id=dashboard"><i class="glyphicon glyphicon-dashboard text-primary"></i></a>
          </div>

          <div class="collapse navbar-collapse" id="admin-navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-edit text-info"></i>  <?php echo __('Content', 'pages'); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php Navigation::draw('content'); ?>
                </ul>
              </li>
              <?php if (Session::exists('user_role') && in_array(Session::get('user_role'), array('admin'))) { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog text-info"></i>  <?php echo __('Extends', 'system'); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php Navigation::draw('extends'); ?>
                </ul>
              </li>
              <?php } ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-wrench text-info"></i>  <?php echo __('System', 'system'); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php Navigation::draw('system'); ?>
                </ul>
              </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
	          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-question-sign text-warning"></i>  <?php echo __('Help', 'system'); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="https://sheeringenuity.com/cms/documentation" target="_blank"><?php echo __('Documentation', 'system'); ?></a></li>
                    <li><a href="https://sheeringenuity.com/contact" target="_blank">Contact Support</a></li>
                </ul>
              </li>
              <li><a href="<?php echo Site::url(); ?>" target="_blank"><i class="glyphicon glyphicon-eye-open text-info"></i>&nbsp;&nbsp;<?php echo __('View Site', 'system'); ?></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user text-primary"></i>&nbsp;&nbsp;<?php echo Session::get('user_login'); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo Site::url(); ?>/admin/index.php?id=users&action=edit&user_id=<?php echo Session::get('user_id'); ?>"><?php echo __('Profile', 'users')?></a></li>
                  <li><a href="<?php echo Site::url(); ?>/admin/?logout=do"><?php echo __('Log Out', 'users'); ?></a></li>
                </ul>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <div class="container">
        <?php
            // Monstra Notifications
            Notification::get('success') AND Alert::success(Notification::get('success'));
            Notification::get('warning') AND Alert::warning(Notification::get('warning'));
            Notification::get('error')   AND Alert::error(Notification::get('error'));
        ?>

        <div id="update-monstra"></div>
        <div><?php Action::run('admin_pre_template'); ?></div>
        <div>
            <?php
                if ($plugin_admin_area) {
                    if (is_callable(ucfirst(Plugin::$plugins[$area]['id']).'Admin::main')) {
                        call_user_func(ucfirst(Plugin::$plugins[$area]['id']).'Admin::main');
                    } else {
                        echo '<div class="message-error">'.__('Plugin main admin function does not exist', 'system').'</div>';
                    }
                } else {
                    echo '<div class="message-error">'.__('Plugin does not exist', 'system').'</div>';
                }
            ?>
        </div>
        <div><?php Action::run('admin_post_template'); ?></div>
      </div>
      <div class="margin-top-1  margin-bottom-1 hidden-md"></div>
      <footer class="container visible-md visible-lg">
          <p class="pull-right">
            <span>
               © 2012 - <?php echo date('Y'); ?> <a href="https://sheeringenuity.com" target="_blank">Sheer Ingenuity, LLC</a> – CMS <?php echo __('Version', 'system'); ?> <?php echo Monstra::VERSION; ?>
            </span>
          </p>
      </footer>
</body>
</html>
