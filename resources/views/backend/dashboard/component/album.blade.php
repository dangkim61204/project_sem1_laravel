<div class="ibox">
    <div class="ibox-title">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <h5>Album ảnh</h5>
            <div class="upload-album"><a href="" class="upload-picture">Chọn Hình</a></div>
        </div>
    </div>
    <div class="ibox-content">
        @php 
            $gallery = (isset($albums) && count($albums)) ? $albums : old('album');

        @endphp
       <div class="row">
        <div class="col-lg-12">
            @if(!isset($gallery))
            <div class="click-to-upload">
                <div class="icon">
                    <a href="" class="upload-picture">
                       <img src="{{asset('backend/img/myimage/tOMaC.png')}}" width="100%" alt="">
                    </a>
                </div>
                <div class="small-text" style="text-align: center;">Sử dụng nút chọn hình hoặc click vào đây để thêm hình</div>
            </div>
            @endif
          
                <div class="upload-list {{isset($gallery) && count($gallery) ? '' : 'hidden'}}" >
                    <div class="row">
                        <ul  id="sortable" class="clearfix data-album sortui ui-sortable" >
                            @if(isset($gallery) && count($gallery))
                        @foreach($gallery as $album)
                        <li class="ui-state-default">
                            <div class="thumb">
                            <span class="image image-scaledown">
                            <img  src="{{$album}}" alt="{{$album}}">
                            <input type="hidden" name="album[]" value="{{$album}}">
                            </span>
                            <button class="delete-image"><i class="fa fa-trash"></i></button>
                            </div>
                            </li>
                            @endforeach

            @endif
{{-- <input type="hidden" name="album[]"> --}}
                        </ul>
                    </div>
                </div>
        </div>
       </div>
    </div>
</div>