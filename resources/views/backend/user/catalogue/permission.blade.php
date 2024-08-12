@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])


<form action="{{route('user.catalogue.updatePermission')}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cấp quyền</h5>
                    </div>
                </div>

                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th></th>
                            @foreach($userCatalogues as $userCatalogue)
                            <th class="text-center">{{$userCatalogue->name}}</th>

                            @endforeach
                        </tr>

                        @foreach($permissions as $permission)
                        <tr>
                            <td><a href="" style="display: flex;justify-content: space-between">
                                {{$permission->name}}
                               <span style="float: right;color: red"> ({{$permission->canonical}})</span>
                            </a></td>
                            @foreach($userCatalogues as $userCatalogue)
                            <td>
                                <input 
                                {{
                                    collect( $userCatalogue->permissions)->contains('id',$permission->id) ? 'checked' : ''
                                }}
                                type="checkbox" name="permission[{{$userCatalogue->id}}][]" value="{{$permission->id}}" class="form-control">
                            </td>
                            @endforeach
                          
                        </tr>
                        @endforeach
                      

                    </table>
                   
                </div>
            </div>
            
        </div>
        <hr>
   
        <div class="text-right mb10">
            <button type="submit" name="send" value="send" class="btn btn-primary">Lưu lại</button>

        </div>
    </div>
</form>


