<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;

class LocationController extends Controller
{

    protected $districtRepository;
    protected $provinceRepository;

    public function __construct(DistrictRepositoryInterface $districtRepository, ProvinceRepositoryInterface $provinceRepository)
    {
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function getLocation(Request $request)
    {


        $get = $request->input();
        $html ='';
        if($get['target'] === 'districts') {

            $provinces = $this->provinceRepository->findById($get['data']['location_id'],['code', 'name'], 
            ['districts']);
            $html = $this->renderHtml( $provinces->districts);
            
        }else if($get['target'] === 'wards'){
            $districts  =$this->districtRepository->findById($get['data']['location_id'],['code', 'name'], 
            ['wards']);
            $html = $this->renderHtml( $districts->wards, '[Chọn Phường/Xã]');

        }
        // $districts = $this->districtRepository->findDistrictByProvinceId($province_id);
        $response = [
            'html' => $html
        ];
        return response()->json(
           $response
        );

    }

    public function renderHtml($districts, $root = '[Chọn Quận/Huyện]')
    {
        $html = '<option value="0">'.$root.'</option>';
        foreach ($districts as $district) {

            $html .= '<option value="' . $district->code . '">' . $district->name . '</option>';
        }
        return $html;
    }
}
