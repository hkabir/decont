<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Papers Controller
 *
 * @property \App\Model\Table\PapersTable $Papers
 */
class PapersController extends AppController
{


    public function dashboard()
    {
    // Set the layout
		$this->viewBuilder()->layout('dashboard');
		//$draftPapers = $this->Paper->find('all', ['conditions' => 'Paper.status_id=1']);
		// In a controller or table method.
		$draftPapers = $this->Papers->find('all')
			->where(['Papers.status_id = 1'])
			->limit(2)
			->contain(['Currencies', 'Users', 'Statuses', 'Clients', 'Providers']);

		//$draftPapers = $this->draftPapers();

		$openPapers = $this->Papers->find('all')
			->where(['Papers.status_id = 2'])
			->limit(2)			
			->contain(['Currencies', 'Users', 'Statuses', 'Clients', 'Providers']);
			
		//pr($openPapers);
		$this->set(compact('draftPapers', 'openPapers'));
    }
/*
	public function draftPapers() {
		return $this->Papers->find('all')
			->where(['Papers.status_id = 1'])
			->limit(2)
			->contain(['Currencies', 'Users', 'Statuses', 'Clients', 'Providers']);
	}
*/
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		// Set the layout
		$this->viewBuilder()->layout('refine_papers');

		$conditions = [];
		$session = $this->request->session();
		//$session->write('Search.category', '1234');

		$conditions = $session->read('conditions');	
		if($conditions){
			$conditions = $session->read('conditions');
		}
		// END: Check



		pr($conditions);
		//$conditions = [];
		
		$params = $this->request->data;
		//pr($params);
		
		
		

		if (!empty($params['paperId'])) 
		{
		  $conditions['Papers.paperId ='] = $params['paperId'];
		}

		if (!empty($params['status_id'])) 
		{
		  $conditions['Papers.status_id ='] = $params['status_id'];
		}

		if (!empty($params['user_id'])) 
		{
		  $conditions['Papers.user_id ='] = $params['user_id'];
		}
		
		if (!empty($params['client_id'])) 
		{
		  $conditions['Papers.client_id ='] = $params['client_id'];
		}

		//if (!empty($params['date'])) 
		//{
		//  $conditions['Papers.date ='] = $params['date'];
		//}
		
		if (!empty($params['day_start']['day']) && !empty($params['month_start']['month']) && !empty($params['year_start']['year'])) 
		{
		  $conditions['Papers.date >='] = $params['year_start']['year'].'-'.$params['month_start']['month'].'-'.$params['day_start']['day'];
		}

		if (!empty($params['day_stop']['day']) && !empty($params['month_stop']['month']) && !empty($params['year_stop']['year'])) 
		{
		  $conditions['Papers.date <='] = $params['year_stop']['year'].'-'.$params['month_stop']['month'].'-'.$params['day_stop']['day'];
		}
		
		
		pr($conditions);

		
        $this->paginate = [
            'contain' => ['Currencies', 'Users', 'Statuses', 'Clients', 'Providers', 'Categories']
        ];
        //$papers = $this->paginate($this->Papers);


		$query = $this->Papers->find('all')
				->where($conditions);
		//pr($query);
		$papers = $this->paginate($query, [
							'limit' => 2,
							'order' => [
								'Papers.paperId' => 'DESC'
							],
							'conditions' => $conditions
						]);


		
        $users = $this->Papers->Users->find('list', ['limit' => 200]);
        $statuses = $this->Papers->Statuses->find('list', ['limit' => 200]);
        $clients = $this->Papers->Clients->find('list', ['limit' => 200]);		
		

        $this->set(compact('papers','users','statuses','clients'));
        $this->set('_serialize', ['papers']);
    }

    /**
     * View method
     *
     * @param string|null $id Paper id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		    // Set the layout
		//$this->viewBuilder()->layout('paper_view');		
		
        $paper = $this->Papers->get($id, [
            'contain' => ['Currencies', 'Users', 'Statuses', 'Clients', 'Providers', 'Categories', 'Items']
        ]);

        $this->set('paper', $paper);
        $this->set('_serialize', ['paper']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paper = $this->Papers->newEntity();
        if ($this->request->is('post')) {
            $paper = $this->Papers->patchEntity($paper, $this->request->getData());
            if ($this->Papers->save($paper)) {
                $this->Flash->success(__('The paper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paper could not be saved. Please, try again.'));
        }
        $currencies = $this->Papers->Currencies->find('list', ['limit' => 200]);
        $users = $this->Papers->Users->find('list', ['limit' => 200]);
        $statuses = $this->Papers->Statuses->find('list', ['limit' => 200]);
        $clients = $this->Papers->Clients->find('list', ['limit' => 200]);
        $providers = $this->Papers->Providers->find('list', ['limit' => 200]);
        $categories = $this->Papers->Categories->find('list', ['limit' => 200]);
        $this->set(compact('paper', 'currencies', 'users', 'statuses', 'clients', 'providers', 'categories'));
        $this->set('_serialize', ['paper']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paper id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paper = $this->Papers->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paper = $this->Papers->patchEntity($paper, $this->request->getData());
            if ($this->Papers->save($paper)) {
                $this->Flash->success(__('The paper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paper could not be saved. Please, try again.'));
        }
        $currencies = $this->Papers->Currencies->find('list', ['limit' => 200]);
        $users = $this->Papers->Users->find('list', ['limit' => 200]);
        $statuses = $this->Papers->Statuses->find('list', ['limit' => 200]);
        $clients = $this->Papers->Clients->find('list', ['limit' => 200]);
        $providers = $this->Papers->Providers->find('list', ['limit' => 200]);
        $categories = $this->Papers->Categories->find('list', ['limit' => 200]);
        $this->set(compact('paper', 'currencies', 'users', 'statuses', 'clients', 'providers', 'categories'));
        $this->set('_serialize', ['paper']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paper id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paper = $this->Papers->get($id);
        if ($this->Papers->delete($paper)) {
            $this->Flash->success(__('The paper has been deleted.'));
        } else {
            $this->Flash->error(__('The paper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
