<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

 
class CoursesController extends AppController
{
public $paginate = [
            'limit' => 6,
        ];
	 public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index','view','getCourseList']);
    }	
   public function index(){
	   
	     $this->_active_menu = 'course';
	   }
	public function view($slug=null){
	  $this->_active_menu = 'course';
	   $course = $this->Courses->find()->contain(["Users","CourseContents"])->where(["slug"=>$slug])->first();
		$course->image=\Cake\Routing\Router::url('/upload/course/'.$course->image,true); 
        $this->set('course', $course);
   }
  
   public function getCourseList(){ 
   $this->autoRender=false;
	$jsonPost = $this->request->input('json_decode');
	 $course = $this->Courses->find()->contain(["Users"]);
	 if(isset($jsonPost->search)){
		  $course= $course->where(["Courses.name LIKE \"%$jsonPost->search%\""]);
	 }
        $total = $course->count();
        $course = $this->paginate($course);
		
			 foreach ($course as $c) {
            $c->image=\Cake\Routing\Router::url('/upload/course/'.$c->image,true); 
					} 
		echo json_encode(['success' => true,
                'data' =>$course,
				'paging'=>$this->request->params['paging']['Courses']]);
	  
	  
	  
	  }

}
