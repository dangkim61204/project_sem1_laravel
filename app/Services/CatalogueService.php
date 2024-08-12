<?php

namespace App\Services;

use App\Services\Interfaces\CatalogueServiceInterface;
use App\Repositories\Interfaces\CatalogueRepositoryInterface as CatalogueRepository;
use App\Services\BaseService;
use App\Models\Catalogue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

/**
 * Class CatalogueService
 * @package App\Services
 */
class CatalogueService extends BaseService implements CatalogueServiceInterface
{

    protected $catalogueRepository;
    protected $controllerName = 'App\Http\Controllers\Frontend\CatalogueController';

    public function __construct
    (
        CatalogueRepository $catalogueRepository
    ) 
    {
        $this->catalogueRepository = $catalogueRepository;
    }



    public function paginate($request)
    {

        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => ($request->integer('publish')),
        ];


        $perpage = $request->integer('perpage');

        $postCatalogues = $this->catalogueRepository->pagination(
            [],
            $condition,
            [
            ],
            $perpage,
            ['path' => '/catalogue/index'],
        );


        return $postCatalogues;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $this->payloadData($request);



            $catalogue = Catalogue::create($payload);

           
            

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

            $catalogue = $this->catalogueRepository->edit($id);

            $payload = $this->payloadData($request);
            
            $flag = $this->catalogueRepository->update($id, $payload);



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

            $catalogue = $this->catalogueRepository->forceDelete($id);

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

            $catalogue = $this->catalogueRepository->update($post['modeId'], $payload);

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
            $flag = $this->catalogueRepository->updateByWhereIn('id', $post['id'], $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }


    public function show($id)
    {


        $catalogue = $this->catalogueRepository->editJoinWithId(
            $id,
            $this->paginateSelect(),
        );


        return $catalogue;
    }

    private function payloadData($request) 
    {
        $payload = request()->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        $payload['user_id'] = auth()->id();
        $payload['slug'] = Str::slug($request->name);
        return $payload;
    }



 
    private function payload()
    {
        return
            [
               
                'publish',
                'image',
                'name',
                'user_id',
                'description',
                'content',
                'name',
                'album',
                'slug'

            ];
    }

  

    private function paginateSelect()
    {
        return
            [
                'catalogues.id',
                'catalogues.publish',
                'catalogues.image',
                'catalogues.album',
                'catalogues.name',
                'catalogues.description',
                'catalogues.content'

            ];
    }
}
