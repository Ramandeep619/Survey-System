<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             //use isAuthorized in Controllers
            'authorize' => ['Controller'],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized($user = null)
    {
        return true;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }

    public function beforeRender(Event $event)
    {
		if(strpos($this->request->url, '.json') !== false) {
			if($this->request->url == 'api/login.json') {
                // load user model
                $this->loadModel('Users');
                $hasher = new \Cake\Auth\DefaultPasswordHasher();
                $users = $this->Users->find()
                ->where(['Users.username' => $this->request->data('username'), 'Users.role' => 'user'])
                ->first();
                if(!empty($users)) {
                    if($hasher->check($this->request->data('password'), $users['password'])) {
						$this->response->statusCode(200);
                        $response['status'] = 'success';
                    } else {
						$this->response->statusCode(400);
                        $response['status'] = 'error';
                        $response['message'] = 'Invalid Username and password';
					}
                } else {
					$this->response->statusCode(400);
                    $response['status'] = 'error';
                    $response['message'] = 'Invalid Username and password';
                }
            
                $this->set('response', $response);
                $this->set('_serialize', array('response'));
			}
			if($this->request->url == 'api/questions.json') {
				$this->loadModel('Questions');
				$question = $this->Questions->find()
                ->all();//pr($question);die;
                if(!empty($question)) {
					$this->response->statusCode(200);
					$response['status'] = 'success';
					$response['data'] = $question;
				}
				$this->set('response', $response);
                $this->set('_serialize', array('response'));
				//echo json_encode($response);die;
			}
			if($this->request->url == 'api/users_questions.json' && $this->request->is('post')) {
                $this->loadModel('UsersQuestions');
                $data_array = $this->request->getData();

                foreach ($data_array as $entity) {
                $usersQuestion = $this->UsersQuestions->newEntity();
                $usersQuestion = $this->UsersQuestions->patchEntity($usersQuestion, $entity);
                $userquestion = TableRegistry::get('UsersQuestions');
                $userquestion->save($usersQuestion);
                }

                $this->response->statusCode(200);
                $response['status'] = 'success';

                $this->set('response', $response);
                $this->set('_serialize', array('response'));
			}
			if($this->request->url == 'api/users_questions.json' && $this->request->is('get')) {
                
                $this->loadModel('UsersQuestions');
                $questions = $this->UsersQuestions->find('all')->where(['user_id' => $this->request->query['user_id']])->contain(['Questions'])
                ->all();

                $userQuestions = array();
                // pr($questions);
                foreach($questions as $row){
                    $row["question"]["answer"] = $row["answer"];
                    $userQuestions[] =  $row["question"];
                }
                $this->response->statusCode(200);
                $response['status'] = 'success';
                $response['data'] = $userQuestions;
            
                
				//response
                $this->set('response', $response);
                $this->set('_serialize', array('response'));
			}
            
        } else {
			if ($this->Auth->user() && !$this->request->is('ajax')) {
				$this->viewBuilder()->setLayout('inner');
			}
		}
		


    }
}
