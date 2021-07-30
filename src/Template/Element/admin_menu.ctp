  <?php $active=$this->request->params?>
  <div class="nav-container">
           
			
		<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li <?php if($active['action']=='dashboard'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    <!--<a href="/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>-->
                    <?php echo $this->Html->link('<i class="fa fa-home"></i><span>Dashboard</span>',
                            ['controller' => 'Users', 'action' => 'dashboard', '_full' => true,'prefix'=>'admin'],['escape'=>false]);?>
                </li>
                 
					
					
            </ul>	
			
          </div>
      