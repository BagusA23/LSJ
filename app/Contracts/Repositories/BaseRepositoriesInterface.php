<?php 

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface BaseRepositoriesInterface
{
    public function all(array $columns = []): Collection;
}