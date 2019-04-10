<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\Locator\TableLocator;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public $path;

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['login', 'add']);
        $this->path = Router::url("/", true);
    }

    public function test() {
        $str = '{"suggestions":[{"id":10,"email_phone":"ram","name":"Test 213","surname":"ram","address":"ram","profile_image":"ram","created":"2019-03-18T02:37:14+00:00","modified":"2019-03-24T05:35:16+00:00"},{"id":11,"email_phone":"test","name":"Test User","surname":"Test","address":"test","profile_image":"","created":"2019-03-24T05:33:56+00:00","modified":"2019-03-24T05:35:23+00:00"}]}';
        pr($str);
        $array = json_decode($str);
        pr($array);

        $json = json_encode($array);
        pr($json);
        die;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->viewBuilder()->setLayout('face');
        $userData = $this->Auth->user();
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('user_session', $userData);
        $query = $this->Users->find('all')->select(['profile_image'])->where(['id' => $this->Auth->user('id')]);
        $results = $query->toArray();
        $imageName = $results['0']['profile_image'];
        $urll = $this->path . $imageName;
        $this->set('url', $this->path);
        $this->set('imgName', $imageName);
    }

    public function login() {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, ['contain' => []]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                if ($id == $this->Auth->user('id')) {
                    $this->Auth->setUser($user);
                }
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function searchFriend() {
        $this->loadModel('Friends');
        $keyword = $this->request->getQuery('keyword');

        $query1 = $this->Friends->find('all')->select(['id', 'user_id', 'budy_id', 'status'])->where(['OR' => [['user_id' => $this->Auth->user('id')], ['budy_id' => $this->Auth->user('id')]],]);

        $searchlist = $this->Users->find('all')->select(['id', 'name', 'profile_image'])->where(['name Like' => '%' . $keyword . '%', 'id' => $this->Auth->user('id')])->all();
        sleep(1);
        echo json_encode(['suggestions' => $searchlist, 'suggestions1' => $query1]);
        exit;
    }

    public function profilePhoto() {
        if ($this->request->is('post')) {
            $file = $this->request->getData('file');
            if (!empty($file['name'])) {
                $fileName = $file['name'];
                $uploadFile = WWW_ROOT . '/img/uploads/' . $fileName;
                if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                    $user = $this->Users->get($this->Auth->user('id'));
                    $user->profile_image = 'img/uploads/' . $fileName;
                    $this->Users->save($user);
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
            }
        }
        exit;
    }

}
