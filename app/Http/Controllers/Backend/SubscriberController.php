<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Requests\DeleteCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;
use App\Models\Subscriber;


class SubscriberController extends Controller
{

   
    public function index(Request $request)
    {


    //    $auth = $this->authorize('modules', 'catalogue.index');
       
      
        $config = $this->indexConfig();

        $config['seo'] = __('messages.subscriber');
        
        $template = 'backend.subscriber.index';
        $sub = Subscriber::all();
        return view('backend.dashboard.layout', compact('template', 'config', 'sub'));
    }


    public function create()
    {

        $this->authorize('modules', 'catalogue.create');

        $config = $this->configData();
        // $list = Catalogue::all();
        

        $config['method']= 'create';
        $template = 'backend.catalogue.store';
        $config['seo'] = __('messages.catalogue');
        return view('backend.dashboard.layout', compact('template', 'config'));

    }

    public function delete(Request $request) {
        $config = $this->configData();
        $sub = Subscriber::find($request->id);
        // dd($sub);
        // $list = Catalogue::all();
        

        $config['method']= 'create';
        $template = 'backend.subscriber.delete';
        $config['seo'] = __('messages.subscriber');
        return view('backend.dashboard.layout', compact('template', 'config', 'sub'));

        
}
       public function destroy(Request $request) {
        $sub = Subscriber::find($request->id);
        $sub->delete();
        return redirect()->route('subscriber.index')->with('success', 'xoá thành công');
       }

    public function store(StoreCatalogueRequest $request)
    {


        
        // if($this->catalogueService->create($request)) {
        //     return redirect()->route('catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        // }else {
        //     return redirect()->route('catalogue.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại');
 
        // }
    }


    // public function edit($id) 
    // {

    //     $this->authorize('modules', 'catalogue.edit');

    //     $catalogue = $this->catalogueService->show($id);


    //     $list = Catalogue::all();


    //     $albums =  isset($catalogue->album) ?  json_decode($catalogue->album) : '';
      
    //     $config = $this->configData();

    //     $config['method']= 'edit';

    //     $template = 'backend.catalogue.store';
    //     $config['seo'] = __('messages.catalogue');



    //     return view('backend.dashboard.layout', compact('template', 'config', 'catalogue', 'list', 'id', 'albums'));
       
    // }

    // public function update(UpdateCatalogueRequest $request, $id)
    // {
      

    //     if($this->catalogueService->update($id, $request)) {
    //         return redirect()->route('catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
    //     }else {
    //         return redirect()->route('catalogue.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại');
 
    //     }

    // }

    // public function delete($id) 
    // {

    //     // $this->authorize('modules', 'catalogue.delete');

    //     // $catalogue = $this->catalogueRepository->edit($id);

        
    //     $template = 'backend.subscriber.delete';
    //     $config['seo'] = __('messages.subscriber');

    //     return view('backend.dashboard.layout', compact('template', 'config'));
    // }

    // public function destroy(Request $request, $id) 
    // {
    //     // if($this->catalogueRepository->delete($id)) {
    //     //     return redirect()->route('catalogue.index')->with('success', 'Xóa bản ghi thành công');
    //     // }else {
    //     //     return redirect()->route('catalogue.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
    //     // }
    //     $cate = $request->find($id);
    //     $cate->delete();
    //     return redirect()->route('backend.dashboard.layout');
    // }

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
            'model' => 'Catalogue'
        ];
  
    }
  
}
