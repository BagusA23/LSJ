<?php 

namespace App\Services;

use App\Contracts\Repositories\BaseRepositoriesInterface;
use App\Contracts\Services\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class BaseService implements BaseServiceInterface
{
    protected BaseRepositoriesInterface $repository;

    public function __construct(BaseRepositoriesInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(array $parameters = []): Collection
    {
        return $this->repository->all($parameters);
    }
}