<?php 

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseServiceInterface
{
    public function getAll(array $parameters = []): Collection;
    public function getById(mixed $id, array $parameters = []):? Model;
    public function create(array $data): Model;
    public function update(mixed $id, array $data): ?Model;
}   
