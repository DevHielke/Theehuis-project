<?php
namespace App\Controller;

use App\Controller\AppController;

class MenusController extends AppController
{

	public function initialize()
    {
	        parent::initialize();
        $this->loadComponent('Flash'); 
    }

    public function index()
    {
    	$this->set('menus', $this->Menus->find('all'));
    }

public function view($id)
	    {
	        $menu = $this->Menus->get($id);
	        $this->set('menus',$menu);
	    }

	 
	public function add()
	    {
	        $menus = $this->Menus->newEntity();
	        if ($this->request->is('post')) {
	            $menus = $this->Menus->patchEntity($menus, $this->request->data);
	if ($this->Menus->save($menus)) {
	                $this->Flash->success(__('Your Menu has been saved.'));
	return $this->redirect(['action' => 'index']);
	            }
	            $this->Flash->error(__('Unable to add your menu.'));
	        }
	        $this->set('menus', $menus);
	    }
	     
	    public function edit($id = null)
	    {
	        $menus = $this->Menus->get($id);
	        if ($this->request->is(['post', 'put'])) {
	            $this->Menus->patchEntity($menus, $this->request->data);
	            if ($this->Menus->save($menus)) {
	                $this->Flash->success(__('Your menu has been updated.'));
	                return $this->redirect(['action' => 'index']);
	            }
	            $this->Flash->error(__('Unable to update your menu.'));
	        }
	     
	        $this->set('menu', $menus);
	    }
	    
	    public function delete($id)
	    {
	        $this->request->allowMethod(['post', 'delete']);
	     
	        $menus = $this->Menus->get($id);
	        if ($this->Menus->delete($menus)) {
	            $this->Flash->success(__('The menu with id: {0} has been deleted.', h($id)));
	            return $this->redirect(['action' => 'index']);
	        }
	    } 
	}
	?>