<div class="ibox">
    <div class="ibox-title">
        <h5>{{ __('messages.parentid') }}<span class="text-danger">(*)</span></h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">{{ __('messages.parent_notice') }}</span>

                    <select name="parent_id" class="form-control setupSelect2" id="">
                        <option value="">Root</option>
                        @php
                            if (empty($id)) {
                                $id = 0;
                            }

                        @endphp
                        @if (!empty($list) && $config['method'] == 'edit')

                            @foreach ($list as $category)
                                {{ $category }}
                                <option
                
                                    {{ $postcatalogue->parent_id == old('parent_id', isset($category->id) ? $category->id : '') ? 'selected' : '' }}
                                    value="{{ $category->id }}"><small>
                                        {{ str_repeat('|----', $category->depth) . $category->name }}</small></option>
                                <br>
                            @endforeach
                        @else
                            @foreach ($list as $category)
                                {{ $category }}
                                <option @if (old('parent_id') == $category->id) selected @endif value="{{ $category->id }}">
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
        <h5 class="kd5">{{ __('messages.image') }}</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image_target">
                        <img class="img_cursor "
                            src="{{ asset(old('image', $postcatalogue->image ?? 'backend/img/myimage/no_image.png')) }}"
                            width="100%" alt="">
                    </span>
                    <input type="hidden" name="image" value="{{ old('image', $postcatalogue->image ?? '') }}">

                </div>
            </div>

        </div>
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5 class="kd5">{{ __('messages.advance_config') }}</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">

                    <select name="publish" class="form-control setupSelect2" id="">
                        @foreach (config('apps.general.publish') as $key => $val)
                            <option
                                {{ $key == old('publish', isset($postcatalogue->publish) ? $postcatalogue->publish : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <div style="margin-top: 20px; margin-bottom: 20px"></div>

                </div>
            </div>

        </div>
    </div>
</div>
