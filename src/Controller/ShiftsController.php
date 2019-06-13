<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shifts Controller
 *
 * @property \App\Model\Table\ShiftsTable $Shifts
 *
 * @method \App\Model\Entity\Shift[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShiftsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Locations', 'Bills']
        ];
        $shifts = $this->paginate($this->Shifts);

        $this->set(compact('shifts'));
    }

    /**
     * View method
     *
     * @param string|null $id Shift id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*
        $shift = $this->Shifts->get($id, [
            'contain' => ['Users', 'Locations', 'Bills']
        ]);
*/
        $this->set('shift', $shift);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shift = $this->Shifts->newEntity();
        if ($this->request->is('post')) {
            $shift = $this->Shifts->patchEntity($shift, $this->request->getData());
            $user_id = $_POST["user_id"];
            $location_id = $_POST["location_id"];
            $bill_id = $_POST["bill_id"];

            $query1 = "INSERT INTO shifts(user_id, location_id, bill_id) VALUES ('$user_id', '$location_id', '$bill_id')";


            $username = "root";
            $password = "";
            $database = "happypc";

            $mysqli = new \mysqli("localhost", $username, $password, $database);

            if ($mysqli->query("$query1"))
            {
                $this->Flash->success(__('The shift have been saved'));
            }else{
                $this->Flash->error(__('The shift could not be saved. Error : '.mysqli_error($mysqli).' '));
            }
        }
        $users = $this->Shifts->Users->find('list', ['limit' => 200]);
        $locations = $this->Shifts->Locations->find('list', ['limit' => 200]);
        $bills = $this->Shifts->Bills->find('list', ['limit' => 200]);
        $this->set(compact('shift', 'users', 'locations', 'bills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shift id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shift = $this->Shifts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shift = $this->Shifts->patchEntity($shift, $this->request->getData());
            if ($this->Shifts->save($shift)) {
                $this->Flash->success(__('The shift has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shift could not be saved. Please, try again.'));
        }
        $users = $this->Shifts->Users->find('list', ['limit' => 200]);
        $locations = $this->Shifts->Locations->find('list', ['limit' => 200]);
        $bills = $this->Shifts->Bills->find('list', ['limit' => 200]);
        $this->set(compact('shift', 'users', 'locations', 'bills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shift id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {   
        //todo change get to post
        $user_id_orig = $_GET["u"];
        $location_id_orig = $_GET["l"];
        $bill_id_orig = $_GET["b"];

        $queryD = "DELETE FROM shifts WHERE user_id='$user_id_orig' AND location_id='$location_id_orig' AND bill_id='$bill_id_orig'";

        $username = "root";
        $password = "";
        $database = "happypc";

        $mysqli = new \mysqli("localhost", $username, $password, $database);

        if ($mysqli->query("$queryD"))
        {
            $this->Flash->success(__('The shift have been deleted'));
            return $this->redirect(['action' => 'index']);

        }else{
            $this->Flash->error(__('The shift could not be saved. Error : '.mysqli_error($mysqli).' '));
        }


        /* original cake.php lines
        $this->request->allowMethod(['post', 'delete']);
        $shift = $this->Shifts->get($id);
        if ($this->Shifts->delete($shift)) {
            $this->Flash->success(__('The shift has been deleted.'));
        } else {
            $this->Flash->error(__('The shift could not be deleted. Please, try again.'));
        }
        */
        return $this->redirect(['action' => 'index']);
    }

    public function viewk(){

    }

    public function editk(){

        if ($this->request->is('post')) {

            $user_id_orig = $_GET["u"];
            $location_id_orig = $_GET["l"];
            $bill_id_orig = $_GET["b"];

            $user_id = $_POST["user_id"];
            $location_id = $_POST["location_id"];
            $bill_id = $_POST["bill_id"];

            $query1 = "UPDATE shifts SET user_id='$user_id', location_id='$location_id', bill_id='$bill_id' WHERE user_id='$user_id_orig' AND location_id='$location_id_orig' AND bill_id='$bill_id'";


            $username = "root";
            $password = "";
            $database = "happypc";

            $mysqli = new \mysqli("localhost", $username, $password, $database);

            if ($mysqli->query("$query1"))
            {
                $this->Flash->success(__('The shift have been saved'));
                return $this->redirect(['action' => 'index']);

            }else{
                $this->Flash->error(__('The shift could not be saved. Error : '.mysqli_error($mysqli).' '));
            }
        }

    }
}
