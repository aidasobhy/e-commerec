<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements \App\Http\Interfaces\RepositoryInterface
{

    protected $_model;

    public function __construct(Model $model)
    {
        $this->_model=$model;
    }

    public function all()
    {
       return $this->_model->all();
    }

    public function create(array $data)
    {
       return $this->_model->create($data);
    }

    public function update(array $data, $id)
    {
        $record=$this->find($id);
        return $record->update($data);

    }

    public function delete($id)
    {
        return $this->_model->destroy($id);
    }

    public function show($id)
    {
      return $this->_model->findOrFail($id);
    }

    public function setModel(Model $model)
    {
        $this->_model=$model;
        return $this;
    }

    public function getModel()
    {
        return $this->_model;
    }

    public function with($relations)
    {
          return $this->_model->with($relations);
    }

}
