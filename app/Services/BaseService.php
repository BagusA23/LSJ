<?php 

namespace App\Services;

use App\Contracts\Repositories\BaseRepositoriesInterface;
use App\Contracts\Services\BaseServiceInterface;
use BaconQrCode\Common\Mode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    public function getById(mixed $id, array $parameters = []): ?Model
    {
        return $this->repository->find($id, $parameters);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(mixed $id, array $data): ?Model
    {
        return $this->repository->update($id, $data);
    }
}