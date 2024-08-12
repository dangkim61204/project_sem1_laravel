<?php

namespace App\Services;

use App\Services\Interfaces\BaseServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

/**
 * Class UserCatalogueService
 * @package App\Services
 */
class BaseService implements BaseServiceInterface
{


    public function __construct(  
      
    )
    {
      
    }


    public function formatAlbum($request) 
    {
        return $request->input('album') && !empty($request->input('album')) ? json_encode($request->input('album')) : '';
    }

  
  

}
