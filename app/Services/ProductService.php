<?php

namespace App\Services;

use App\Services\Interfaces\ProductServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use App\Services\BaseService;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService extends BaseService implements ProductServiceInterface
{
    protected $productRepository;
    protected $controllerName = 'App\Http\Controllers\Frontend\ProductController';

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function paginate($request)
    {

        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => ($request->integer('publish')),
            'category_id' => $request->input('category_id')
        ];




        $perpage = $request->integer('perpage');

        $products = $this->productRepository->pagination(
            $this->paginateSelect(),
            $condition,
            [
            ],
            $perpage,
            ['path' => '/product/index'],
            [],
            [],
            [],

        );

        return $products;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {


            $payload = $this->payloadData($request);

            // dd($payload);
            $product = $this->productRepository->create($payload);




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



            $product = $this->productRepository->edit($id);
            $payload = $this->payloadData($request);

            $flag = $this->productRepository->update($id, $payload);




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
            $product = $this->productRepository->forceDelete($id);



            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateStatus($product = [])
    {
        DB::beginTransaction();
        try {



            $payload[$product['field']] = (($product['value'] == 1) ? 2 : 1);

            $product = $this->productRepository->update($product['modeId'], $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateStatusAll($product = [])
    {
        DB::beginTransaction();
        try {


            $payload[$product['field']] = $product['value'];


            $flag = $this->productRepository->updateByWhereIn('id', $product['id'], $payload);



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
            return array_unique(array_merge(request()->input('catalogue'), [request()->product_catalogue_id]));
        } else {
            return [request()->product_catalogue_id];
        }
    }

    public function show($id)
    {

        $product = $this->productRepository->editJoinWithId(
            $id,
            $this->paginateSelect(),
            [],
            '',
            'product_catalogues'
        );

        return $product;
    }




    private function payload()
    {
        return
            [
                'publish',
                'image',
                'album',
                'name',
                'price',
                'sale_price',
                'slug',
                'user_id',
                'category_id',


            ];
    }


    private function paginateSelect()
    {
        return
            [
                'products.id',
                'products.publish',
                'products.category_id',
                'products.image',
                'products.album',
                'products.name',
                'products.slug',
                'products.price',
                'products.sale_price',


            ];
    }





    private function payloadData($request)
    {
        $payload = request()->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        $payload['user_id'] = auth()->id();
        $payload['slug'] = Str::slug($request->name);
        return $payload;
    }
}
