<div class="ibox">
    <div class="ibox-title">
        <h5>
            {{ __('messages.seo') }}
        </h5>
    </div>
    <div class="ibox-content">
        <div class="seo-container">
            <div class="meta_title">
                {{ old('meta_title', $objectTranslate->meta_title ?? '')
                    ? old('meta_title', $objectTranslate->meta_title ?? '')
                    : __('messages.seo_question') }}
            </div>
            <div class="canonical">
                {{ old('canonical', $objectTranslate->canonical ?? '')
                    ? config('app.url') . old('canonical', '/' . $objectTranslate->canonical ?? '') . config('apps.general.suffix')
                    : __('messages.seo_canonical') }}
            </div>
            <div class="meta_description">
                {{ old('meta_description', $objectTranslate->meta_description ?? '')
                    ? old('meta_description', $objectTranslate->meta_description ?? '')
                    : __('messages.seo_canonical') }}
            </div>

        </div>

        <div class="seo-wrapper mt10">
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label dd ">
                            <div class="d-flex">
                                <span>{{ __('messages.seo_meta_title') }} -- </span>
                                <span class="count_meta-title">0 {{ __('messages.character') }}</span>
                            </div>
                        </label>
                        <input type="text" name="translate_meta_title"
                            value="{{ old('meta_title', $objectTranslate->meta_title ?? '') }}" class="form-control "
                            placeholder="" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label dd">
                            <div class="d-flex">
                                <span>{{ __('messages.seo_keyword') }}</span>
                            </div>
                        </label>
                        <input type="text" name="translate_meta_keyword"
                            value="{{ old('meta_keyword', $objectTranslate->meta_keyword ?? '') }}" class="form-control"
                            placeholder="" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label dd">
                            <div class="d-flex">
                                <span>{{ __('messages.seo_meta_title') }} -- </span>
                                <span class="count_meta-description">0 {{ __('messages.character') }}</span>
                            </div>
                        </label>
                        <textarea name="translate_meta_description" id="" class="form-control">{{ old('meta_description', $objectTranslate->meta_description ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form">
                        <label for="" class="control-label dd">
                            <div class="d-flex">
                                <span>{{ __('messages.seo_url') }}</span>
                            </div>
                        </label>
                        <div class="input-wrapper">
                            <input type="text" name="translate_canonical"
                                value="{{ old('canonical', $objectTranslate->canonical ?? '') }}" class="form-control seo-canonical"
                                placeholder="" autocomplete="off">
                            <span class="baseUrl">{{ config('app.url') }}/</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
