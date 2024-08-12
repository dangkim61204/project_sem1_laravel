
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
                            src="{{ asset(old('image', $catalogue->image ?? 'backend/img/myimage/no_image.png')) }}"
                            width="100%" alt="">
                    </span>
                    <input type="hidden" name="image" value="{{ old('image', $catalogue->image ?? '') }}">

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
                                {{ $key == old('publish', isset($catalogue->publish) ? $catalogue->publish : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <div style="margin-top: 20px; margin-bottom: 20px"></div>

                </div>
            </div>

        </div>
    </div>
</div>
