<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Learning Management System|Admin';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
 
   

    <?= $this->fetch('meta') ?>
  
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
 <!-- Bootstrap Core CSS -->
 <?=$this->Html->css(['/admin_template/app-assets/fonts/feather/style.min','/admin_template/app-assets/fonts/simple-line-icons/style','/admin_template/app-assets/fonts/font-awesome/css/font-awesome.min','/admin_template/app-assets/vendors/css/perfect-scrollbar.min','/admin_template/app-assets/vendors/css/prism.min','/admin_template/app-assets/css/app']);?>
<?=$this->fetch('scriptTop');?>
<!-- jQuery -->

   
</head>
<body>
    <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <?=$this->element('header')?>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
    
      <div class="main-panel">
        
		<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
		<?=$this->element('footer')?>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
    
	
	
    <!-- END PAGE LEVEL JS-->
  </body>

 				
<?=$this->Html->script(['/admin_template/app-assets/vendors/js/core/jquery-3.2.1.min','/admin_template/app-assets/vendors/js/core/popper.min','/admin_template/app-assets/vendors/js/core/bootstrap.min','/admin_template/app-assets/vendors/js/perfect-scrollbar.jquery.min','/admin_template/app-assets/vendors/js/prism.min','/admin_template/app-assets/vendors/js/jquery.matchHeight-min','/admin_template/app-assets/vendors/js/screenfull.min','/admin_template/app-assets/vendors/js/chartist.min','/admin_template/app-assets/vendors/js/pace/pace.min','/admin_template/app-assets/js/app-sidebar','/admin_template/app-assets/js/notification-sidebar','/admin_template/app-assets/js/customizer']);?>
<?=$this->fetch('scriptBottom');?>
				
</html>
