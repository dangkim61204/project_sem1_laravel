<?php

namespace App\Services\Interfaces;

/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface PermissionServiceInterface
{
    public function paginate($request);
    public function create();
    public function update($id, $request);
    public function delete($id);
    public function switch($id);
}
