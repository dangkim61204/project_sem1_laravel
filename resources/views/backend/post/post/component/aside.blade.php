<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn Danh Mục Cha<span class="text-danger">(*)</span></h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">Chọn root nếu không có danh mục cha</span>

                    <select name="post_catalogue_id" class="form-control setupSelect2" id="">
                        <option value="">Root</option>
                     
                        @endphp
                        @if (!empty($list) && $config['method'] == 'edit')
                            @foreach ($list as $category)
                                {{ $category }}
                                <option
                                    {{ $post->post_catalogue_id == old('post_catalogue_id', isset($category->id) ? $category->id : '') ? 'selected' : '' }}
                                    value="{{ $category->id }}"><small>
                                        {{ str_repeat('|----', $category->depth) . $category->name }}</small></option>
                                {{-- <option @if (old('post_catalogue_id') == $category->id) selected @endif value="{{$category->id}}"><small>  {{str_repeat('|----', $category->depth) . $category->name}}</small></option> --}}
                                <br>
                            @endforeach
                        @else
                            @foreach ($list as $category)
                                {{ $category }}
                                {{-- <option {{$id == old('parent_id', (isset($category->id)) ? $category->id : '') ? 'selected' : ''}} value="{{$category->id}}"><small>  {{str_repeat('|----', $category->depth) . $category->name}}</small></option> --}}
                                <option @if (old('post_catalogue_id') == $category->id) selected @endif value="{{ $category->id }}">
                                    <small> {{ str_repeat('|----', $category->depth) . $category->name }}</small>
                                </option>
                                <br>
                            @endforeach
                        @endif
                    </select>

                </div>
            </div>

        </div>
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="font-bold">Danh mục phụ</label>

                    <select multiple name="catalogue[]" class="form-control setupSelect2" id="">
                        <option value="">Root</option>

                        @if (!empty($list))

                            @foreach ($list as $category)
                                {{ $category }}
                                <option @if (is_array(old('catalogue', isset($catalogue) ? $catalogue : [])) &&
                                        in_array($category->id, old('catalogue', isset($catalogue) ? $catalogue : []))) selected @endif value="{{ $category->id }}">
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
        <h5 class="kd5">Chọn ảnh đại diện</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image_target">
                        <img class="img_cursor "
                            src="{{ asset(old('image', $post->image ?? 'backend/img/myimage/no_image.png')) }}"
                            width="100%" alt="">
                    </span>
                    <input type="hidden" name="image" value="{{ old('image', $post->image ?? '') }}">

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
                                {{ $key == old('publish', isset($post->publish) ? $post->publish : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <div style="margin-top: 20px; margin-bottom: 20px"></div>

                  


                </div>
            </div>

        </div>
    </div>
</div>
