<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
      <div class="sidebar-header">
          <div class="d-flex justify-content-between">
              <div class="logo">
                  <a href="index.html"><h5>Admin Panel</h5></a>
              </div>
              <div class="toggler">
                  <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
          </div>
      </div>
      <div class="sidebar-menu">
          <ul class="menu">
              <li class="sidebar-title">Menu</li>

              <li class="sidebar-item  ">
                  <a href="/{{ app()->getLocale() }}/admin" class='sidebar-link'>
                      <i class="bi bi-grid-fill"></i>
                      <span>{{ trans('admin.dashboard') }}</span>
                  </a>
              </li>

              <li class="sidebar-item">
                  <a href="/{{ app()->getLocale() }}/admin/sections" class='sidebar-link'>
                      <i class="bi bi-stack"></i>
                      <span>{{ trans('admin.sections') }}</span>
                  </a>
              </li>
              @foreach (bannerTypesOrdered() as $key => $bannerType)
              <li class="sidebar-item">
                <a href="{{ route('banner.list', [app()->getLocale(), $bannerType['id']]) }}" class='sidebar-link'>
                    <i class="fa-solid fa-image"></i>
                    <span>{{ trans('bannerTypes.'.$bannerType['name']) }}</span>
                </a>
            </li>
            @endforeach
            <li class="sidebar-item">
                <a href="/{{ app()->getLocale() }}/admin/submissions" class='sidebar-link'>
                    @if (isset($notifications) && count($notifications) > 0 )
                    <span class="badge badge-danger rounded-circle noti-icon-badge sidebar-badge">{{ count($notifications) }}</span>
             
                    @endif
                    <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                        <span>{{ trans('admin.submissions') }}</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/{{ app()->getLocale() }}/admin/languages/edit" class='sidebar-link'>
                    <i class="fa-solid fa-globe"></i>
                    <span>{{ trans('admin.languages') }}</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/{{ app()->getLocale() }}/admin/settings/edit" class='sidebar-link'>
                    <i class="fa-solid fa-gear"></i>
                    <span>{{ trans('admin.settings') }}</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/{{ app()->getLocale() }}/admin/fullcalendar" class='sidebar-link'>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>{{ trans('admin.calendar') }}</span>
                </a>
            </li>
            @if (auth()->user()->isType('superuser'))

            <li class="sidebar-item">
                <a href="/{{ app()->getLocale() }}/admin/users" class='sidebar-link'>
                    <i class="fa-solid fa-users"></i>
                    <span>{{ trans('admin.users') }}</span>
                </a>
            </li>
              @endif

          </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>