<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Cake\Http\Exception\ForbiddenException;
use Cake\View\Exception\MissingTemplateException;

use Cake\Filesystem\File;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Citizens'],
        ];
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => ['Citizens', 'Responses'],
        ]);

        $this->set(compact('report'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // ReportsController.php
    public function add()
    {
        $report = $this->Reports->newEmptyEntity();

        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());

            $uploadedFile = $this->request->getData('photo');

            if (!empty($uploadedFile)) {
                $fileName = time() . $uploadedFile->getClientFilename();
                $uploadedFile->moveTo(WWW_ROOT . 'img' . DS . 'photo' . DS . $fileName);

                $report->photo =  $fileName;
            }

            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the report.'));
        }

        $this->set('report', $report);
        $this->set('citizens', $this->Reports->Citizens->find('list'));
    }


    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());

            // Handle photo upload
            $uploadedFile = $this->request->getData('photo');
            if ($uploadedFile) {
                $photoPath = $this->uploadPhoto($uploadedFile);
                $report->photo = $photoPath;
            }

            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }

        $citizens = $this->Reports->Citizens->find('list', ['limit' => 200])->all();
        $this->set(compact('report', 'citizens'));
    }

    // Function to handle photo upload
    private function uploadPhoto($uploadedFile)
    {
        $targetPath = WWW_ROOT . 'img' . DS . 'photo' . DS ;

        $photoName = 'photo_' . time() . '.' . $uploadedFile->getClientFilename();

        // Move uploaded file to target path
        $uploadedFile->moveTo($targetPath . $photoName);

        // Return the path to be saved in the database
        return  $photoName;
    }





    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);

        // Hapus file foto jika ada
        if (!empty($report->photo)) {
            $file = new File(WWW_ROOT . $report->photo);
            $file->delete();
        }

        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete the report.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
