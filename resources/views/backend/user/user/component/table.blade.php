<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>
        <th>Avarta</th>

        <th>

           Họ tên
        </th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Nhóm thành viên</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>

     @if(isset($users) && is_object($users))
     @foreach($users as $user)
    <tr>
        <td>
            <input type="checkbox"  value="{{$user->id}}" class="input-text checkBoxItem">

        </td>
    
        <td>

           <img width="60px" src="{{asset($user->image)}}" alt="">
  
         
          </td>
        <td>

          {{$user->name}}

       
        </td>
        <td>
    {{$user->email}}
        </td>
        <td>
          {{$user->address}}
        </td>
        <td>
           {{$user->phone}}
        </td>
        <td>
            {{$user->user_catalogues->name}}
        </td>
        <td class="text-center js-switch-{{$user->id}}"> 
            <input type="checkbox" value="{{$user->publish}}" class="js-switch status" data-modelId="{{$user->id}}" data-field="publish" data-model="{{$config['model']}}"  {{($user->publish == 2) ? 'checked' : ''}} />    
           
        </td>
        <td class="text-center" style="display: flex">
            <a name="" id="" class="btn btn-success" style="margin-right: 3px" href="{{route('user.edit', $user->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('user.delete', $user->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach

    @endif
   
  
    </tbody>
</table>


{{$users->links('pagination::bootstrap-4')}}