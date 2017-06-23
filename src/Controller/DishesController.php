<?php 

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
class DishesController extends AppController
{

    public function initialize()
    {

        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent

				
    }
	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];
		//  registered users can add Dishes and view index
		if (in_array($action, ['index', 'add','Dishes'])) {
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
		$dishesId = (int)$this->request->params['pass'][0];
		// check if the topic is owned by the user 
		if ($this->Dishes->isOwnedBy($dishesId, $user['id'])) {
		return true;
		}
		}
		return parent::isAuthorized($user);


	}

    public function index()
    {
		// find('all') get all records from Dishes model
		// We uses set() to pass data to view 
        $this->set('dishes', $this->Dishes->find('all'));
    }

    public function view($id)
    {
		// get() method get only one topic record using 
		// the $id paraameter is received from the requested url 
		// if request is /Dishes/view/5   the $id parameter value is 3
        $dishes = $this->Dishes->get($id);
        $this->set(compact('dishes'));
    }

    public function add()
    {
        $dishes = $this->Dishes->newEntity();
		//if the user Dishes data to your application, the POST request  informations are registered in $this->request   
        if ($this->request->is('post')) { // 
            $dishes = $this->Dishes->patchEntity($dishes, $this->request->data);
			$dishes->user_id = $this->Auth->user('id');
            if ($this->Dishes->save($dishes)) {
				// success() method of FlashComponent restore messages in session variable.
				// Flash messages are displayed in views 
                $this->Flash->success(__('Gerecht toegevoegd!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Gerecht toevoegen niet mogelijk'));
        }
        $this->set('dishes', $dishes);
    }
	public function edit($id = null)
	{
		$dishes = $this->Dishes->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Dishes->patchEntity($dishes, $this->request->data);
			if ($this->Dishes->save($dishes)) {
				$this->Flash->success(__('Het gerecht is aangepast!'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Niet mogelijk het gerecht te veranderen'));
		}
	
		$this->set('dishes', $dishes);
	}
	public function delete($id)
	{
		//if user wants to delete a record by a GET request ,allowMethod() method give an Exception as the only available request for deleting is POST
		$this->request->allowMethod(['post', 'delete']);
	
		$dishes = $this->Dishes->get($id);
		if ($this->Dishes->delete($dishes)) {
			$this->Flash->success(__('Het gerecht met id: {0} is verwijdered', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>