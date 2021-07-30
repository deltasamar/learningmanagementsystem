<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

 
class HomeController extends AppController
{
	  public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index','aboutUs','contactUs']);
    }

   public function index(){
	   $this->_active_menu = 'home';
	   }
	public function aboutUs(){
		 $this->_active_menu = 'about';
   
   }
   public function contactUs(){
		 $this->_active_menu = 'contact';
   
   }
}
