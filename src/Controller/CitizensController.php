<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Citizens Controller
 *
 * @property \App\Model\Table\CitizensTable $Citizens
 * @method \App\Model\Entity\Citizen[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitizensController extends AppController
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
        $citizens = $this->paginate($this->Citizens);

        $this->set(compact('citizens'));
    }

    /**
     * View method
     *
     * @param string|null $id Citizen id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $citizen = $this->Citizens->get($id, [
            'contain' => ['Levels', 'Reports'],
        ]);

        $this->set(compact('citizen'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $citizen = $this->Citizens->newEmptyEntity();
        if ($this->request->is('post')) {
            $citizen = $this->Citizens->patchEntity($citizen, $this->request->getData());
            if ($this->Citizens->save($citizen)) {
                $this->Flash->success(__('The {0} has been saved.', 'Citizen'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Citizen'));
        }
        $levels = $this->Citizens->Levels->find('list', ['limit' => 200]);
        $this->set(compact('citizen', 'levels'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Citizen id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $citizen = $this->Citizens->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Validasi password hanya jika ada input untuk password baru
            if (!empty($this->request->getData('new_password'))) {
                $validator = new Validator();
                $validator
                    ->notEmptyString('old_password', 'Please enter your current password.')
                    ->notEmptyString('new_password', 'Please enter a new password.')
                    ->minLength('new_password', 6, 'Password must be at least 6 characters long.')
                    ->equals('new_password', 'confirm_password', 'Passwords do not match.');

                $errors = $validator->validate($this->request->getData());

                if (!empty($errors)) {
                    $this->Flash->error(__('Password update failed. Please check the errors.'));
                } else {
                    // Validasi password lama
                    $hashedPassword = new DefaultPasswordHasher();
                    if (!$hashedPassword->check($this->request->getData('old_password'), $citizen->password)) {
                        $this->Flash->error(__('Current password is incorrect.'));
                    } else {
                        // Enkripsi password baru
                        $citizen = $this->Citizens->patchEntity($citizen, [
                            'password' => $this->request->getData('new_password')
                        ]);

                        if ($this->Citizens->save($citizen)) {
                            $this->Flash->success(__('Password has been updated.'));
                        } else {
                            $this->Flash->error(__('Failed to save password changes.'));
                        }
                    }
                }
            }

            // Proses pembaruan data lainnya
            $citizen = $this->Citizens->patchEntity($citizen, $this->request->getData());
            if ($this->Citizens->save($citizen)) {
                $this->Flash->success(__('The {0} has been saved.', 'Citizen'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Citizen'));
        }

        $levels = $this->Citizens->Levels->find('list', ['limit' => 200]);
        $this->set(compact('citizen', 'levels'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Citizen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $citizen = $this->Citizens->get($id);
        if ($this->Citizens->delete($citizen)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Citizen'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Citizen'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
