<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserCatalogue;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

class UserController extends Controller
{

    protected $userService;
    protected $userRepository;
    protected $provinceRepository;
    protected $userCatalogueRepository;


    public function __construct(UserService $userService, UserCatalogueRepository $userCatalogueRepository,ProvinceRepository $provinceRepository, UserRepository $userRepository)
    {

        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
        $this->userCatalogueRepository = $userCatalogueRepository;

        
    }

    public function index(Request $request)
    {

        $this->authorize('modules', 'user.index');

        $users = $this->userService->paginate($request);
        $userCatalogues = UserCatalogue::all();

        $config = $this->paginateConfig();
  
        $config['seo'] = config('apps.user');

        $template = 'backend.user.user.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'users', 'userCatalogues'));
    }


    public function create(){

        $this->authorize('modules', 'user.index');

        $provinces = $this->provinceRepository->all();
        $userCatalogues = $this->userCatalogueRepository->all();

        $config = $this->config();
        $config['method']= 'create';
        $template = 'backend.user.user.store';
        $config['seo'] = config('apps.user');
        return view('backend.dashboard.layout', compact('template', 'config', 'provinces', 'userCatalogues'));

    }

    public function store(StoreUserRequest $request){
        
        if($this->userService->create()) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }else {
            return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại');
 
        }
    }


    public function edit($id) {
        $this->authorize('modules', 'user.edit');

        $user = $this->userRepository->edit($id);
        $userCatalogues = $this->userCatalogueRepository->all();

  
        $provinces = $this->provinceRepository->all();
        $config = $this->config();
        $config['method']= 'edit';

        $template = 'backend.user.user.store';
        $config['seo'] = config('apps.user');
        return view('backend.dashboard.layout', compact('template', 'config', 'provinces', 'user', 'userCatalogues'));
       
    }

    public function update(UpdateUserRequest $request, $id){
      
        if($this->userService->update( $id, $request)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }else {
            return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại');
 
        }

    }

    public function delete($id) {
        $this->authorize('modules', 'user.delete');

        $user = $this->userRepository->edit($id);

        
        $template = 'backend.user.user.delete';
        $config['seo'] = config('apps.user');
        return view('backend.dashboard.layout', compact('template', 'config', 'user'));
    }

    public function destroy($id) {
        if($this->userService->delete($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
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
                'backend/library/finder.js',
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/library/finder.js'
            ]
        ];
    }

    private function paginateConfig() {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ],
            'model' => 'User'
        ];
    }
}
