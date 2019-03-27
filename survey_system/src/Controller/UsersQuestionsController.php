<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersQuestions Controller
 *
 * @property \App\Model\Table\UsersQuestionsTable $UsersQuestions
 *
 * @method \App\Model\Entity\UsersQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersQuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $usersQuestions = $this->UsersQuestions->find('all')->where(['user_id' => $id])->contain(['Users', 'Questions'])->toArray();
        //pr($usersQuestions);die;
        $this->set('usersQuestions', $usersQuestions);
    }

    /**
     * View method
     *
     * @param string|null $id Users Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersQuestion = $this->UsersQuestions->get($id, [
            'contain' => ['Users', 'Questions']
        ]);

        $this->set('usersQuestion', $usersQuestion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersQuestion = $this->UsersQuestions->newEntity();
        if ($this->request->is('post')) {
            $usersQuestion = $this->UsersQuestions->patchEntity($usersQuestion, $this->request->getData());
            if ($this->UsersQuestions->save($usersQuestion)) {
                $this->Flash->success(__('The users question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users question could not be saved. Please, try again.'));
        }
        $users = $this->UsersQuestions->Users->find('list', ['limit' => 200]);
        $questions = $this->UsersQuestions->Questions->find('list', ['limit' => 200]);
        $this->set(compact('usersQuestion', 'users', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersQuestion = $this->UsersQuestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersQuestion = $this->UsersQuestions->patchEntity($usersQuestion, $this->request->getData());
            if ($this->UsersQuestions->save($usersQuestion)) {
                $this->Flash->success(__('The users question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users question could not be saved. Please, try again.'));
        }
        $users = $this->UsersQuestions->Users->find('list', ['limit' => 200]);
        $questions = $this->UsersQuestions->Questions->find('list', ['limit' => 200]);
        $this->set(compact('usersQuestion', 'users', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersQuestion = $this->UsersQuestions->get($id);
        if ($this->UsersQuestions->delete($usersQuestion)) {
            $this->Flash->success(__('The users question has been deleted.'));
        } else {
            $this->Flash->error(__('The users question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
