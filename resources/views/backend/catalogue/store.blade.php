@php 

    $url = ($config['method'] == 'create') ? route('catalogue.store') : route('catalogue.update', isset($catalogue->id))

@endphp
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo'][($config['method'] == 'create') ? 'create' : 'update']['title']])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-9">
               <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        {{__('messages.generalTitle')}}
                    </h5>
                </div>
                <div class="ibox-content">
                    @include('backend.catalogue.component.general')
                </div>
               </div>
               @include('backend.dashboard.component.album')
            </div>
            <div class="col-lg-3">
              @include('backend.catalogue.component.aside')
            </div>

              
        </div>
        <hr>
       
  
   
        <div class="text-right mb10 button-fix">
            <button type="submit" name="send" value="send" class="btn btn-primary">{{__('messages.saveButton')}}</button>
        </div>
    </div>
</form>

