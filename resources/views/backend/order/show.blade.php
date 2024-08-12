@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['show']['title']])

<div class="row mb20">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title sptitle">
                <h5 class="tex">
                    Danh sách chi tiết đơn hàng
                </h5>
                <a name="" id="" class="btn btn-primary" href="{{route('order.index')}}" role="button">Back</a>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>


                            <th>

                                Tên sản phẩm
                            </th>

                            <th>
                                Quantity
                            </th>
                            <th>
                                Price
                            </th>

                            <th>
                                Subprice
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                 

                        @foreach ($orderDetail as $key)
                            <tr>

                                <td>
                                    {{ $key->products->first()->name }}
                                </td>
                                <td>
                                    {{ $key->quantity }}
                                </td>
                                <td>
                                    {{ $key->price }}
                                </td>
                                <td>

                                    ${{number_format($key->price * $key->quantity)}}
                                </td>
                            </tr>
                          
                        @endforeach

                     
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Total price</th>
                          <td colspan="3" class="td_order">${{$totalPrice}}</td>
                        </tr>
                      </tfoot>
                </table>

                {{-- {{$orders->links('pagination::bootstrap-4')}} --}}
            </div>
        </div>
    </div>
</div>
