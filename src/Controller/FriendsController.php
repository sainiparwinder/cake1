<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Friends Controller
 *
 * @property \App\Model\Table\FriendsTable $Friends
 *
 * @method \App\Model\Entity\Friend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FriendsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = ['contain' => ['Users', 'Budies']];
        $friends = $this->paginate($this->Friends);

        $this->set(compact('friends'));
    }

    /**
     * View method
     *
     * @param string|null $id Friend id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $friend = $this->Friends->get($id, ['contain' => ['Users']]);

        $this->set('friend', $friend);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $friend = $this->Friends->newEntity();
        if ($this->request->is('post')) {
            $friend = $this->Friends->patchEntity($friend, $this->request->getData());
            if ($this->Friends->save($friend)) {
                $this->Flash->success(__('The friend has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The friend could not be saved. Please, try again.'));
        }
        $budies = $this->Friends->Budies->find('list', ['limit' => 200]);
        $authUser = $users = $this->Auth->user('id');
        $this->set(compact('friend', 'budies','authUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Friend id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $friend = $this->Friends->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $friend = $this->Friends->patchEntity($friend, $this->request->getData());
            if ($this->Friends->save($friend)) {
                $this->Flash->success(__('The friend has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The friend could not be saved. Please, try again.'));
        }
        $users = $this->Friends->Users->find('list', ['limit' => 200]);
        $this->set(compact('friend', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Friend id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $friend = $this->Friends->get($id);
        if ($this->Friends->delete($friend)) {
            $this->Flash->success(__('The friend has been deleted.'));
        } else {
            $this->Flash->error(__('The friend could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function friendRequest() {
        $b = TableRegistry::get('Budies');

         $userData = $this->Auth->user();
          $fr = $this->Friends;
  
          $query = $fr->find('all', ['contain' => ['Budies','Users']])->where(['status'=>'accept',
        'OR' => [['user_id' => $this->Auth->user('id')], ['budy_id' => $this->Auth->user('id')]],]
    );

           echo json_encode(['req'=>$query]);

 
        exit;
    }
    public function addFriend() {
        $friend = $this->Friends->newEntity();
        if ($this->request->is('ajax')) {
             $keyword=$this->request->query('keyword');
              $userData = $this->Auth->user('id');
              $data = [
                'budy_id' => $keyword,
                'user_id' => $userData,
                'status' => 'pending'
            ];
            $friend = $this->Friends->patchEntity($friend, $data);
            $this->Friends->save($friend);
        }
    } 
    public function updateRequest(){
        if ($this->request->is('ajax')) {
            $status=$this->request->query('status');
            
            if($status=="accept"){
               $id=$this->request->query('id');
               $friend = $this->Friends->get($id);
               $friend->status=$status;
               $this->Friends->save($friend);
            }
            if($status=="delete"){
                $id=$this->request->query('id');
                $friend=$this->Friends->get($id);
                $this->Friends->delete($friend);
            }
        } 
        exit;      
    }
}
