@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])


<form action="{{ route('user.catalogue.destroy', $userCatalogue->id) }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn muốn xóa thành viên có tên nhóm là: <span class="text-danger">{{$userCatalogue->name}}</span></p>
                        <p>Lưu ý .Xóa là không thể khôi phục tên nhóm thành viên sau khi xóa.Hãy chắc chắn trước khi xóa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên nhóm <span class="text-danger">(*)</span></label>
                                    <input type="text" readonly name="name" value="{{old('name', ($userCatalogue->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
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


