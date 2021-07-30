<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>LMS</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  
  
  <?=$this->Html->css(['/client_template/css/slick','/client_template/css/animate','/client_template/css/nice-select','/client_template/css/jquery.nice-number.min','/client_template/css/magnific-popup','/client_template/css/bootstrap.min','/client_template/css/font-awesome.min','/client_template/css/default','/client_template/css/style','/client_template/css/responsive']);?>
  <?=$this->fetch('scriptTop');?>
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
   
   
  <!-- START PRELOADER -->
	
	<!-- END PRELOADER --> 
	<?=$this->element('site/header');?>
	<!-- START HEADER SECTION -->
	<!-- END HEADER SECTION -->
	<?= $this->Flash->render() ?>
	  <?= $this->fetch('content') ?>
    <!-- START FOOTER -->
   <?=$this->element('site/footer')?>
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
   <?=$this->Html->script(['/client_template/js/vendor/modernizr-3.6.0.min','/client_template/js/vendor/jquery-1.12.4.min','/client_template/js/bootstrap.min','/client_template/js/slick.min','/client_template/js/jquery.magnific-popup.min','/client_template/js/jquery.counterup.min','/client_template/js/jquery.nice-select.min','/client_template/js/jquery.nice-number.min','/client_template/js/jquery.countdown.min','/client_template/js/validator.min','/client_template/js/ajax-contact','/client_template/js/main']);?>

<?=$this->fetch('scriptBottom');?>
</body>
</html>
