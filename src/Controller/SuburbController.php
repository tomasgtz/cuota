<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suburb Controller
 *
 * @property \App\Model\Table\SuburbTable $Suburb
 *
 * @method \App\Model\Entity\Suburb[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SuburbController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SuburbConfiguration', 'Statuses']
        ];
        $suburb = $this->paginate($this->Suburb);

        $this->set(compact('suburb'));
    }

    /**
     * View method
     *
     * @param string|null $id Suburb id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suburb = $this->Suburb->get($id, [
            'contain' => ['SuburbConfiguration', 'Statuses', 'Amenities', 'Files', 'Handylinks', 'News', 'PaymentsNotificationsQueue', 'Phonebook', 'Requests', 'Streets', 'Surveys']
        ]);

        $this->set('suburb', $suburb);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suburb = $this->Suburb->newEntity();
        if ($this->request->is('post')) {
            $suburb = $this->Suburb->patchEntity($suburb, $this->request->getData());
            if ($this->Suburb->save($suburb)) {
                $this->Flash->success(__('The suburb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suburb could not be saved. Please, try again.'));
        }
        $suburbConfiguration = $this->Suburb->SuburbConfiguration->find('list', ['limit' => 200]);
        $statuses = $this->Suburb->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('suburb', 'suburbConfiguration', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Suburb id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suburb = $this->Suburb->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suburb = $this->Suburb->patchEntity($suburb, $this->request->getData());
            if ($this->Suburb->save($suburb)) {
                $this->Flash->success(__('The suburb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suburb could not be saved. Please, try again.'));
        }
        $suburbConfiguration = $this->Suburb->SuburbConfiguration->find('list', ['limit' => 200]);
        $statuses = $this->Suburb->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('suburb', 'suburbConfiguration', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Suburb id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suburb = $this->Suburb->get($id);
        if ($this->Suburb->delete($suburb)) {
            $this->Flash->success(__('The suburb has been deleted.'));
        } else {
            $this->Flash->error(__('The suburb could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
