<?php 

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoriesInterface
{
    public function all(array $columns = []): Collection;
    public function find(mixed $id, array $columns = []):? Model;
    public function create(array $data): Model;
    public function update(mixed $id, array $data): ?Model;
}   