<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Responses Controller
 *
 * @property \App\Model\Table\ResponsesTable $Responses
 * @method \App\Model\Entity\Response[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResponsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Officers', 'Reports'],
        ];
        $responses = $this->paginate($this->Responses);

        $this->set(compact('responses'));
    }

    /**
     * View method
     *
     * @param string|null $id Response id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Responses->get($id, [
            'contain' => ['Officers', 'Reports'],
        ]);

        $this->set(compact('response'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $response = $this->Responses->newEmptyEntity();

        if ($this->request->is('post')) {
            $response = $this->Responses->patchEntity($response, $this->request->getData());

            if ($this->Responses->save($response)) {
                $this->Flash->success(__('The response has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The response could not be saved. Please, try again.'));
        }

        $officers = $this->Responses->Officers->find('list', ['limit' => 200])->all();
        $reports = $this->Responses->Reports->find('list', ['limit' => 200])->all();

        // Mendapatkan data pelapor (warga) untuk ditampilkan di formulir
        $citizens = $this->Responses->Reports->Citizens->find('list');

        $this->set(compact('response', 'officers', 'reports', 'citizens'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Response id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $response = $this->Responses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $response = $this->Responses->patchEntity($response, $this->request->getData());
            if ($this->Responses->save($response)) {
                $this->Flash->success(__('The response has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The response could not be saved. Please, try again.'));
        }
        $officers = $this->Responses->Officers->find('list', ['limit' => 200])->all();
        $reports = $this->Responses->Reports->find('list', ['limit' => 200])->all();
        $this->set(compact('response', 'officers', 'reports'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Response id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $response = $this->Responses->get($id);
        if ($this->Responses->delete($response)) {
            $this->Flash->success(__('The response has been deleted.'));
        } else {
            $this->Flash->error(__('The response could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
