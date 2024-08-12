<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>

       

        <th>

          Tiêu đề Bài Viết
        </th>



       
    
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    
     @foreach($list as $key)
    <tr>
        <td>
            <input type="checkbox"  value="{{$key->id}}" class="input-text checkBoxItem">

        </td>

        <td>
            <div class="uk-flex uk-flex-middle">
                <div class="image mr5">
                    <div class="image-cover">
                        <img src="{{$key->image}}" class="image-post" alt="" >
                    </div>
                </div>
                <div class="main-info">
                    <div class="name">
                        <a href="" class="main-a-name">{{$key->name}}</a>
                    </div>
                    <div class="catalogue mt10">
                        <span class="text-danger">
                            Nhóm hiện thị
                        </span>
                        @foreach($key->post_catalogues as $postCatalogue)
                        {{-- @foreach($postCatalogue->post_catalogue_language as $cat) --}}
                        <a href="{{route('post.index', ['post_catalogue_id' => $postCatalogue->id])}}">{{$postCatalogue->name}}</a>
                        {{-- @endforeach --}}
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </td>
       
      


        <td class="text-center js-switch-{{$key->id}}"> 
            <input type="checkbox" value="{{$key->publish}}" class="js-switch status" data-modelId="{{$key->id}}" data-field="publish" data-model="{{$config['model']}}"  {{($key->publish == 2) ? 'checked' : ''}} />    
           
        </td>
        <td class="text-center">
            <a name="" id="" class="btn btn-success" href="{{route('post.edit', $key->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('post.delete', $key->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach


   
  
    </tbody>
</table>

{{$list->links('pagination::bootstrap-4')}}