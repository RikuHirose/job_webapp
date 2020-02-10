<?php

namespace App\Repositories\Base;

interface BaseRepositoryInterface
{
		public function all();

    public function delete($model);

    public function create(Array $input);

    public function firstOrCreate(Array $input);

    public function update($model, Array $input);

    public function getIdOptions();
}
