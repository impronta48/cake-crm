<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Province Controller
 *
 * @property \App\Model\Table\ProvinceTable $Province
 * @method \App\Model\Entity\Provincia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvinceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $province = $this->Province->find();

        $this->set(compact('province'));
        $this->viewBuilder()->setOption('serialize', ['province']);
    }

    /**
     * View method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provincia = $this->Province->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('provincia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provincia = $this->Province->newEmptyEntity();
        if ($this->request->is('post')) {
            $provincia = $this->Province->patchEntity($provincia, $this->request->getData());
            if ($this->Province->save($provincia)) {
                $this->Flash->success(__('The provincia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provincia could not be saved. Please, try again.'));
        }
        $this->set(compact('provincia'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provincia = $this->Province->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provincia = $this->Province->patchEntity($provincia, $this->request->getData());
            if ($this->Province->save($provincia)) {
                $this->Flash->success(__('The provincia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provincia could not be saved. Please, try again.'));
        }
        $this->set(compact('provincia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provincia = $this->Province->get($id);
        if ($this->Province->delete($provincia)) {
            $this->Flash->success(__('The provincia has been deleted.'));
        } else {
            $this->Flash->error(__('The provincia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
