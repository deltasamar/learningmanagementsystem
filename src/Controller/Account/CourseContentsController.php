<?php
namespace App\Controller\Account;

use App\Controller\Account\AppController;

/**
 * CourseContents Controller
 *
 * @property \App\Model\Table\CourseContentsTable $CourseContents
 *
 * @method \App\Model\Entity\CourseContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CourseContentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCourseContents'],
        ];
        $courseContents = $this->paginate($this->CourseContents);

        $this->set(compact('courseContents'));
    }

    /**
     * View method
     *
     * @param string|null $id Course Content id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseContent = $this->CourseContents->get($id, [
            'contain' => ['ParentCourseContents', 'ChildCourseContents'],
        ]);

        $this->set('courseContent', $courseContent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courseContent = $this->CourseContents->newEntity();
        if ($this->request->is('post')) {
			
            $courseContent = $this->CourseContents->patchEntity($courseContent, $this->request->getData());
            if ($this->CourseContents->save($courseContent)) {
                $this->Flash->success(__('The course content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course content could not be saved. Please, try again.'));
        }
        $parentCourseContents = $this->CourseContents->ParentCourseContents->find('list', ['limit' => 200]);
        $this->set(compact('courseContent', 'parentCourseContents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course Content id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courseContent = $this->CourseContents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseContent = $this->CourseContents->patchEntity($courseContent, $this->request->getData());
            if ($this->CourseContents->save($courseContent)) {
                $this->Flash->success(__('The course content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course content could not be saved. Please, try again.'));
        }
        $parentCourseContents = $this->CourseContents->ParentCourseContents->find('list', ['limit' => 200]);
        $this->set(compact('courseContent', 'parentCourseContents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course Content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courseContent = $this->CourseContents->get($id);
        if ($this->CourseContents->delete($courseContent)) {
            $this->Flash->success(__('The course content has been deleted.'));
        } else {
            $this->Flash->error(__('The course content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
