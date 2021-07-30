<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

 
class CartsController extends AppController
{

   public function index(){
	   
	    $this->set('active','course');
	   }
	public function view(){
	 $this->set('active','course');
   }
   public function add($slug = null) {
			 $courses = TableRegistry::get('Courses');
			 
            $course = $courses->findBySlug($slug)->contain(['Users'])->first();
			
			
        if ($this->Auth->user('id')) {
            $query = $this->Carts->find('all')->where(['user_id' => $this->Auth->user('id')]);
				
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $this->Carts->newEntity();
                $cart->user_id = $this->Auth->user('id');
				$cart->net_price =0;
				$cart->gross_price =0;
				$cart->create_date =date("Y-m-d H:i:s");
				
                if ($this->Carts->save($cart)) {
                    $cart = $this->Carts->get($cart->id);
                    $cart->invoice_no = "INV" . $cart->id;
                    $this->Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Courses', 'action' => 'view', $slug]);
                }
            }

            $cartcourse = $this->Carts->CartCourses->find('all')->where(['cart_id' => $cart->id, 'course_id' => $course->id]);
            if ($cartcourse->count() == 0) {

                $cart->net_price = $cart->net_price + $course->price;
				$cart->gross_price = $cart->gross_price + $course->price;
                $this->Carts->save($cart);
                $cartcourse = $this->Carts->CartCourses->newEntity();
                $cartcourse->cart_id = $cart->id;
                $cartcourse->course_id = $course->id;
				$cartcourse->user_id = $course->user_id;
                $cartcourse->net_price = $course->price;
				$cartcourse->gross_price=$course->price;
				$cartcourse->create_date =date("Y-m-d H:i:s");
               $this->Carts->CartCourses->save($cartcourse);

                $this->Flash->success(__('The cart has been saved.'));
                return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Already in your cart'));
               return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
        } 
    }
	public function allCourseInCart() {
		$this->autoRender = FALSE;
		$cart = $this->Carts->find()->contain(['CartCourses','CartCourses.Courses','CartCourses.Users'])->where(['user_id'=>$this->Auth->user('id')]);
		if($cart->count()>0){
		echo json_encode(['success' => 1, 'data' => $cart]);
		} else {
		echo json_encode(['success' => 2, 'data' => []]);
		}
	}

	public function remove() {
			$postData= $this->request->input('json_decode');

			$cartcourse = $this->Carts->CartCourses->get($postData->id);
			$cart_id=$cartcourse->cart_id;
			$this->Carts->CartCourses->delete($cartcourse);
			$cartcourse = $this->Carts->CartCourses->find('all')->where(['cart_id' => $cart_id]);
			if ($cartcourse->count() == 0) {
			$carts = $this->Carts->get($cart_id);
			$this->Carts->delete($carts);
			}
			echo json_encode(['success' => 1, 'msg' => 'Delete course from cart'], ENT_QUOTES);
			$this->autoRender = FALSE;
		}
    public function checkout(){
		
		$carts = $this->Carts->find()->contain(["CartCourses"])->where(["Carts.user_id"=>$this->Auth->user("id")]);
		
		if($carts->count()>0){
			$carts=$carts->first();
			$invoices=TableRegistry::get('Invoices');
			$userCourses=TableRegistry::get('UserCourses');
			$invoice=$invoices->newEntity();
				$invoice->user_id = $this->Auth->user('id');
				$invoice->net_price =$carts->net_price;
				$invoice->gross_price =$carts->gross_price;
				$invoice->create_date =date("Y-m-d H:i:s");
			if($invoices->save($invoice)){
				foreach($carts->cart_courses as $c){
					$invoiceCourse = $invoices->InvoiceCourses->newEntity();
					$invoiceCourse->invoice_id=$invoice->id;
					$invoiceCourse->course_id = $c->id;
					$invoiceCourse->user_id = $c->user_id;
					$invoiceCourse->net_price = $c->net_price;
					$invoiceCourse->gross_price=$c->gross_price;
					$invoiceCourse->invoice_no=$c->invoice_no;
					$invoiceCourse->course_id=$c->course_id;
					$invoiceCourse->create_date =date("Y-m-d H:i:s");
					
					$invoices->InvoiceCourses->save($invoiceCourse);
					$userCourse=$userCourses->newEntity();
					$userCourse->user_id=$this->Auth->user("id");
					$userCourse->course_id=$invoiceCourse->course_id;
					$userCourses->save($userCourse);
					
					$this->Carts->CartCourses->delete($c);
				}
				$this->Carts->delete($carts);
			}
		}
			echo json_encode(['success' => 1, 'msg' => 'Success'], ENT_QUOTES);
			$this->autoRender = FALSE;	
		
	}                                     
                 
}
