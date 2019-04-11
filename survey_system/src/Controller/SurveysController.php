<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Surveys Controller
 *
 * @property \App\Model\Table\SurveysTable $Surveys
 *
 * @method \App\Model\Entity\Survey[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurveysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $surveys = $this->paginate($this->Surveys);

        $this->set(compact('surveys'));
    }

    /**
     * View method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $survey = $this->Surveys->get($id);

        $this->set('survey', $survey);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $survey = $this->Surveys->newEntity();
        if ($this->request->is('post')) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            // pr($this->request->getData());die;
            if($this->Surveys->save($survey)) {
                $this->Flash->success(__('The Survey has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Survey could not be saved. Please, try again.'));
        }
        $this->set(compact('survey'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $this->set(compact('survey'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $survey = $this->Surveys->get($id);
        if ($this->Surveys->delete($survey)) {
            $this->loadModel('Surveysquestions');
			$this->Surveysquestions->deleteAll(['survey_id' => $id]);
            $this->Flash->success(__('The survey has been deleted.'));
        } else {
            $this->Flash->error(__('The survey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
