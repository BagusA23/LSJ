<?php 

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

interface BaseServiceInterface
{
    public function getAll(array $parameters = []): Collection;
}