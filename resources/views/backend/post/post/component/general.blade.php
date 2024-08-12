<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-panel text-left">Tiêu đề  bài viết<span class="text-danger">(*)</span></label>
            <input type="text" name="name" value="{{old('name', ($post->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

        </div>
    </div>
</div>
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row" style="display: block !important">
            <div class="uk-flex uk-flex-middle uk-flex-space-between" style="margin-top: 10px">
                <label for="" class="control-label text-left">Nội dung</label>
                <a href="" class="mutipleUploadImageCkediotor"  data-target="editor">Upload nhiều ảnh</a>
            </div>
            {{-- <label for="" class="control-panel text-left mt10">Nội dung  bài viết</label> --}}
            <textarea name="description"   id="editor" class="form-control" data-height="150">
                {{  old('description',$post->description ?? '' ) }}
            </textarea>

        </div>
    </div>
</div>

<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row" style="display: block !important">
            <label for="" class="control-panel text-left mt10" style="display: block">Mô tả ngắn bài viết</label>

            <textarea name="content" id="editor" class="form-control ckeditor"   data-height="500">
                {{  old('content',$post->content ?? '' ) }}
            </textarea>

        </div>
    </div>
</div>
