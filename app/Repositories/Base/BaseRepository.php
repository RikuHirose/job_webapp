<?php

namespace App\Repositories\Base;

class BaseRepository implements BaseRepositoryInterface
{

		public function all()
    {
      $model = $this->getBlankModel();

      return $model->all();
    }

    public function delete($model)
    {
      $model = $this->getBlankModel();

      return $model->delete();
    }

    public function create(Array $input)
    {
      $model = $this->getBlankModel();

      return $model->create($input);
    }

    public function firstOrCreate(Array $input)
    {
      return $model->firstOrCreate($input);
    }

    public function update($model, Array $input)
    {
      return $model->fill($input)->save();;
    }
}
