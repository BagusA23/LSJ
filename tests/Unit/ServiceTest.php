<?php

use App\Contracts\Repositories\BaseRepositoriesInterface;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;

it('can retrieve all records via the getAll method', function () {
    // 1. Arrange (Persiapan)
    // Buat mock untuk dependency, yaitu BaseRepositoriesInterface.
    $repositoryMock = Mockery::mock(BaseRepositoriesInterface::class);

    // Atur ekspektasi:
    // - Metode `all()` pada repository harus dipanggil tepat 1x.
    // - Saat dipanggil, ia harus mengembalikan instance Collection kosong.
    $repositoryMock
        ->shouldReceive('all')
        ->once()
        ->with([]) // Memastikan dipanggil dengan parameter default (array kosong)
        ->andReturn(new Collection());

    // 2. Act (Tindakan)
    // Buat instance service dengan repository tiruan (mock) yang sudah kita siapkan.
    $service = new BaseService($repositoryMock);
    $result = $service->getAll();

    // 3. Assert (Penegasan)
    // Pastikan hasil yang dikembalikan adalah instance dari Eloquent Collection.
    expect($result)->toBeInstanceOf(Collection::class);
});
