@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])


<form action="{{ route('user.destroy', $user->id) }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn muốn xóa thành viên có email là: {{$user->email}}</p>
                        <p>Lưu ý .Xóa là không thể khôi phục thành viên sau khi xóa.Hãy chắc chắn trước khi xóa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email <span class="text-danger">(*)</span></label>
                                    <input type="text" readonly name="email" value="{{old('email', ($user->email) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên <span class="text-danger">(*)</span></label>
                                    <input type="text" readonly name="name" value="{{old('name', ($user->name)?? '')}}" class="form-control" placeholder="" autocomplete="off">
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


<script>
    var province_id = '{{ isset($user->province_id) ? $user->province_id : old('province_id')}}';
    var district_id = '{{ isset($user->district) ? $user->district : old('district')}}';
    var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id')}}';
</script>