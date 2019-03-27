<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);

        $this->set('question', $question);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {            
			if($this->request->data('answer_type') == 4){
					if(empty($this->request->data('check_answer_A'))) {
						$this->Flash->success(__('Please enter Option A'));
						return $this->redirect(['action' => 'add']);
					}
					if(empty($this->request->data('check_answer_B'))) {
						$this->Flash->success(__('Please enter Option B'));
						return $this->redirect(['action' => 'add']);
					}
					if(empty($this->request->data('check_answer_C'))) {
						$this->Flash->success(__('Please enter Option C'));
						return $this->redirect(['action' => 'add']);
					}
					if(empty($this->request->data('check_answer_D'))) {
						$this->Flash->success(__('Please enter Option D'));
						return $this->redirect(['action' => 'add']);
					}
			} else if($this->request->data('answer_type') == 2) {
					if(empty($this->request->data('answer_A'))) {
						$this->Flash->success(__('Please enter Option A'));
						return $this->redirect(['action' => 'add']);
					}
					if(empty($this->request->data('answer_B'))) {
						$this->Flash->success(__('Please enter Option B'));
						return $this->redirect(['action' => 'add']);
					}
					if(empty($this->request->data('answer_C'))) {
						$this->Flash->success(__('Please enter Option C'));
						return $this->redirect(['action' => 'add']);
					}
					if(empty($this->request->data('answer_D'))) {
						$this->Flash->success(__('Please enter Option D'));
						return $this->redirect(['action' => 'add']);
					}
				}
			
			// pr($this->request->data);die;
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if($question->answer_type == 4){
                $question->answer_A = $_POST['check_answer_A'];
                $question->answer_B = $_POST['check_answer_B'];
                $question->answer_C = $_POST['check_answer_C'];
                $question->answer_D = $_POST['check_answer_D'];
            }
            //pr($question);die;
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $this->set(compact('question'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $this->set(compact('question'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
			$this->loadModel('UsersQuestions');
			$this->UsersQuestions->deleteAll(['question_id' => $id]);
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
