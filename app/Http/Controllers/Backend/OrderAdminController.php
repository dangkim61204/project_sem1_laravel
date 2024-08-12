<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\OrderAdminServiceInterface as OrderAdminService;
use App\Http\Requests\StoreOrderAdminRequest;
use App\Http\Requests\UpdateOrderAdminRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use DB;
use App\Repositories\Interfaces\OrderAdminRepositoryInterface as OrderAdminRepository;
use Illuminate\Support\Facades\App;

class OrderAdminController extends Controller
{

    protected $orderAdminService;
    protected $orderAdminRepository;
    public function __construct(
        OrderAdminService $orderAdminService,
        OrderAdminRepository $orderAdminRepository
    )
    {

        $this->orderAdminService = $orderAdminService;
        $this->orderAdminRepository = $orderAdminRepository;
        
    }

    public function index(Request $request)
    {

        $orders = $this->orderAdminService->paginate($request);


        $config = $this->indexConfig();
  
        $config['seo'] = __('messages.order');


      
        $template = 'backend.order.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'orders'));
    }

    public function show($id) {

        $orderDetail = OrderDetail::where('order_id', $id)->with('orders', 'products')->get();




        $totalPrice = 0;
        foreach($orderDetail as $key) {
            $totalPrice += $key->price * $key->quantity;
        }

        $totalPrice =  number_format($totalPrice);
  
        $config = $this->indexConfig();
  
        $config['seo'] = __('messages.order');

        $template = 'backend.order.show';

        return view('backend.dashboard.layout', compact('template', 'config', 'orderDetail', 'totalPrice'));
    }

    
    public function delete($id) {
       


        $order = Order::where('id', $id)->with('users')->get()->first();
      


        $template = 'backend.order.delete';
        $config['seo'] = __('messages.order');
        return view('backend.dashboard.layout', compact('template', 'config', 'order'));
    }

    public function destroy($id) {

        $deleteDetail = OrderDetail::where('order_id', $id)->delete();
        $delete = Order::where('id', $id)->delete();
        
        if($delete) {
            return redirect()->route('order.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('order.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
 
        }
    }

    private function configData() {
        return [
           
            'js' => [
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/library/finder.js'
            ]
        ];
    }

    private function indexConfig() {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ],
           
        ];
  
    }

   
  
}
