<?php
namespace App\Controller\Account;

use App\Controller\Account\AppController;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 *
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $courses = $this->paginate($this->Courses->find()->where(["user_id"=>$this->Auth->user("id")]));

        $this->set(compact('courses'));
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('course', $course);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
			if(!empty($this->request->data['image']['name']))
			{
				$file = $this->request->data['image']; //put the data into a var for easy use

				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

				//only process if the extension is valid
				if(in_array($ext, $arr_ext))
				{
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					move_uploaded_file($file['tmp_name'], WWW_ROOT . 'upload' .DS.'course' .DS. $file['name']);

					//prepare the filename for database entry
					$this->request->data['image'] = $file['name'];
				}
			}
            $course = $this->Courses->patchEntity($course, $this->request->getData());
			$course->create_date=date("Y-m-d H:i:s");
			$course->user_id=$this->Auth->user('id');
			//pr($course);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $users = $this->Courses->Users->find('list', ['limit' => 200]);
        $this->set(compact('course', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			if(!empty($this->request->data['image']['name']))
			{
				$file = $this->request->data['image']; //put the data into a var for easy use

				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

				//only process if the extension is valid
				if(in_array($ext, $arr_ext))
				{
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					move_uploaded_file($file['tmp_name'], WWW_ROOT . 'upload' .DS.'course' .DS. $file['name']);

					//prepare the filename for database entry
					$this->request->data['image'] = $file['name'];
				}
			}
			else{
				
				$this->request->data['image'] = $course->image;
			}
			
			
			
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $users = $this->Courses->Users->find('list', ['limit' => 200]);
        $this->set(compact('course', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function mycourse(){
		$course=$this->Courses->UserCourses->find()->contain(["Courses","Courses.CourseContents"])->where(['UserCourses.user_id'=>$this->Auth->user("id")]);
		$this->set('course', $course);
	}
	public function getCourseList(){ 
   $this->autoRender=false;
	$jsonPost = $this->request->input('json_decode');
	 $course = $this->Courses->find()->contain(["CourseContents","UserCourses"])
	 ->join(['UserCourses' => [
								'table' =>  'user_courses',
								'type' => 'INNER',
								'conditions' => ['UserCourses.course_id = Courses.id', 'UserCourses.user_id'=>$this->Auth->user("id")]
								]
								])
						->where(['UserCourses.user_id'=>$this->Auth->user("id")]);
        $total = $course->count();
        $course = $this->paginate($course);
		
			 foreach ($course as $c) {
            $c->image=\Cake\Routing\Router::url('/upload/course/'.$c->image,true); 
					} 
		echo json_encode(['success' => true,
                'data' =>$course,
				'paging'=>$this->request->params['paging']['Courses']]);
	  
	  
	  
	  }
	  public function readCourse($slug=null){
		  $course = $this->Courses->find()->where(['slug'=>$slug])->first();
		  $this->set('course', $course);
	  }
	public function courseContent(){
		$this->autoRender=false;
		$jsonPost = $this->request->input('json_decode');
		$coursecontent = $this->Courses->CourseContents->find()->where(["course_id"=>$jsonPost->id]);
		 foreach ($coursecontent as $c) {
            $c->content_url=\Cake\Routing\Router::url('/upload/content/'.$c->content_url,true); 
					} 
		echo json_encode(['success' => true,
                'data' =>$coursecontent]);
	}
	public function addEditCourseContent($id=0){
		$this->autoRender=false;
		$jsonPost = $this->request->input('json_decode');
		if($id>0){
			$courseContent = $this->Courses->CourseContents->get($id);
			$this->request->data['content_url']=$courseContent->content_url;
			$edit=true;
		}else{
			$courseContent = $this->Courses->CourseContents->newEntity();
			$edit=false;
		}
		
        if ($this->request->is('post')) {
			try{
			if(!empty($this->request->data['content_url']['name']))
			{
				$file = $this->request->data['content_url']; //put the data into a var for easy use

				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				//$arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
				move_uploaded_file($file['tmp_name'], WWW_ROOT . 'upload' .DS.'content' .DS. $file['name']);

				$this->request->data['content_url'] = $file['name'];
			}
            $courseContent = $this->Courses->CourseContents->patchEntity($courseContent, $this->request->getData());
			
            if ($this->Courses->CourseContents->save($courseContent)) {
                
               $data=['success' => true,
                'data' =>$courseContent];
            }else{
				 $data=['success' => false,
                'data' =>$courseContent];
			}
			}catch (Exception $e) {
				 $data=['success' => false,
                'data' =>$courseContent];
			}
           
        }
        echo json_encode($data);
		
	}
}
