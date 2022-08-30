<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Records Controller
 *
 * @property \App\Model\Table\RecordsTable $Records
 * @method \App\Model\Entity\Record[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genres'],
        ];

        $query = $this->Records->find();

        $searchTerm_title = $this->request->getQuery('title');
        if (!empty($searchTerm_title)) {
            $query->where([
                'title LIKE' => '%' . $searchTerm_title . '%'
            ]);
        }

        $searchTerm_artist = $this->request->getQuery('artist');
        if (!empty($searchTerm_artist)) {
            $query->where([
                'artist LIKE' => '%' . $searchTerm_artist . '%'
            ]);
        }

        $searchTerm_year = $this->request->getQuery('year_(_no_later_than_)');
        if (!empty($searchTerm_year)) {
            $query->where([
                'year <=' => $searchTerm_year
            ]);
        }

        $searchTerm_genre = $this->request->getQuery('genre');
        if (!empty($searchTerm_genre)) {
            $query->where([
                'Genres.id LIKE' => '%' . $searchTerm_genre . '%'
            ]);
        }

        $genres = $this->Records->Genres->find('list', ['limit' => 200])->all();
        $this->set(compact('genres'));



        $records = $this->paginate($query);

        $this->set(compact('records'));
    }

    /**
     * View method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $record = $this->Records->get($id, [
            'contain' => ['Genres'],
        ]);

        $this->set(compact('record'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $record = $this->Records->newEmptyEntity();
        if ($this->request->is('post')) {
            $record = $this->Records->patchEntity($record, $this->request->getData());
            if ($this->Records->save($record)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The record could not be saved. Please, try again.'));
        }
        $genres = $this->Records->Genres->find('list', ['limit' => 200])->all();
        $this->set(compact('record', 'genres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $record = $this->Records->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $record = $this->Records->patchEntity($record, $this->request->getData());
            if ($this->Records->save($record)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The record could not be saved. Please, try again.'));
        }
        $genres = $this->Records->Genres->find('list', ['limit' => 200])->all();
        $this->set(compact('record', 'genres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $record = $this->Records->get($id);
        if ($this->Records->delete($record)) {
            $this->Flash->success(__('The record has been deleted.'));
        } else {
            $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
