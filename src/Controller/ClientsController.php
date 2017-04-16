<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()	
	
    {
		//$activeLetter = isset($this->request->getParam('pass')('letter'));
		//pr($this->request->getParam('pass'));
		//pr($this->request->query['letter']);
		$activeLetter = isset($this->request->query['letter']) ? $this->request->query['letter'] : '';
		
		$letters =['a','b','c', 'd','e','f','g','h',
					'i','j','k','l','m','n','o','p',
					'q','r','s','t','u','v','w','x',
					'y','z'];
		
		
		$this->viewBuilder()->layout('client');
		
        $this->paginate = [
            'contain' => ['Users']
        ];
		
		$query = $this->Clients->find('all')
				->where(['Clients.name LIKE' => $activeLetter.'%']);
		$clients = $this->paginate($query, [
							'limit' => 2,
							'order' => [
								'Clients.name' => 'ASC'
							]
						]);
		
		//$this->set('clients', $this->paginate($query));
		
		
        //$clients = $this->paginate($this->Clients);
        //$clients = isset($activeLetter) ? $this->paginate($this->Clients, ['Clients.name LIKE' => $activeLetter.'%']) : $this->paginate($this->Clients);

        $this->set(compact('letters', 'clients'));
        $this->set('_serialize', ['clients']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		
		$this->viewBuilder()->layout('client_view');
        $client = $this->Clients->get($id, [
            'contain' => ['Users', 'Papers']
        ]);

        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		
		$this->viewBuilder()->layout('client_edit');
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
