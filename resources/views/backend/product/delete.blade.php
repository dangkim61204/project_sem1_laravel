@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('product.destroy', $product->id) }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn muốn xóa sản phẩm có tên  là: <span class="text-danger">{{$product->name}}</span></p>
                        <p>Lưu ý .Xóa là không thể khôi phục tên sản phẩm sau khi xóa.Hãy chắc chắn trước khi xóa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên sản phẩm <span class="text-danger">(*)</span></label>
                                    <input type="text" readonly name="name" value="{{old('name', ($product->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                           
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
       
        <div class="text-right mb10">
            <button type="submit" name="send" value="send" class="btn btn-danger">Xóa dữ liệu</button>

        </div>
    </div>
</form>


