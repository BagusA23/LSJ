<?php 

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoriesInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepositories implements BaseRepositoriesInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = []): Collection
    {
        return $this->model->with($columns)->get();
    }

    public function find(mixed $id, array $columns = []):? Model
    {
        return $this->model->with($columns)->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(mixed $id, array $data): ?Model
    {
        $model = $this->find($id);

        if ($model) {
            $model->update($data);
            return $model;
        }

        return null;
    }
}