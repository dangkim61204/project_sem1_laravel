<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;

class UserCatalogueController extends Controller
{

    protected $userCatalogueService;
    protected $userCatalogueRepository;
    protected $permissionRepository;
    public function __construct(
        UserCatalogueService $userCatalogueService,
         UserCatalogueRepository $userCatalogueRepository,
         PermissionRepository $permissionRepository,
         )
    {

        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->permissionRepository = $permissionRepository;
        
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'user.catalogue.index');

        $usersCatalogue = $this->userCatalogueService->paginate($request);




        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ],
            'model' => 'UserCatalogue'
        ];
  
        $config['seo'] = config('apps.usercatalogue');


      
        $template = 'backend.user.catalogue.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'usersCatalogue'));
    }


    public function create(){

        $this->authorize('modules', 'user.catalogue.create');


        $config = $this->config();
        $config['method']= 'create';
        $template = 'backend.user.catalogue.store';
        $config['seo'] = config('apps.usercatalogue');
        return view('backend.dashboard.layout', compact('template', 'config'));

    }

    public function store(StoreUserCatalogueRequest $request){
        
        if($this->userCatalogueService->create()) {
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        }else {
            return redirect()->route('user.catalogue.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại');
 
        }
    }


    public function edit($id) {

        $this->authorize('modules', 'user.catalogue.edit');

        $userCatalogue = $this->userCatalogueRepository->edit($id);
  
        $config = $this->config();

        $config['method']= 'edit';

        $template = 'backend.user.catalogue.store';
        $config['seo'] = config('apps.usercatalogue');
        return view('backend.dashboard.layout', compact('template', 'config', 'userCatalogue'));
       
    }

    public function update(StoreUserCatalogueRequest $request, $id){
      
        if($this->userCatalogueService->update( $id, $request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
        }else {
            return redirect()->route('user.catalogue.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại');
 
        }

    }

    public function delete($id) {
        $this->authorize('modules', 'user.catalogue.delete');

        $userCatalogue = $this->userCatalogueRepository->edit($id);

        
        $template = 'backend.user.catalogue.delete';
        $config['seo'] = config('apps.usercatalogue');
        return view('backend.dashboard.layout', compact('template', 'config', 'userCatalogue'));
    }

    public function destroy($id) {
        if($this->userCatalogueService->delete($id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('user.catalogue.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
        }
    }

    private function config() {
        return [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/library/finder.js'
            ]
        ];
    }

    public function permission() 
    {
        $this->authorize('modules', 'user.catalogue.permission');
        $userCatalogues = $this->userCatalogueRepository->all(['permissions']);
        $permissions = $this->permissionRepository->all();
        $template = 'backend.user.catalogue.permission';
        $config['seo'] = __('messages.userCatalogue');


        return view('backend.dashboard.layout', compact('template', 'config', 'userCatalogues', 'permissions'));

    }
  
    public function updatePermission(Request $request) 
    {


        if($this->userCatalogueService->setPermission($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật quyền thành công');
        }else {
            return redirect()->route('user.catalogue.index')->with('error', 'Có vấn đề xảy ra.Hãy thử lại');
        }
       


    }
  
}
