<!DOCTYPE html>  
<html lang="fr" style="background-color: #ccc;">
<head><?php
	$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="EduAppGT - School Management System" />
	<meta name="author" content="Web Studio Guatemala" />
	<title><?php echo get_phrase('Login'); ?> | <?php echo $system_title;?></title>
	<link href="style/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="style/css/animate.css" rel="stylesheet">
	<link href="style/css/style.css" rel="stylesheet">
  <link rel="icon" type="ico" sizes="16x16" href="style/images/favicon.ico">
	<link href="style/css/colors/blue.css" id="theme"  rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="assets/js/jquery-1.11.0.min.js"></script>
</head>
<body style="background-color: #ccc">
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<script type="text/javascript">var baseurl = '<?php echo base_url();?>';</script>


<section id="wrapper" style="background-color: #ccc">

      <div class="white-box" style="background-color: #ccc;text-align: center;" >
        
          <a href="index.php?admin/system_settings" class="btn btn-success btn-sm"><i class="ti ti-user"></i> Abonnement Mensuel</a>
          <button class="btn btn-warning btn-sm"><i class="ti ti-user"></i> Abonnement Annuel</button>
          <button class="btn btn-danger btn-sm"><i class="ti ti-user"></i> Achat Définitif</button>
        
      </div>
	<div class="login-box" style="border: 1px solid blue;border-radius: 10px;background-color: #ccc;margin-top: -2px">
    <div class="white-box" id="login">
	<form class="form-horizontal form-material" method="post" role="form" id="form_login">
		<h3 class="box-title m-b-20" style="text-align: center"><?php echo get_phrase('Veuillez Vous Connecter SVP'); ?></h3>
		

		<div class="form-group ">
          <div class="col-xs-12">
            <input type="text" class="form-control" name="user" id="user" placeholder="<?php echo get_phrase('Username'); ?>" autocomplete="off" >
          </div>
        </div>

         <div class="form-group">
          <div class="col-xs-12">
            <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo get_phrase('Password'); ?>" autocomplete="off">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Se souvenir de moi</label>
            </div>
         </div>
        </div>

        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo get_phrase('CONNEXION'); ?></button>
          </div>
        </div>
        <span style="color: #03a9f3;text-align: center;">Copyright &copy by DevChrono 2018</span>
</form>
</div>
</div>
</section>


<script src="assets/js/gsap/main-gsap.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/neon-login.js"></script>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="style/bower_components/jquery/dist/jquery.min.js"></script>
<script src="style/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="style/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="style/js/jquery.slimscroll.js"></script>
<script src="style/js/waves.js"></script>
<script src="style/js/custom.min.js"></script>
<script src="style/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>