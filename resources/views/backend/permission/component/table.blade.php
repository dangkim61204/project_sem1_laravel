<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>

    
        <th>

         Tiêu đề
        </th>
        <th>

          Canonical
        </th>
     
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>

     @if(isset($permissions) && is_object($permissions))
     @foreach($permissions as $permission)

    <tr>
        <td>
            <input type="checkbox"  value="{{$permission->id}}" class="input-text checkBoxItem">

        </td>

        <td>

          {{$permission->name}}

       
        </td>
        <td>

          {{$permission->canonical}}

       
        </td>
     
    
        <td class="text-center">
            <a name="" id="" class="btn btn-success" href="{{route('permission.edit', $permission->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('permission.delete', $permission->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach

    @endif
   
  
    </tbody>
</table>

{{$permissions->links('pagination::bootstrap-4')}}