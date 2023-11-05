<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Officers Controller
 *
 * @property \App\Model\Table\OfficersTable $Officers
 * @method \App\Model\Entity\Officer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OfficersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Levels'],
        ];
        $officers = $this->paginate($this->Officers);

        $this->set(compact('officers'));
    }

    /**
     * View method
     *
     * @param string|null $id Officer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $officer = $this->Officers->get($id, [
            'contain' => ['Levels', 'Responses'],
        ]);

        $this->set(compact('officer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $officer = $this->Officers->newEmptyEntity();
        if ($this->request->is('post')) {
            $officer = $this->Officers->patchEntity($officer, $this->request->getData());
            if ($this->Officers->save($officer)) {
                $this->Flash->success(__('The officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer could not be saved. Please, try again.'));
        }
        $levels = $this->Officers->Levels->find('list', ['limit' => 200])->all();
        $this->set(compact('officer', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Officer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $officer = $this->Officers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officer = $this->Officers->patchEntity($officer, $this->request->getData());
            if ($this->Officers->save($officer)) {
                $this->Flash->success(__('The officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer could not be saved. Please, try again.'));
        }
        $levels = $this->Officers->Levels->find('list', ['limit' => 200])->all();
        $this->set(compact('officer', 'levels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Officer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officer = $this->Officers->get($id);
        if ($this->Officers->delete($officer)) {
            $this->Flash->success(__('The officer has been deleted.'));
        } else {
            $this->Flash->error(__('The officer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
