<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn Danh Mục<span class="text-danger">(*)</span></h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">Chọn root nếu không có danh mục cha</span>

                    <select name="category_id" class="form-control setupSelect2" id="">
                        <option value="">Chọn loại sản phẩm</option>
                     
                        @endphp
                        @if (!empty($list) && $config['method'] == 'edit')
                            @foreach ($list as $category)
                                {{ $category }}
                                <option
                                    {{ $product->category_id == old('category_id', isset($category->id) ? $category->id : '') ? 'selected' : '' }}
                                    value="{{ $category->id }}"><small>
                                        {{ str_repeat('|----', $category->depth) . $category->name }}</small></option>
                                {{-- <option @if (old('category_id') == $category->id) selected @endif value="{{$category->id}}"><small>  {{str_repeat('|----', $category->depth) . $category->name}}</small></option> --}}
                                <br>
                            @endforeach
                        @else
                            @foreach ($list as $category)
                                {{ $category }}
                                {{-- <option {{$id == old('parent_id', (isset($category->id)) ? $category->id : '') ? 'selected' : ''}} value="{{$category->id}}"><small>  {{str_repeat('|----', $category->depth) . $category->name}}</small></option> --}}
                                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                                    <small> {{ str_repeat('|----', $category->depth) . $category->name }}</small>
                                </option>
                                <br>
                            @endforeach
                        @endif
                    </select>

                </div>
            </div>

        </div>
        
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5 class="kd5">Chọn ảnh sản phẩm</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image_target">
                        <img class="img_cursor "
                            src="{{ asset(old('image', $product->image ?? 'backend/img/myimage/no_image.png')) }}"
                            width="100%" alt="">
                    </span>
                    <input type="hidden" name="image" value="{{ old('image', $product->image ?? '') }}">

                </div>
            </div>

        </div>
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5 class="kd5">Cấu hình nâng cao</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">

                    <select name="publish" class="form-control setupSelect2" id="">
                        @foreach (config('apps.general.publish') as $key => $val)
                            <option
                                {{ $key == old('publish', isset($product->publish) ? $product->publish : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <div style="margin-top: 20px; margin-bottom: 20px"></div>

                  


                </div>
            </div>

        </div>
    </div>
</div>
