<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdataProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;


class ProductController extends Controller
{

    protected $productService;
    protected $productRepository;
    public function __construct(
        ProductService $productService, 
        ProductRepository $productRepository,
    )
    {
       
        $this->productService = $productService;
        $this->productRepository = $productRepository;
        
    }


    public function index(Request $request)
    {
        $this->authorize('modules', 'product.index');

        $list = $this->productService->paginate($request);


        $config = $this->indexConfig();
  
        $config['seo'] = __('messages.product');
        
        $dropdown = Catalogue::all();

     
        $template = 'backend.product.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'list', 'dropdown'));
    }


    public function create()
    {
        $this->authorize('modules', 'product.create');

        $config = $this->configData();
        $list = Catalogue::all();



        $config['method']= 'create';
        $template = 'backend.product.store';
        $config['seo'] = __('messages.product');

        return view('backend.dashboard.layout', compact('template', 'config', 'list'));

    }

    public function store(StoreProductRequest $request)
    {
   
        if($this->productService->create($request)) {
            return redirect()->route('product.index')->with('success', 'Thêm mới bản ghi thành công');
        }else {
            return redirect()->route('product.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại');
 
        }
    }


    public function edit($id) 
    {

        $this->authorize('modules', 'product.edit');

        $product = $this->productService->show($id);


        

        $list = Catalogue::all();

        $albums = json_decode($product->album);
      
        $config = $this->configData();

        $config['method']= 'edit';

        $template = 'backend.product.store';
        $config['seo'] = __('messages.product');

        return view('backend.dashboard.layout', compact('template', 'config', 'product', 'list', 'id', 'albums'));
       
    }

    public function update(UpdateProductRequest $request, $id)
    {
      
        if($this->productService->update($id, $request)) {
            return redirect()->route('product.index')->with('success', 'Cập nhật bản ghi thành công');
        }else {
            return redirect()->route('product.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại');
 
        }

    }

    public function delete($id)
    {
        $this->authorize('modules', 'product.delete');

        $product = $this->productService->show($id);

        $template = 'backend.product.delete';
        $config['seo'] = __('messages.product');

        return view('backend.dashboard.layout', compact('template', 'config', 'product'));
    }

    public function destroy($id) 
    {
        if($this->productService->delete($id)) {
            return redirect()->route('product.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('product.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
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
            'model'=> 'Product'
        ];
  
    }


  
}
