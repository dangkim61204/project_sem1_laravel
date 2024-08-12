<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdataPostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;


class PostController extends Controller
{

    protected $postService;
    protected $postRepository;
    public function __construct(
        PostService $postService, 
        PostRepository $postRepository,
    )
    {
       
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        
    }


    public function index(Request $request)
    {
        $this->authorize('modules', 'post.index');

        $list = $this->postService->paginate($request);


        $config = $this->indexConfig();
  
        $config['seo'] = config('apps.post');
        
        $dropdown = PostCatalogue::withDepth()->defaultOrder()->get();

     
        $template = 'backend.post.post.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'list', 'dropdown'));
    }


    public function create()
    {
        $this->authorize('modules', 'post.create');

        $config = $this->configData();
        $list = PostCatalogue::withDepth()->defaultOrder()->get();



        $config['method']= 'create';
        $template = 'backend.post.post.store';
        $config['seo'] = config('apps.post');
        return view('backend.dashboard.layout', compact('template', 'config', 'list'));

    }

    public function store(StorePostRequest $request)
    {
   
        if($this->postService->create($request)) {
            return redirect()->route('post.index')->with('success', 'Thêm mới bản ghi thành công');
        }else {
            return redirect()->route('post.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại');
 
        }
    }


    public function edit($id) 
    {

        $this->authorize('modules', 'post.edit');

        $post = $this->postService->show($id);


        $catalogue = $this->catalogue($post);

        $list = PostCatalogue::withDepth()->defaultOrder()->get();

        $albums = json_decode($post->album);
      
        $config = $this->configData();

        $config['method']= 'edit';

        $template = 'backend.post.post.store';
        $config['seo'] = config('apps.post');
        return view('backend.dashboard.layout', compact('template', 'config', 'post', 'list', 'id', 'albums', 'catalogue'));
       
    }

    public function update(UpdatePostRequest $request, $id)
    {
      
        if($this->postService->update( $id, $request)) {
            return redirect()->route('post.index')->with('success', 'Cập nhật bản ghi thành công');
        }else {
            return redirect()->route('post.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại');
 
        }

    }

    public function delete($id)
    {
        $this->authorize('modules', 'post.delete');

        $post = $this->postService->show($id);

        $template = 'backend.post.post.delete';
        $config['seo'] = config('apps.post');
        return view('backend.dashboard.layout', compact('template', 'config', 'post'));
    }

    public function destroy($id) 
    {
        if($this->postService->delete($id)) {
            return redirect()->route('post.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('post.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
        }
    }

    private function configData() 
    {
        return [
           
            'js' => [
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/plugin/ckeditor/ckeditor.js',
                'backend/library/finder.js',
                'backend/library/seo.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ]
        ];
    }

    private function indexConfig()
    {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ],
            'model'=> 'Post'
        ];
  
    }

    private function catalogue($post) 
    {
        $array = [];
        $post_catalogue_id = $post->post_catalogue_id;
      

        foreach($post->post_catalogues as $key) {
            if($key->id != $post_catalogue_id) {
                array_push($array, $key->id);
            }
        }

        return $array;
    }
  
}
