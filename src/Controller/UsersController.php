<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{

    public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash'); // Include the FlashComponent
		// Auth component allow visitors to access add action to register  and access logout action 
		$this->Auth->allow(['logout', 'add']);

    }
	
	public function login()
	{
		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			if ($user) {
				//
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again.'));
		}
	}
	
	public function logout(){
		$this->Flash->success('U bent uitgelogd');	
	return	$this->redirect($this->Auth->logout());
	}
	public function index()
	{
		$this->set('users',$this->Users->find('all'));		
	}
	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user',$user);
		
	}
	public function add()
	{
		$user = $this->Users->newEntity();
		if($this->request->is('post')) {
			$this->Users->patchEntity($user,$this->request->data);
			if($this->Users->save($user)){
            $this->Flash->success(__('Gebruiker is aangemaakt.'));
            return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Gebruiker aanmaken niet mogelijk'));
		}
		$this->set('user',$user);
	}
	public function edit($id)
	{
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Gebruiker updated'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Niet mogelijk om gebruiker te wijzigen'));
		}
	
		$this->set('user', $user);		
		
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('Gebruiker verwijderd.', h($id)));
			return $this->redirect(['action' => 'index']);
		}		
		
	}	
}


?>