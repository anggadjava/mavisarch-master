<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->config->item('nama_aplikasi'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <!-- JQuery UI Bootstrap -->
    <link type="text/css" href="<?php echo base_url(); ?>asset/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url(); ?>asset/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/js/google-code-prettify/prettify.css" rel="stylesheet">    
    <script src="<?php echo base_url(); ?>asset/js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>asset/js/google-code-prettify/prettify.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/docs.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

});

</script>    
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
          <a class="brand" href="<?php echo base_url(); ?>">
		  <img src="<?php echo base_url();?>asset/images/polri.gif" width="42" height="42">
		  <?php echo $this->config->item('nama_aplikasi'); ?> <?php echo $this->config->item('nama_instansi');?></a>
        </div>
      </div>
    </div>
    <div style="padding:50px;"></div>  
    <div class="container">
	<div class="row ">
		<div class="span4 offset4 well navbar-inverse" style="width:300px;">   
        <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab"><i class="icon-user"></i>&nbsp;Login</a></li>
        </ul>
        <div class="tabbable">
          <div class="tab-content">
            <div class="tab-pane active" id="A">
                <a name="login"></a>
                <?php echo form_open('login/index','class="navbar-form pull-right"'); ?>
                <fieldset>
                    <label for="username">Username</label>
                    <div class="div_text">
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input name="username" type="text" id="log inputIcon" value="" class="username span3" /></div>
                    </div>
                    <label for="password">Password</label>
                    <div class="div_text">
                        <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input name="password" type="password" id="pwd inputIcon" class="password span3" /></div>
                    </div>
            <div class="button_div pull-right"><button type="submit" class="btn btn-inverse "><i class="icon-share icon-white"></i> Log in</button></div>
                </fieldset>
                <?php echo form_close(); ?>
            </div>
        </div>
        </div>
	</div>
    </div>
    </div>
    <div class="container">
	<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php if($this->session->flashdata('result_login')) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo $this->session->flashdata('result_login'); ?>
	</div>
	<?php } ?>
    </div>
    
    <div class="navbar navbar-fixed-bottom">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <footer style="color:#fff;">
            <p><?php echo $this->config->item('copyright'); ?><br/>
            Programmer : <?php echo $this->config->item('programmer'); ?></p>
          </footer>
        </div>
      </div>
    </div>
  </body>
</html>
