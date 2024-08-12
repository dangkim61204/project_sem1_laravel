<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface DistrictRepositoryInterface
{

    public function findDistrictByProvinceId(int $province_id);


}
