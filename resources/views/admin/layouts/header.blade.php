<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="leng">
                     <div class="language-text">
                         @foreach($locales as $locale => $url)

                         <a class="active" title="GEO"
                             href="@if(app()->getLocale() != $locale) {{$url}} @endif">@if(app()->getLocale() !=
                             $locale) {{ trans('website.'.$locale) }} @endif</a>

                         @endforeach
                     </div>
                 </li>
                    <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">{{ trans('admin.mailers') }}</h6>
                            </li>
                            <li> <a href="/{{ app()->getLocale() }}/admin/mailers"
                                class="dropdown-item text-center text-primary notify-item notify-all">
                                {{ trans('admin.view_all') }}
                                <i class="fi-arrow-right"></i>
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            @if (count($notifications) > 0)
                            <li>
                                <h6 class="dropdown-header">{{ count($notifications) }}</h6>
                            </li>
                            @endif

                            <li>
                                @foreach ($notifications as $notif)
                                <a href="/{{ app()->getLocale() }}/admin/submission/{{ $notif->id }}"
                                    class="dropdown-item notify-item active">
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
                                <a href="" class="dropdown-item"> {{ trans('admin.notifications') }}</a>
                            </li>
                            <a href="/{{ app()->getLocale() }}/admin/submissions"
                                class="dropdown-item text-center text-primary notify-item notify-all">
                                {{ trans('admin.view_all') }}
                                <i class="fi-arrow-right"></i>
                            </a>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a  data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->type }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                     @if(isset( auth()->user()->image ))
                                    <img src="{{image( auth()->user()->image )}}" style="width: 100%;" alt="">
                                    @else
                                    <img src="{{ asset('admin/assets/images/faces/1.jpg') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    @if(auth()->user() !== Null)
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">{{ auth()->user()->name }}</h6>
                        </li>
                        <li><a class="dropdown-item"
                                href="/{{ app()->getLocale() }}/admin/users/edit/{{  auth()->user()->id }}"><i
                                    class="icon-mid bi bi-person me-2"></i>{{ trans('admin.my_account') }}</a></li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                Wallet</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i> {{ trans('admin.logout') }}</a></li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
