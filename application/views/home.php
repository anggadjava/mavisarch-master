<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $this->config->item('nama_aplikasi'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Custom Styles -->
<link href="<?php echo base_url(); ?>asset/css/bootstrap-notify.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/styles/alert-notification-animations.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>asset/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.css" rel="stylesheet">

<link type="text/css" href="<?php echo base_url(); ?>asset/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url(); ?>asset/assets/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>asset/assets/css/docs.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/assets/js/google-code-prettify/prettify.css" rel="stylesheet">            

<script src="<?php echo base_url(); ?>asset/assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/assets/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/assets/js/google-code-prettify/prettify.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/assets/js/docs.js" type="text/javascript"></script>

</script>
<script src="<?php echo base_url(); ?>asset/js/ui.datepicker-id.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery-ui-sliderAccess.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery-ui-timepicker-addon.css"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery-ui-timepicker-addon.js"></script>

<!--notif-->
<script src="<?php echo base_url(); ?>asset/js/bootstrap-notify.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
});
$(function () {
    //####### Buttons
    $('button,.button,#sampleButton').button();
});
</script>
<style type="text/css">
table {
	margin-top:5px;
}
.table tr th {
	text-align:center;
	background-color:#0f3253;
	color:#fff;
}
.hilite {
	background-color:#FDEEF4;
}
</style>
  </head>
  <body>
  <div class='notifications bottom-right'></div>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>">
		  <img src="<?php echo base_url();?>asset/images/polri.gif" width="40" height="40" align="middle">
		  <?php echo $this->config->item('nama_aplikasi'); ?> <?php echo $this->config->item('nama_instansi'); ?>
          </a>
          <div class="nav-collapse collapse">
            <div class="btn-group pull-right">
			  <button class="btn btn-inverse"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('nama'); ?></button>
			  <button class="btn btn-inverse" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>index.php/ubah_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/petugas"><i class="icon-tasks"></i> Manajemen User</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/login/logout"><i class="icon-off"></i> Log Out</a></li>
			  </ul>
			</div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div style="padding:20px;"></div>

    <div class="container">
		<?php echo $this->load->view('menu');?>
        <div class="well">
        <?php echo $content;?>	
        </div>
    </div> <!-- /container -->
    <div style="padding:5px;"> </div>
    <div class="navbar navbar-fixed-bottom">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <footer style="color:#000;">
            <p><?php echo $this->config->item('copyright'); ?><br/>
            Programmer : <?php echo $this->config->item('programmer'); ?></p>
          </footer>
        </div>
      </div>
    </div>

</body>
</html>
