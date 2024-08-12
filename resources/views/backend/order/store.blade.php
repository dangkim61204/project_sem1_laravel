@php 

    $url = ($config['method'] == 'create') ? route('order.store') : route('order.update', $order->id)

@endphp
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo'][($config['method'] == 'create') ? 'create' : 'update']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung </div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của đơn hàng</p>
                        <p>Lưu ý những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc nhập</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Name<span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{old('name', ($order->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email<span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" value="{{old('email', ($order->email)?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Phone<span class="text-danger">(*)</span></label>
                                    <input type="text" name="phone" value="{{old('phone', ($order->phone) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Address<span class="text-danger">(*)</span></label>
                                    <input type="text" name="address" value="{{old('address', ($order->address)?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>

                      
                       
                    </div>
                </div>
            </div>

              
        </div>
        <hr>
       
  
   
        <div class="text-right mb10">
            <button type="submit" name="send" value="send" class="btn btn-primary">Lưu lại</button>

        </div>
    </div>
</form>

