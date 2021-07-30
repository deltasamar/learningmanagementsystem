<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CartCourses Controller
 *
 * @property \App\Model\Table\CartCoursesTable $CartCourses
 *
 * @method \App\Model\Entity\CartCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartCoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Carts', 'Courese', 'Users'],
        ];
        $cartCourses = $this->paginate($this->CartCourses);

        $this->set(compact('cartCourses'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart Course id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartCourse = $this->CartCourses->get($id, [
            'contain' => ['Carts', 'Courese', 'Users'],
        ]);

        $this->set('cartCourse', $cartCourse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cartCourse = $this->CartCourses->newEntity();
        if ($this->request->is('post')) {
            $cartCourse = $this->CartCourses->patchEntity($cartCourse, $this->request->getData());
            if ($this->CartCourses->save($cartCourse)) {
                $this->Flash->success(__('The cart course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart course could not be saved. Please, try again.'));
        }
        $carts = $this->CartCourses->Carts->find('list', ['limit' => 200]);
        $courese = $this->CartCourses->Courese->find('list', ['limit' => 200]);
        $users = $this->CartCourses->Users->find('list', ['limit' => 200]);
        $this->set(compact('cartCourse', 'carts', 'courese', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartCourse = $this->CartCourses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartCourse = $this->CartCourses->patchEntity($cartCourse, $this->request->getData());
            if ($this->CartCourses->save($cartCourse)) {
                $this->Flash->success(__('The cart course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart course could not be saved. Please, try again.'));
        }
        $carts = $this->CartCourses->Carts->find('list', ['limit' => 200]);
        $courese = $this->CartCourses->Courese->find('list', ['limit' => 200]);
        $users = $this->CartCourses->Users->find('list', ['limit' => 200]);
        $this->set(compact('cartCourse', 'carts', 'courese', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartCourse = $this->CartCourses->get($id);
        if ($this->CartCourses->delete($cartCourse)) {
            $this->Flash->success(__('The cart course has been deleted.'));
        } else {
            $this->Flash->error(__('The cart course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
