<?php 

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
class CategoryController extends AppController
{

    public function initialize()
    {

        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent

				
    }
	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];
		//  registered users can add Category and view index
		if (in_array($action, ['index', 'add','Category'])) {
		return true;
		}
		// All other actions require an id or users cannot do it 
		if (empty($this->request->params['pass'][0])) {
			return false;
		}		
		
		// The owner of a topic can edit and delete it
		// the owner of topic is known by its id and user_id value of topic .
		if (in_array($this->request->action, ['edit', 'delete'])) {
		// get topic id from the request 	
		$categoryId = (int)$this->request->params['pass'][0];
		// check if the topic is owned by the user 
		if ($this->Category->isOwnedBy($categoryId, $user['id'])) {
		return true;
		}
		}
		return parent::isAuthorized($user);


	}

    public function index()
    {
		// find('all') get all records from Category model
		// We uses set() to pass data to view 
        $this->set('category', $this->Category->find('all'));
    }

    public function view($id)
    {
		// get() method get only one topic record using 
		// the $id paraameter is received from the requested url 
		// if request is /Category/view/5   the $id parameter value is 3
        $category = $this->Category->get($id);
        $this->set(compact('category'));
    }

    public function add()
    {
        $category = $this->Category->newEntity();
		//if the user Category data to your application, the POST request  informations are registered in $this->request   
        if ($this->request->is('post')) { // 
            $category = $this->Category->patchEntity($category, $this->request->data);
			$category->user_id = $this->Auth->user('id');
            if ($this->Category->save($category)) {
				// success() method of FlashComponent restore messages in session variable.
				// Flash messages are displayed in views 
                $this->Flash->success(__('Gerecht toegevoegd!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Gerecht toevoegen niet mogelijk'));
        }
        $this->set('category', $category);
    }
	public function edit($id = null)
	{
		$category = $this->Category->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Category->patchEntity($category, $this->request->data);
			if ($this->Category->save($category)) {
				$this->Flash->success(__('Het gerecht is aangepast!'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Niet mogelijk het gerecht te veranderen'));
		}
	
		$this->set('category', $category);
	}
	public function delete($id)
	{
		//if user wants to delete a record by a GET request ,allowMethod() method give an Exception as the only available request for deleting is POST
		$this->request->allowMethod(['post', 'delete']);
	
		$category = $this->Category->get($id);
		if ($this->Category->delete($category)) {
			$this->Flash->success(__('Het gerecht met id: {0} is verwijdered', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>