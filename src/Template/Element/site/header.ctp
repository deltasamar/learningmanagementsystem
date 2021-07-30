  <?php $url = $this->Url->build('/')?>
 <header id="header-part">
       
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="<?=$url?>client_template/images/all-icon/map.png" alt="icon"><span>127/5 Mark street, New york</span></li>
                                <li><img src="<?=$url?>client_template/images/all-icon/email.png" alt="icon"><span>info@yourmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-opening-time text-lg-right text-center">
                            <p>Opening Hours : Monday to Saturay - 8 Am to 5 Pm</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        
        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="<?=$this->Url->build('/home');?>">
                                <img src="<?=$url?>client_template/images/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="<?=$url?>client_template/images/all-icon/support.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <p>Need Help? call us free</p>
                                    <span>321 325 5678</span>
                                </div>
                            </div>
							<?php if (!$this->request->session()->read('Auth.User.id')) { ?>
                            <div class="button float-left">
							<a href="<?=$this->Url->build('/Users/login');?>" class="main-btn">Login</a>
                               
                            </div>
							 <div class="button float-left">
                                <a href="<?=$this->Url->build('/Users/registration');?>" class="main-btn">Sign up</a>
							
                            </div>
							<?php }else{?>
							<div class="button float-left">
                               <a href="<?=$this->Url->build('/Users/logout');?>" class="main-btn">Logout</a>
							
                            </div>
							<?php }?>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->
        
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        
										 <?php echo $this->Html->link('Home',
                            ['controller' => 'Home', 'action' => 'index', '_full' => true,'prefix'=>false],["class"=>$active=="home"?"active":"",'escape'=>false]);?>
                                       
                                    </li>
                                    <li class="nav-item">
                                         <?php echo $this->Html->link('About Us',
                            ['controller' => 'Home', 'action' => 'aboutUs', '_full' => true,'prefix'=>false],["class"=>$active=="about"?"active":"",'escape'=>false]);?>
                                    </li>
                                  
                                   
                                    <li class="nav-item">
                                        <?php echo $this->Html->link('Courses',
                            ['controller' => 'Courses', 'action' => 'index', '_full' => true,'prefix'=>false],["class"=>$active=="course"?"active":"",'escape'=>false]);?>
                                    </li>
									  <li class="nav-item">
                                       <?php echo $this->Html->link('Contact Us',
                            ['controller' => 'Home', 'action' => 'contactUs', '_full' => true,'prefix'=>false],["class"=>$active=="contact"?"active":"",'escape'=>false]);?>
                                    </li>
							<?php if ($this->request->session()->read('Auth.User.id')) { ?>
							<li class="nav-item">                                        
										<?php echo $this->Html->link('My account',
                            ['controller' => 'Courses', 'action' => 'mycourse', '_full' => true,'prefix'=>"account"],["class"=>$active=="account"?"active":"",'escape'=>false]);?>
                                        <ul class="sub-menu">
                                            <li><?php echo $this->Html->link('My Course',
                            ['controller' => 'Courses', 'action' => 'mycourse', '_full' => true,'prefix'=>"account"],["class"=>$active=="account"?"active":"",'escape'=>false]);?></li>
                                            <li><?php echo $this->Html->link('Host Course',
                            ['controller' => 'Courses', 'action' => 'index', '_full' => true,'prefix'=>"account"],["class"=>$active=="account"?"active":"",'escape'=>false]);?></li>
							
                                        </ul>
                                    </li>
							<?php }?>							
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>                                
                                <li><a href="<?=$url?>carts"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->