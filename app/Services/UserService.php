<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = ($request->integer('publish'));
        $condition['user_catalogue_id'] = ($request->integer('user_catalogue_id'));
    

        $perpage = $request->integer('perpage');

        $users = $this->userRepository->pagination(
            $this->paginateSelect(), 
            $condition,
             [],
              $perpage,
               ['path' => '/user/index']
            );

     
            
        return $users;
    }

    public function create()
    {
        DB::beginTransaction();
        try {

            $payload = request()->except(['_token', 'send']);

            $payload['password'] = Hash::make($payload['password']);
            if ($payload['birthday'] != null) {

                $payload['birthday'] =  $this->convertBirthDayDate($payload['birthday']);
            }

            $user = $this->userRepository->create($payload);

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

            if ($payload['birthday'] != null) {

                $payload['birthday'] =  $this->convertBirthDayDate($payload['birthday']);
            }

            $user = $this->userRepository->update($id, $payload);

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
            $user = $this->userRepository->forceDelete($id);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateStatus($post = [])
    {
        DB::beginTransaction();
        try {

            $payload[$post['field']] = (($post['value'] == 1) ? 2 : 1);

            $user = $this->userRepository->update($post['modeId'], $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function updateStatusAll($post = [])
    {
        DB::beginTransaction();
        try {


            $payload[$post['field']] = $post['value'];

            $flag = $this->userRepository->updateByWhereIn('id', $post['id'], $payload);


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
                'name',
                'email',
                'phone',
                'address',
                'publish',
                'image',
                'user_catalogue_id'
            ];
    }
}
