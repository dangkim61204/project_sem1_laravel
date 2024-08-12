<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-panel text-left">{{__('messages.title')}}<span class="text-danger">(*)</span></label>
            <input {{isset($disabled) ? 'disabled' : ''}} type="text" name="name" value="{{old('name', ($model->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

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
            <textarea {{isset($disabled) ? 'disabled' : ''}} name="description"   id="editor" class="form-control" data-height="150">
                {{  old('description',$model->description ?? '' ) }}
            </textarea>

        </div>
    </div>
</div>

<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row" style="display: block !important">
            <label for="" class="control-panel text-left mt10" style="display: block">{{__('messages.short_description')}}</label>

            <textarea {{isset($disabled) ? 'disabled' : ''}} name="content" id="editor" class="form-control ckeditor"   data-height="500">
                {{  old('content',$model->content ?? '' ) }}
            </textarea>

        </div>
    </div>
</div>
