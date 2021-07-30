<?php
namespace App\Controller\Account;

use App\Controller\Account\AppController;

/**
 * UserCourses Controller
 *
 * @property \App\Model\Table\UserCoursesTable $UserCourses
 *
 * @method \App\Model\Entity\UserCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserCoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Courses'],
        ];
        $userCourses = $this->paginate($this->UserCourses);

        $this->set(compact('userCourses'));
    }

    /**
     * View method
     *
     * @param string|null $id User Course id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userCourse = $this->UserCourses->get($id, [
            'contain' => ['Users', 'Courses'],
        ]);

        $this->set('userCourse', $userCourse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userCourse = $this->UserCourses->newEntity();
        if ($this->request->is('post')) {
            $userCourse = $this->UserCourses->patchEntity($userCourse, $this->request->getData());
            if ($this->UserCourses->save($userCourse)) {
                $this->Flash->success(__('The user course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user course could not be saved. Please, try again.'));
        }
        $users = $this->UserCourses->Users->find('list', ['limit' => 200]);
        $courses = $this->UserCourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('userCourse', 'users', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userCourse = $this->UserCourses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userCourse = $this->UserCourses->patchEntity($userCourse, $this->request->getData());
            if ($this->UserCourses->save($userCourse)) {
                $this->Flash->success(__('The user course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user course could not be saved. Please, try again.'));
        }
        $users = $this->UserCourses->Users->find('list', ['limit' => 200]);
        $courses = $this->UserCourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('userCourse', 'users', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userCourse = $this->UserCourses->get($id);
        if ($this->UserCourses->delete($userCourse)) {
            $this->Flash->success(__('The user course has been deleted.'));
        } else {
            $this->Flash->error(__('The user course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
