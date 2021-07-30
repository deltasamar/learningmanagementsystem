<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * InvoiceCourses Controller
 *
 * @property \App\Model\Table\InvoiceCoursesTable $InvoiceCourses
 *
 * @method \App\Model\Entity\InvoiceCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoiceCoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Invoices', 'Users'],
        ];
        $invoiceCourses = $this->paginate($this->InvoiceCourses);

        $this->set(compact('invoiceCourses'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Course id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceCourse = $this->InvoiceCourses->get($id, [
            'contain' => ['Invoices', 'Users'],
        ]);

        $this->set('invoiceCourse', $invoiceCourse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoiceCourse = $this->InvoiceCourses->newEntity();
        if ($this->request->is('post')) {
            $invoiceCourse = $this->InvoiceCourses->patchEntity($invoiceCourse, $this->request->getData());
            if ($this->InvoiceCourses->save($invoiceCourse)) {
                $this->Flash->success(__('The invoice course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice course could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoiceCourses->Invoices->find('list', ['limit' => 200]);
        $users = $this->InvoiceCourses->Users->find('list', ['limit' => 200]);
        $this->set(compact('invoiceCourse', 'invoices', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceCourse = $this->InvoiceCourses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceCourse = $this->InvoiceCourses->patchEntity($invoiceCourse, $this->request->getData());
            if ($this->InvoiceCourses->save($invoiceCourse)) {
                $this->Flash->success(__('The invoice course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice course could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoiceCourses->Invoices->find('list', ['limit' => 200]);
        $users = $this->InvoiceCourses->Users->find('list', ['limit' => 200]);
        $this->set(compact('invoiceCourse', 'invoices', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceCourse = $this->InvoiceCourses->get($id);
        if ($this->InvoiceCourses->delete($invoiceCourse)) {
            $this->Flash->success(__('The invoice course has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
