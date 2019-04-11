<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Surveysquestions Controller
 *
 * @property \App\Model\Table\SurveysquestionsTable $Surveysquestions
 *
 * @method \App\Model\Entity\Surveysquestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurveysquestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Surveys']
        ];
        $surveysquestions = $this->paginate($this->Surveysquestions);

        $this->set(compact('surveysquestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Surveysquestion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $surveysquestion = $this->Surveysquestions->get($id, [
            'contain' => ['Surveys']
        ]);

        $this->set('surveysquestion', $surveysquestion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $surveysquestions = $this->Surveysquestions->newEntity();
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
            $surveysquestions = $this->Surveysquestions->patchEntity($surveysquestions, $this->request->getData());
            if($surveysquestions->answer_type == 4){
                $surveysquestions->answer_A = $_POST['check_answer_A'];
                $surveysquestions->answer_B = $_POST['check_answer_B'];
                $surveysquestions->answer_C = $_POST['check_answer_C'];
                $surveysquestions->answer_D = $_POST['check_answer_D'];
            }
            //pr($surveysquestions);die;
            if ($this->Surveysquestions->save($surveysquestions)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $surveys = $this->Surveysquestions->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('surveysquestion', 'surveys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Surveysquestion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $surveysquestion = $this->Surveysquestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $surveysquestion = $this->Surveysquestions->patchEntity($surveysquestion, $this->request->getData());
            if ($this->Surveysquestions->save($surveysquestion)) {
                $this->Flash->success(__('The survey question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The surveysquestion could not be saved. Please, try again.'));
        }
        $surveys = $this->Surveysquestions->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('surveysquestion', 'surveys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Surveysquestion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $surveysquestion = $this->Surveysquestions->get($id);
        if ($this->Surveysquestions->delete($surveysquestion)) {
			$this->loadModel('UsersSurveysquestions');
			$this->UsersSurveysquestions->deleteAll(['question_id' => $id]);
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
