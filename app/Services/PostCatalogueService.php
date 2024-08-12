<?php

namespace App\Services;

use App\Services\Interfaces\PostCatalogueServiceInterface;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Services\BaseService;
use App\Models\PostCatalogue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

/**
 * Class PostCatalogueService
 * @package App\Services
 */
class PostCatalogueService extends BaseService implements PostCatalogueServiceInterface
{

    protected $postCatalogueRepository;
    protected $controllerName = 'App\Http\Controllers\Frontend\PostCatalogueController';

    public function __construct
    (
        PostCatalogueRepository $postCatalogueRepository,
    ) 
    {
        $this->postCatalogueRepository = $postCatalogueRepository;
    }



    public function paginate($request)
    {

        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => ($request->integer('publish')),
        ];


        $perpage = $request->integer('perpage');

        $postCatalogues = $this->postCatalogueRepository->pagination(
            [],
            $condition,
            [
            ],
            $perpage,
            ['path' => '/post/catalogue/index'],
        );


        return $postCatalogues;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $this->payloadData($request);

            $postCatalogue = PostCatalogue::create($payload);

            if ($request->parent_id && $request->parent_id !== null) {
                $parent = PostCatalogue::find($request->parent_id);
                $parent->appendNode($postCatalogue);
                $parent->save();
            }
            

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

            $postCatalogue = $this->postCatalogueRepository->edit($id);

            $payload = $this->payloadData($request);




            $flag = $this->postCatalogueRepository->update($id, $payload);



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

            $postCatalogue = $this->postCatalogueRepository->forceDelete($id);

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

            $postCatalogue = $this->postCatalogueRepository->update($post['modeId'], $payload);

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
            $flag = $this->postCatalogueRepository->updateByWhereIn('id', $post['id'], $payload);

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

        $postcatalogue = $this->postCatalogueRepository->editJoinWithId(
            $id,
            $this->paginateSelect(),
        );

        return $postcatalogue;
    }

    private function payloadData($request) 
    {
        $payload = request()->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        $payload['user_id'] = auth()->id();
        return $payload;
    }



 
    private function payload()
    {
        return
            [
                'parent_id',
                'publish',
                'image',
                'follow',
                'name',
                'user_id',
                'description',
                'content',
                'name',
                'album'

            ];
    }

  

    private function paginateSelect()
    {
        return
            [
                'post_catalogues.id',
                'post_catalogues.publish',
                'post_catalogues.image',
                'post_catalogues.parent_id',
                'post_catalogues.album',
                'post_catalogues.name',
                'post_catalogues.description',
                'post_catalogues.content'

            ];
    }
}
