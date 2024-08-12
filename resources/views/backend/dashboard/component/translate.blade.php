<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-panel text-left">{{__('messages.title')}}<span class="text-danger">(*)</span></label>
            <input type="text" name="translate_name" value="{{old('translate_name', ($model->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

        </div>
    </div>
</div>
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row" style="display: block !important">
            <div class="uk-flex uk-flex-middle uk-flex-space-between" style="margin-top: 10px">
                <label for="" class="control-label text-left">{{__('messages.content')}}</label>
                <a href="" class="mutipleUploadImageCkediotor"  data-target="editor">{{__('messages.upload_image')}}</a>
            </div>
            {{-- <label for="" class="control-panel text-left mt10">Nội dung  bài viết</label> --}}
            <textarea name="translate_description"  id="editor2" class="form-control" data-height="150">
                {{  old('translate_description',$model->description ?? '' ) }}
            </textarea>

        </div>
    </div>
</div>

<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row" style="display: block !important">
            <label for="" class="control-panel text-left mt10" style="display: block">{{__('messages.short_description')}}</label>

            <textarea name="translate_content" id="editor2" class="form-control ckeditor"   data-height="500">
                {{  old('translate_content',$model->content ?? '' ) }}
            </textarea>

        </div>
    </div>
</div>
