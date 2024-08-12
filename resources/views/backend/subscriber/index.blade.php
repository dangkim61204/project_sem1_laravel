@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])

<div class="row mb20">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5 class="tex">{{$config['seo']['index']['tableHeading']}}</h5>
                @include('backend.dashboard.component.toolbox')
            </div>
            <div class="ibox-content">
              {{-- @include('backend.subscriber.component.filter') --}}
              @include('backend.subscriber.component.table')

            </div>
        </div>
    </div>
</div>
