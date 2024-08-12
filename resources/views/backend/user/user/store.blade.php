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
@php 

    $url = ($config['method'] == 'create') ? route('user.store') : route('user.update', $user->id)

@endphp
<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của người sử dụng</p>
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
                                    <label for="" class="control-label text-right">Email <span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" value="{{old('email', ($user->email) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{old('name', ($user->name)?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                     
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhóm thành viên <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" id="" class="form-control">
                                        <option value="0">Vui lòng chọn nhóm thành viên</option>
                                        @foreach($userCatalogues as $key => $item)
                                        <option {{$item->id == old('user_catalogue_id', (isset($user->user_catalogue_id)) ? $user->user_catalogue_id : '') ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh </label>
                                    <input type="date" name="birthday" value="{{old('birthday', (isset($user->birthday)) ?  date('Y-m-d', strtotime($user->birthday)) : '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @if($config['method'] == 'create')
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mật khẩu <span class="text-danger">(*)</span></label>
                                    <input type="text" name="password"  class="form-control" placeholder="" autocomplete="off">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                                    <input type="text" name="re_password" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb10">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Anh đại diện</label>
                                    <input type="text" name="image" value="{{old('image', ($user->image) ?? '')}}" class="form-control upload-image" placeholder="" autocomplete="off">

                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin cư trú</div>
                    <div class="panel-description">Nhập thông tin liên hệ của  người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Thành phố</label>
                                    <select name="province_id"  id="" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="">[Chọn thành phố]</option>
                                        @if(isset($provinces))

                                        @foreach($provinces as $province)
                                        <option @if(old('province_id') == $province->code) selected @endif value="{{$province->code}}">{{$province->name}}</option>
                                        @endforeach
                                        @endif
                                        <option value="1">Hà Nội</option>
                                    </select>
                                </div>
                            </div>
               
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Quận/Huyện <span class="text-danger">(*)</span></label>
                                    <select name="district" id="" class="form-control districts setupSelect2 location" data-target="wards">
                                        <option value="">[Chọn Quận huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Phường/Xã <span class="text-danger">(*)</span></label>
                                    <select name="ward_id" id="" class="form-control setupSelect2 wards">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ <span class="text-danger">(*)</span></label>
                                    <input type="text" name="address" value="{{old('address', ($user->address) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Số điện thoại<span class="text-danger">(*)</span></label>
                                    <input type="text" name="phone" value="{{old('phone', ($user->phone) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú <span class="text-danger">(*)</span></label>
                                    <input type="text" name="description" value="{{old('description', ($user->description) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb10">
            <button type="submit" name="send" value="send" class="btn btn-primary">Lưu lại</button>

        </div>
    </div>
</form>


<script>
    var province_id = '{{ isset($user->province_id) ? $user->province_id : old('province_id')}}';
    var district_id = '{{ isset($user->district) ? $user->district : old('district')}}';
    var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id')}}';
</script>