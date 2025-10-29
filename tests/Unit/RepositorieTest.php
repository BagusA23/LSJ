<?php

use App\Repositories\BaseRepositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

it('can retrieve all records via the all method', function () {
    // 1. Arrange (Persiapan)
    // Buat mock untuk Eloquent Model.
    // Kita tidak butuh model asli, hanya objek yang perilakunya bisa kita atur.
    $modelMock = Mockery::mock(Model::class);

    // Atur ekspektasi:
    // - Metode `with([])` harus dipanggil tepat 1x.
    // - Setelah itu, kembalikan mock itu sendiri (andReturnSelf) agar bisa di-chain ke ->get().
    $modelMock->shouldReceive('with')->once()->with([])->andReturnSelf();

    // - Metode `get()` harus dipanggil tepat 1x.
    // - Setelah itu, kembalikan instance Collection kosong sebagai hasil akhir.
    $modelMock->shouldReceive('get')->once()->andReturn(new Collection());

    // 2. Act (Tindakan)
    // Buat instance repository dengan model tiruan (mock) yang sudah kita siapkan.
    $repository = new BaseRepositories($modelMock);
    $result = $repository->all();

    // 3. Assert (Penegasan)
    // Pastikan hasil yang dikembalikan adalah instance dari Eloquent Collection.
    expect($result)->toBeInstanceOf(Collection::class);
});
