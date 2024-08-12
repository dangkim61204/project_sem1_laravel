<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Facades\Request;

/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface CatalogueServiceInterface
{
    public function paginate($request);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
    public function show($id);
}
