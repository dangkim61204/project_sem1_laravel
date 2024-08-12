<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdataPostCatalogueRequest;
use App\Http\Requests\DeletePostCatalogueRequest;
use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;


class PostCatalogueController extends Controller
{

    protected $postCatalogueService;
    protected $postCatalogueRepository;
    public function __construct(PostCatalogueService $postCatalogueService, PostCatalogueRepository $postCatalogueRepository)
    {

        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
        
    }

    public function index(Request $request)
    {

       
    

       $auth = $this->authorize('modules', 'post.catalogue.index');
       
        $list = $this->postCatalogueService->paginate($request);

        $config = $this->indexConfig();

        $config['seo'] = __('messages.postCatalogue');



        $template = 'backend.post.catalogue.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'list'));
    }


    public function create()
    {

        $this->authorize('modules', 'post.catalogue.create');

        $config = $this->configData();
        $list = PostCatalogue::withDepth()->defaultOrder()->get();
        

        $config['method']= 'create';
        $template = 'backend.post.catalogue.store';
        $config['seo'] = config('apps.postcatalogue');
        return view('backend.dashboard.layout', compact('template', 'config', 'list'));

    }

    public function store(StorePostCatalogueRequest $request)
    {

        
        if($this->postCatalogueService->create($request)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        }else {
            return redirect()->route('post.catalogue.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại');
 
        }
    }


    public function edit($id) 
    {

        $this->authorize('modules', 'post.catalogue.edit');

        $postcatalogue = $this->postCatalogueService->show($id);


        $list = PostCatalogue::withDepth()->defaultOrder()->get();



        $albums = json_decode($postcatalogue->album);
      
        $config = $this->configData();

        $config['method']= 'edit';

        $template = 'backend.post.catalogue.store';
        $config['seo'] = config('apps.postcatalogue');



        return view('backend.dashboard.layout', compact('template', 'config', 'postcatalogue', 'list', 'id', 'albums'));
       
    }

    public function update(UpdataPostCatalogueRequest $request, $id)
    {
      
       
        if($this->postCatalogueService->update($id, $request)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
        }else {
            return redirect()->route('post.catalogue.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại');
 
        }

    }

    public function delete($id) 
    {

        $this->authorize('modules', 'post.catalogue.delete');

        $postcatalogue = $this->postCatalogueRepository->edit($id);

        
        $template = 'backend.post.catalogue.delete';
        $config['seo'] = config('apps.postcatalogue');
        return view('backend.dashboard.layout', compact('template', 'config', 'postcatalogue'));
    }

    public function destroy($id, DeletePostCatalogueRequest $request) 
    {
        if($this->postCatalogueService->delete($id)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('post.catalogue.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
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
            'model' => 'PostCatalogue'
        ];
  
    }
  
}
