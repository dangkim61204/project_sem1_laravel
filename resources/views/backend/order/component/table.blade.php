<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-text">
        </th>

    
        <th>

        OrderId
        </th>
        <th>

          Tên
        </th>
     
        <th>
          Email 
        </th>
        <th>
          Phone
        </th>
        <th>
          Address
        </th>
        <th>
          Status
        </th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>

     @if(isset($orders) && is_object($orders))
     @foreach($orders as $order)

    <tr>
        <td>
            <input type="checkbox"  value="{{$order->id}}" class="input-text checkBoxItem">

        </td>

        <td>

          {{$order->id}}

       
        </td>
        <td>

          {{$order->name}}

       
        </td>
        <td>

          {{$order->email}}

       
        </td>
        <td>

          {{$order->phone}}

       
        </td>
        <td>

          {{$order->address}}

       
        </td>
        <td>
          Pending
        </td>
     
    
        <td class="text-center">
            <a name="" id="" class="btn btn-info" href="{{route('order.show', $order->id)}}" role="button">View</a>
           
            <a name="" id="" class="btn btn-danger" href="{{route('order.delete', $order->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach

    @endif
   
  
    </tbody>
</table>

{{$orders->links('pagination::bootstrap-4')}}