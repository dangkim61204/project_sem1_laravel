@php 

    $segment = request()->segment(1);



@endphp 
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="{{asset('backend/img/profile_small.jpg')}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="dashboard_2.html#">
                            <span class="block m-t-xs font-bold">David Williams</span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('auth.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
              
              
                {{-- @foreach(config('apps.module.module') as $key => $val) --}}
                @foreach(__('sidebar.module') as $key => $val)
                <li class="{{in_array($segment, $val['name'])? 'active' : ''}}">
                 
                    <a href="#"><i class="{{$val['icon']}}"></i><span class="nav-label">{{$val['title']}}</span> <span class="fa arrow"></span></a>
                    @if(isset($val['subModule']))
                    <ul class="nav nav-second-level">
                        @foreach($val['subModule'] as $module)
                        <li><a href="{{$module['route']}}">{{$module['title']}}</a></li>
                       
                       @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach

             
            </ul>

        </div>
    </nav>