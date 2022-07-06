<div class="sidebar">
  
      <div class="logo">
        <div class="card-img">
        <a href="/{{ app()->getLocale() }}/admin"> {{ auth()->user()->name }}</a>
        @if(isset( auth()->user()->image ))
       <img src="{{image( auth()->user()->image )}}" style="width: 30%;" alt="">
       @else
       <img src="/uploads/img/user-profile.jpg" style="width: 30%;" alt="">
       @endif
        </div>
      
      
        <a href="https://ideadesigngroup.ge/ka" class="simple-text logo-normal">
          Idea design Grop
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav" id="side-menu">
          <li class="active ">
            <a href="/{{ app()->getLocale() }}/admin">
              <i class="now-ui-icons design_app"></i>
              <p>{{ trans('admin.dashboard') }}</p>
            </a>
          </li>
          <li>
            <a href="/{{ app()->getLocale() }}/admin/sections">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>{{ trans('admin.sections') }}</p>
            </a>
          </li>
          <li class="">
            <a href="/{{ app()->getLocale() }}/admin/sections?type=13">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>{{ trans('admin.categories') }}</p>
            </a>
          </li>
          <li>
                    
                    @foreach (bannerTypesOrdered() as $key => $bannerType)
                    <a href="{{ route('banner.list', [app()->getLocale(), $bannerType['id']]) }}">
                        
                        <i class="mdi mdi-view-dashboard"></i>
                        <p>{{ trans('bannerTypes.'.$bannerType['name']) }}</p>
                    </a>
                    @endforeach
                </li>
          <li>
            <a href="/{{ app()->getLocale() }}/admin/submissions">
            @if (count($notifications) > 0 )
                            <span class="badge badge-danger rounded-circle noti-icon-badge sidebar-badge">{{ count($notifications) }}</span>
                     
                            @endif
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p> {{ trans('admin.submissions') }}</p>
            </a>
          </li>
          {{-- 
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> {{ trans('admin.banners') }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @foreach (bannerTypesOrdered() as $key => $bannerType)
                        <li><a href="{{ route('banner.list', [app()->getLocale(), $bannerType['id']]) }}">{{ trans('bannerTypes.'.$bannerType['name']) }}</a></li>
                        @endforeach
                        
                    </ul>
                </li>
				 --}}
          <li>
            <a href="/{{ app()->getLocale() }}/admin/languages/edit">
              <i class="now-ui-icons objects_globe"></i>
              <p>{{ trans('admin.languages') }}</p>
            </a>
          </li>
          <li>
            <a href="/{{ app()->getLocale() }}/admin/settings/edit">
              <i class="now-ui-icons loader_gear"></i>
              <p>{{ trans('admin.settings') }}</p>
            </a>
          </li>
          @if (auth()->user()->isType('superuser'))
               
                <li>
            <a href="/{{ app()->getLocale() }}/admin/users">
              <i class="mdi mdi-account-multiple-outline"></i>
              <p>{{ trans('admin.users') }}</p>
            </a>
          </li>
                {{-- <li>
                    <a href="/{{ app()->getLocale() }}/admin/subscribers">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> {{ trans('admin.subscribers') }} </span>
                    </a>
                </li>

                <li>
                    <a href="/{{ app()->getLocale() }}/admin/mailers">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> {{ trans('admin.mailers') }} </span>
                    </a>
                </li> --}}
{{-- 
                <li>
                    <a href="/{{ app()->getLocale() }}/attandance">
                        <i class="dripicons-user"></i>
                        <span> {{ trans('admin.attandance') }} </span>
                    </a>
                </li>

                <li>
                    <a href="/{{ app()->getLocale() }}/employes">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> {{ trans('admin.employes') }} </span>
                    </a>
                </li> --}}

                @endif
        </ul>
      </div>
    </div>