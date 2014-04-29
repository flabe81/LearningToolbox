<?php
// Set up the REDIRECT_URI -- which is just the URL for this file.
// define("REDIRECT_URI", 'http://localhost/podio-php/examples/server-auth.php');
define("REDIRECT_URI", 'http://learning-toolbox.glyn.in/php/podio-list-my-suggestions.php');

  // Include the config file and the Podio library
  require_once '../podio/config.php';
  require_once '../podio/PodioAPI.php';

  // Setup the API client reference. Client ID and Client Secrets are defined
  // as constants in config.php
  Podio::setup( CLIENT_ID, CLIENT_SECRET );
?>

<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>My Suggestions</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	
	<?php

  if (Podio::is_authenticated()) {
	
	$item_collection = PodioItem::filter( 7881683 );
	
	?>

<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="index.html">
            <img src="../assets/img/logo.png" alt="logo" class="img-responsive"/>
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="../assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE CONTENT-->
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comment-o"></i>My Suggestions
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="javascript:;" class="reload">
                                </a>
                                <a href="javascript:;" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                         Suggestion
                                    </th>
                                    <th>
                                         Nature
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                    	Attachment
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                	
									<?php
										foreach ($item_collection['items'] as $item ){
											$subject = $item->field('subject')->humanized_value();
											$nature = $item->field('nature-of-ticket')->humanized_value();
											$state = $item->field('state-of-ticket')->humanized_value();
											$id = $item->item_id;
											
									?>
									     <tr>
									       <td><?php echo $subject; ?></td>
									       <td><?php echo $nature; ?></td>
									       <td>
									       	<span class="label label-sm label-info">
									       		<?php echo $state; ?>
									       	</span>
									       </td>
									       <td>
									<?php
											$fullItem = PodioItem::get( $id );
											
											if (empty($fullItem->files)) {
												echo "no attachment";
											}
											else {
												$fileName = $fullItem->files[0]->name;
												$fileLink = $fullItem->files[0]->link;
												
												if (strlen($fileName) > 20) {
													$fileName = substr($fileName, 0, 16);
													$fileName .= "...";
											  	}
												
												?>
												<a href=<?php echo $fileLink ?>><?php echo $fileName ?></a>
												<?php
												
												// echo $fullItem->title;								
											}									
									?>
									       		
									       </td>
									     </tr>
									<?php
										}
									?>


<!--
                                <tr>
                                    <td>
                                         1
                                    </td>
                                    <td>
                                         Mark
                                    </td>
                                    <td>
                                         Otto
                                    </td>
                                    <td>
                                         makr124
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success">
                                             Approved
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         2
                                    </td>
                                    <td>
                                         Jacob
                                    </td>
                                    <td>
                                         Nilson
                                    </td>
                                    <td>
                                         jac123
                                    </td>
                                    <td>
                                        <span class="label label-sm label-info">
                                             Pending
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         3
                                    </td>
                                    <td>
                                         Larry
                                    </td>
                                    <td>
                                         Cooper
                                    </td>
                                    <td>
                                         lar
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning">
                                             Suspended
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         4
                                    </td>
                                    <td>
                                         Sandy
                                    </td>
                                    <td>
                                         Lim
                                    </td>
                                    <td>
                                         sanlim
                                    </td>
                                    <td>
                                        <span class="label label-sm label-danger">
                                             Blocked
                                        </span>
                                    </td>
                                </tr>
                               -->
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
         2014 &copy; Learning Layers. Design by Metronic.
    </div>
    <div class="footer-tools">
        <span class="go-top">
            <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>
	<?php
	
  }
  elseif (!isset($_GET['code'])) {
    // If $_GET['code'] is not set it means we are not trying to authenticate.
    // In that case just display a link to start the serv flow
    $auth_url = htmlentities(Podio::authorize_url(REDIRECT_URI));
    print "<a href='{$auth_url}'>Start authenticating</a>";
  }
  else {
    // Otherwise try to authenticate using the code provided.

    // $_GET['error'] is set if there was a problem
    if (!isset($_GET['error'])) {
      Podio::authenticate('authorization_code', array('code' => $_GET['code'], 'redirect_uri' => REDIRECT_URI));
      $access_token = Podio::$oauth->access_token;
      print "You have been authenticated. Wee!<br>";
      print "Your access token is {$access_token}<br><br>";
      print "Hang onto this access token along with the refresh token (store them in a session or similar) so you don't have to re-authenticate for every request.<br><br>";

      // Now you can start making API calls. E.g. get your user status
      $status = PodioUserStatus::get();
      print "Your user id is <b>{$status->user->id}</b> and you have <b>{$status->inbox_new}</b> unread messages in your inbox.<br><br>";
    }
    else {
      $error_description = htmlspecialchars($_GET['error_description']);
      print "There was a problem. The server said: {$error_description}<br>";
    }
  }
?>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="../assets/scripts/core/app.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
});
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
<!-- END BODY -->
</html>