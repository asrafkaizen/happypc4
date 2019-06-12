<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Computers Controller
 *
 * @property \App\Model\Table\ComputersTable $Computers
 *
 * @method \App\Model\Entity\Computer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComputersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $computers = $this->paginate($this->Computers);

        $this->set(compact('computers'));
    }

    /**
     * View method
     *
     * @param string|null $id Computer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $computer = $this->Computers->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('computer', $computer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $computer = $this->Computers->newEntity();
        if ($this->request->is('post')) {
            $computer = $this->Computers->patchEntity($computer, $this->request->getData());
            if ($this->Computers->save($computer)) {
                $this->Flash->success(__('The computer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The computer could not be saved. Please, try again.'));
        }
        $locations = $this->Computers->Locations->find('list', ['limit' => 200]);
        $this->set(compact('computer', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Computer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $computer = $this->Computers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $computer = $this->Computers->patchEntity($computer, $this->request->getData());
            if ($this->Computers->save($computer)) {
                $this->Flash->success(__('The computer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The computer could not be saved. Please, try again.'));
        }
        $locations = $this->Computers->Locations->find('list', ['limit' => 200]);
        $this->set(compact('computer', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Computer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $computer = $this->Computers->get($id);
        if ($this->Computers->delete($computer)) {
            $this->Flash->success(__('The computer has been deleted.'));
        } else {
            $this->Flash->error(__('The computer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
