<?php

namespace App\Services\Interfaces;

/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface ProductServiceInterface
{
    public function paginate($request);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
    public function show($id);
}
