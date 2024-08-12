<?php

namespace App\Services;

use App\Services\Interfaces\OrderAdminServiceInterface;
use App\Repositories\Interfaces\OrderAdminRepositoryInterface as OrderAdminRepository;
use App\Models\OrderAdmin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

/**
 * Class OrderAdminservice
 * @package App\Services
 */
class OrderAdminService implements OrderAdminServiceInterface
{
    protected $orderAdminRepository;
    public function __construct(OrderAdminRepository $orderAdminRepository)
    {
        $this->orderAdminRepository = $orderAdminRepository;
    }

    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        // ep kieu
        $perpage = $request->integer('perpage');

        $orders = $this->orderAdminRepository->pagination(
            $this->paginateSelect(),
             $condition, 
             [], 
             $perpage, 
             ['path' => '/order/index']
            );

        return $orders;
    }
    public function create()
    {
        DB::beginTransaction();
        try {

            $payload = request()->except(['_token', 'send']);
            $payload['user_id'] = auth()->id();
    
            $permission = $this->orderAdminRepository->create($payload);


            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;

        }
    }


    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = request()->except(['_token', 'send']);

            $permission = $this->orderAdminRepository->update($id, $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $permission = $this->orderAdminRepository->forceDelete($id);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }


  


    public function switch($id)
    {
        DB::beginTransaction();
        try {


            $this->orderAdminRepository->update($id, ['current' => 1]);
            $payload =  ['current' => 0];
            $where = ['id', '!=', $id];
            $this->orderAdminRepository->updateByWhere([
                $where
            ], $payload);


            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }

    private function convertBirthDayDate($birthday = '')
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    private function paginateSelect()
    {
        return
            [
                'id',
                'user_id',
                'name',
                'status',
                'email',
                'phone',
                'address',
            ];
    }
}
