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
}