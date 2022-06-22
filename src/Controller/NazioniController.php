<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nazioni Controller
 *
 * @property \App\Model\Table\NazioniTable $Nazioni
 * @method \App\Model\Entity\Nazione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NazioniController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $nazioni = $this->Nazioni->find();

        $this->set(compact('nazioni'));
        $this->viewBuilder()->setOption('serialize', ['nazioni']);
    }

    /**
     * View method
     *
     * @param string|null $id Nazione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nazione = $this->Nazioni->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('nazione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nazione = $this->Nazioni->newEmptyEntity();
        if ($this->request->is('post')) {
            $nazione = $this->Nazioni->patchEntity($nazione, $this->request->getData());
            if ($this->Nazioni->save($nazione)) {
                $this->Flash->success(__('The nazione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nazione could not be saved. Please, try again.'));
        }
        $this->set(compact('nazione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nazione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nazione = $this->Nazioni->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nazione = $this->Nazioni->patchEntity($nazione, $this->request->getData());
            if ($this->Nazioni->save($nazione)) {
                $this->Flash->success(__('The nazione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nazione could not be saved. Please, try again.'));
        }
        $this->set(compact('nazione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nazione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nazione = $this->Nazioni->get($id);
        if ($this->Nazioni->delete($nazione)) {
            $this->Flash->success(__('The nazione has been deleted.'));
        } else {
            $this->Flash->error(__('The nazione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
