<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Todo Controller
 *
 * @property \App\Model\Table\TodoTable $Todo
 * @method \App\Model\Entity\Todo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class TodoController extends AppController
{

    public function index()
    {
        $todo = $this->paginate($this->Todo);
        $response = $this->response 
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode($todo));
        return $response;
    }

    public function view($id = null)
    {
        $todo = $this->Todo
            ->find('all')
            ->where(['id' => $id])
            ->toArray();
        
        if($todo) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($todo));
        } else {
            return $this->response
                ->withStatus(404)
                ->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Nenhum registro encontrado']));
        }
    }

    public function add()
    {
            $todo = $this->Todo->newEmptyEntity();
            if ($this->request->is(['ajax', 'post'])){
            $todo = $this->Todo->patchEntity($todo, $this->request->getData());
                    if ($this->Todo->save($todo)) {
                        return $this->response
                            ->withType('application/json')
                            ->withStatus(200)
                            ->withStringBody(json_encode(['msg' => 'The Todo has been saved']));
                    } else {
                        return $this->response
                            ->withStatus(404)
                            ->withType('application/json')
                            ->withStringBody(json_encode(['msg' => 'The Todo could not be saved. Please, try again']));
            }
        }
    }

    public function edit($id = null)
    {
        if($this->request->is(['ajax', 'post'])){
            $todo = $this->Todo
                ->find('all')
                ->where(['id' => $id])
                ->first();

            $todo = $this->Todo->patchEntity($todo, $this->request->getData());
            if($this->Todo->save($todo)){
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode(['msg' => 'The Todo has been saved']));
            }
            return $this->response
                    ->withType('application/json')
                    ->withStatus(404)
                    ->withStringBody(json_encode(['msg' => 'The Todo could not be saved. Please, try again']));
        }
    }

    public function delete($id = null)
    {
        if ($this->request->allowMethod(['delete', 'get']));
            $todo = $this->Todo
                ->find('all')
                ->where(['id' => $id])
                ->first();
        if ($this->Todo->delete($todo)) {
            return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode(['msg' => 'The Todo has been delete']));
        } else {
            return $this->response
                    ->withType('application/json')
                    ->withStatus(404)
                    ->withStringBody(json_encode(['msg' => 'The Todo could not be saved. Please, try again']));
        }
    
    }

    public function finish($id = null)
    {
        if($this->request->is(['ajax', 'post'])){
            $todo = $this->Todo
                ->find('all')
                ->where(['id' => $id])
                ->first();

            $todo->finished = date('Y-m-d');
            if($this->Todo->save($todo)){
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode(['msg' => 'The Todo has been finish']));
            }
            return $this->response
                    ->withType('application/json')
                    ->withStatus(404)
                    ->withStringBody(json_encode(['msg' => 'The Todo could not be finish. Please, try again']));
        }
    }
}
