 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
         
            <ul class="navbar-nav">
            <li class="leng">
                <div class="language-text">
                 @foreach($locales as $locale => $url)

                     <a class="active" title="GEO" href="@if(app()->getLocale() != $locale) {{$url}} @endif" >@if(app()->getLocale() != $locale) {{ trans('website.'.$locale) }} @endif</a>

                 @endforeach
         </div>
             </li>
             <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    @if (count($notifications) > 0)
                    <span class="badge badge-danger rounded-circle noti-icon-badge">{{ count($notifications) }}</span>

                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            {{ trans('admin.notifications') }}
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        @foreach ($notifications as $notif)
                            <a href="/{{ app()->getLocale() }}/admin/submission/{{ $notif->id }}" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-email"></i>
                                </div>
                                <p class="notify-details">
                                    {{ $notif->post->parent->title }}
                                </p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>{{ $notif->name }}</small>
                                </p>
                            </a>
                        @endforeach



                    </div>

                    <!-- All-->
                    <a href="/{{ app()->getLocale() }}/admin/submissions" class="dropdown-item text-center text-primary notify-item notify-all">
                        {{ trans('admin.view_all') }}
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>
            
            @if(auth()->user() !== Null)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="/{{ app()->getLocale() }}/admin/users/edit/{{  auth()->user()->id }}">{{ trans('admin.my_account') }}</a>
                  <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}">{{ trans('admin.logout') }}</a>
                 
                </div>
              </li>
            @endif
         
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>