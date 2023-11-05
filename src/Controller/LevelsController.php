<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Levels Controller
 *
 * @property \App\Model\Table\LevelsTable $Levels
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LevelsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $levels = $this->paginate($this->Levels);

        $this->set(compact('levels'));
    }

    /**
     * View method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => ['Citizens', 'Officers'],
        ]);

        $this->set(compact('level'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $level = $this->Levels->newEmptyEntity();
        if ($this->request->is('post')) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The {0} has been saved.', 'Level'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Level'));
        }
        $this->set(compact('level'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The {0} has been saved.', 'Level'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Level'));
        }
        $this->set(compact('level'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $level = $this->Levels->get($id);
        if ($this->Levels->delete($level)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Level'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Level'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
