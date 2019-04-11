<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersSurveysquestions Controller
 *
 * @property \App\Model\Table\UsersSurveysquestionsTable $UsersSurveysquestions
 *
 * @method \App\Model\Entity\UsersSurveysquestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersSurveysquestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $usersSurveysquestions = $this->UsersSurveysquestions->find('all')->where(['user_id' => $id])->contain(['Users', 'Surveysquestions'])->toArray();

        $this->set(compact('usersSurveysquestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Surveysquestion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersSurveysquestion = $this->UsersSurveysquestions->get($id, [
            'contain' => ['Users', 'Questions']
        ]);

        $this->set('usersSurveysquestion', $usersSurveysquestion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersSurveysquestion = $this->UsersSurveysquestions->newEntity();
        if ($this->request->is('post')) {
            $usersSurveysquestion = $this->UsersSurveysquestions->patchEntity($usersSurveysquestion, $this->request->getData());
            if ($this->UsersSurveysquestions->save($usersSurveysquestion)) {
                $this->Flash->success(__('The users surveysquestion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users surveysquestion could not be saved. Please, try again.'));
        }
        $users = $this->UsersSurveysquestions->Users->find('list', ['limit' => 200]);
        $questions = $this->UsersSurveysquestions->Questions->find('list', ['limit' => 200]);
        $this->set(compact('usersSurveysquestion', 'users', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Surveysquestion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersSurveysquestion = $this->UsersSurveysquestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersSurveysquestion = $this->UsersSurveysquestions->patchEntity($usersSurveysquestion, $this->request->getData());
            if ($this->UsersSurveysquestions->save($usersSurveysquestion)) {
                $this->Flash->success(__('The users surveysquestion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users surveysquestion could not be saved. Please, try again.'));
        }
        $users = $this->UsersSurveysquestions->Users->find('list', ['limit' => 200]);
        $questions = $this->UsersSurveysquestions->Questions->find('list', ['limit' => 200]);
        $this->set(compact('usersSurveysquestion', 'users', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Surveysquestion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersSurveysquestion = $this->UsersSurveysquestions->get($id);
        if ($this->UsersSurveysquestions->delete($usersSurveysquestion)) {
            $this->Flash->success(__('The users surveysquestion has been deleted.'));
        } else {
            $this->Flash->error(__('The users surveysquestion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
