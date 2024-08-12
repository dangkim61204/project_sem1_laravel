<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>


        <th>

          Tên nhóm thành viên
        </th>
        <th class="text-center">

          Số thành viên
        </th>
        <th>
            Mô tả
        </th>
    
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>

     @if(isset($usersCatalogue) && is_object($usersCatalogue))
     @foreach($usersCatalogue as $user)
    <tr>
        <td>
            <input type="checkbox"  value="{{$user->id}}" class="input-text checkBoxItem">

        </td>

        <td>

          {{$user->name}}

       
        </td>
        <td class="text-center">

          {{$user->users_count}} người

       
        </td>
        <td>
            {{$user->description}}
        </td>

        <td class="text-center js-switch-{{$user->id}}"> 
            <input type="checkbox" value="{{$user->publish}}" class="js-switch status" data-modelId="{{$user->id}}" data-field="publish" data-model="{{$config['model']}}"  {{($user->publish == 2) ? 'checked' : ''}} />    
           
        </td>
        <td class="text-center">
            <a name="" id="" class="btn btn-success" href="{{route('user.catalogue.edit', $user->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('user.catalogue.delete', $user->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach

    @endif
   
  
    </tbody>
</table>

{{$usersCatalogue->links('pagination::bootstrap-4')}}