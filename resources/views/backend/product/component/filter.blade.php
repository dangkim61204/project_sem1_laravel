<form action="{{route('product.index')}}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            @php 
        $perpage = request('perpage') ?: old('perpage');
  

@endphp
         <div class="perpage">
             <div class="uk-flex uk-flex-middle uk-flex-space-between">
              <select name="perpage" class="form-control input-sm perpage filter mr10 setupSelect2" id="">
                  @for($i = 20; $i <= 200; $i+=20)
                  <option {{$perpage == $i  ? 'selected' : ''}} value="{{$i}}">{{$i}} Bản ghi</option>
                  @endfor
              </select>
             
             </div>
          </div>
          <div class="action">
              <div class="uk-flex uk-flex-middle">
                @php    
              

                 $publish = request('publish') ?: old('publish');
                 $category_id = request('category_id') ?: old('category_id');


                @endphp
                <select name="publish" class="form-control mr-10 setupSelect2"  id="">
                      @foreach(config('apps.general.publish') as $key => $val)
                      <option {{ ($publish == $key)  ? 'selected' : ''}} value="{{$key}}">{{$val}}</option>
                      @endforeach
                  </select>
                <select name="category_id" class="form-control mr-10 setupSelect2"  id="">
                    <option value="">Chọn loại sản phẩm</option>
                      @foreach($dropdown as $val)
                      <option {{ ($category_id == $val->id)  ? 'selected' : ''}} value="{{$val->id}}"><small>  {{str_repeat('|----', $val->depth) . $val->name}}</small></option>
                      @endforeach
                  </select>
                
                  <div class="uk-search uk-flex uk-flex-middle mr10">
                      <div class="input-group">
                          <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword')}}"
                          placeholder="Nhập từ khóa tìm kiếm..."
                          class="form-control"
                          >
                          <span class="input-group-btn">
                              <button type="submit" name="search" value="search" class="btn btn-primary m0 btn-sm">Tìm kiếm</button>
                          </span>
                      </div>
                  </div>
                  <a name="" id="" class="btn btn-danger" href="{{route('product.create')}}" role="button"><i class="mr5 fa fa-plus">Thêm mới sản phẩm</i></a>
              </div>
          </div>
        </div>
     </div>
</form>