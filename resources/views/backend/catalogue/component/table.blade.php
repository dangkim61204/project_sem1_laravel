
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>

        <th>

         {{__('messages.tableName')}}
        </th>


 
        <th class="text-center">{{__('messages.tableStatus')}}</th>
        <th class="text-center">{{__('messages.tableAction')}}</th>
    </tr>
    </thead>
    <tbody>

     @foreach($list as $key)
    <tr>
        <td>
            <input type="checkbox"  value="{{$key->id}}" class="input-text checkBoxItem">

        </td>

        <td>

          {{$key->name}}
       
        </td>
    
        <td class="text-center js-switch-{{$key->id}}"> 
            <input type="checkbox" value="{{$key->publish}}" class="js-switch status" data-modelId="{{$key->id}}" data-field="publish" data-model="{{$config['model']}}"  {{($key->publish == 2) ? 'checked' : ''}} />    
           
        </td>
        <td class="text-center">
            <a name="" id="" class="btn btn-success" href="{{route('catalogue.edit', $key->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('catalogue.delete', $key->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach

    {{-- @endif --}}
   
  
    </tbody>
</table>

{{$list->links('pagination::bootstrap-4')}}