<?php

namespace App\Services;

use App\Services\Interfaces\PostServiceInterface;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Services\BaseService;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

/**
 * Class PostService
 * @package App\Services
 */
class PostService extends BaseService implements PostServiceInterface
{
    protected $postRepository;
    protected $controllerName = 'App\Http\Controllers\Frontend\PostController';

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function paginate($request)
    {

        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => ($request->integer('publish')),
        ];

        $rawQuery['post_catalogue_id'] =  $this->whereRaw($request);

        $perpage = $request->integer('perpage');

        $posts = $this->postRepository->pagination(
            $this->paginateSelect(),
            $condition,
            [
                [
                    'post_catalogue_post as tb3', 'posts.id', '=', 'tb3.post_id'
                ],
            ],

            $perpage,
            ['path' => '/post/index'],

            $this->groupByPost(),
            [],
            [],
            $rawQuery
        );

        return $posts;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {


            $payload = $this->payloadData($request);
            $post = $this->postRepository->create($payload);



            // dd($payload);

            if ($post->id > 0) {

                $catalogue = $this->catalogue();
                $post->post_catalogues()->sync($catalogue);
              
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


 
            $post = $this->postRepository->edit($id);
            $payload = $this->payloadData($request);

            $flag = $this->postRepository->update($id, $payload);
          

            if ($flag) {
             
            


                $catalogue = $this->catalogue();
                $post->post_catalogues()->sync($catalogue);
              

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

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->forceDelete($id);

          

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

            $post = $this->postRepository->update($post['modeId'], $payload);

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


            $flag = $this->postRepository->updateByWhereIn('id', $post['id'], $payload);



            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }

    private function catalogue()
    {
        if (!empty(request()->input('catalogue'))) {
            return array_unique(array_merge(request()->input('catalogue'), [request()->post_catalogue_id]));
        } else {
            return [request()->post_catalogue_id];
        }
    }

    public function show($id)
    {

        $post = $this->postRepository->editJoinWithId(
            $id,
            $this->paginateSelect(),
            [
               
            ],
            '',
            'post_catalogues'
        );

        return $post;
    }

  
   

    private function payload()
    {
        return
            [
                'publish', 'image', 'album',  'name', 'description', 'content',
                'post_catalogue_id', 'follow'

            ];
    }

   
    private function paginateSelect()
    {
        return
            [
                'posts.id',
                'posts.publish',
                'posts.post_catalogue_id',
                'posts.image',
                'posts.album',
                'posts.name',
                'posts.description',
                'posts.content',
          

            ];
    }
   
    private function whereRaw($request)
    {

        $rawCondition = [];
        if ($request->integer('post_catalogue_id') > 0) {
            $rawCondition['whereRaw'] =
                [

                    'tb3.post_catalogue_id IN (
                        SELECT id
                        FROM  post_catalogues
                        WHERE _lft  >= (SELECT _lft  FROM post_catalogues  as pc WHERE pc.id = ?)
                        AND _rgt <= (SELECT _rgt  FROM post_catalogues  as pc WHERE pc.id = ?)
                    )',
                    [$request->integer('post_catalogue_id'), $request->integer('post_catalogue_id')]

                ];
        }


        return $rawCondition;
    }

    private function groupByPost()
    {
        return  [
            'posts.id',
            'posts.publish',
            'posts.post_catalogue_id',
            'posts.image',
            'posts.album',
            'posts.name',
            'posts.description',
            'posts.content',
       
        ];
    }

    private function payloadData($request) 
    {
        $payload = request()->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        $payload['user_id'] = auth()->id();
        return $payload;
    }


    
}
