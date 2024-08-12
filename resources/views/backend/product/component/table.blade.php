<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>

       

        <th>

          Anh sản phẩm
        </th>
        <th>

            Tên sản phẩm
        </th>
        <th>

            slug
        </th>
        <th>

            Gia
        </th>
        <th>

            Giam giá
        </th>

        <th>
            Nhóm danh mục
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
        <img width="60px" src="{{$key->image}}" alt="">
       </td>
       <td>
        {{$key->name}}
       </td>
       <td>
        {{$key->slug}}
       </td>
       <td>
        {{$key->price}}
       </td>
       <td>
        {{$key->sale_price}}
       </td>
       <td>
        {{$key->catalogues->name}}
       </td>
    
        <td class="text-center js-switch-{{$key->id}}"> 
            <input type="checkbox" value="{{$key->publish}}" class="js-switch status" data-modelId="{{$key->id}}" data-field="publish" data-model="{{$config['model']}}"  {{($key->publish == 2) ? 'checked' : ''}} />    
           
        </td>
        <td class="text-center">
            <a name="" id="" class="btn btn-success" href="{{route('product.edit', $key->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('product.delete', $key->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach


   
  
    </tbody>
</table>

{{$list->links('pagination::bootstrap-4')}}