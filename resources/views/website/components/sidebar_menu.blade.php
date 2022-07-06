<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pb-10">
    <!--begin::Nav-->

    <ul class="nav flex-column">
        <!--begin::Item-->
        @if(isset($sidebar_menu) && ($sidebar_menu != ''))
        @foreach($sidebar_menu as $smenu)
        <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="{{ $smenu->title }}">
            <a href="{{ $smenu->getFullSlug() }}" class="nav-link btn btn-icon btn-lg btn-borderless active">
                <span class="svg-icon svg-icon-xxl menu-icons-size">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                    <img src="{{image($smenu->icon)}}" class="align-self-end white-sephia" alt="">
                    <!--end::Svg Icon-->
                </span>
            </a>
        </li>
        @endforeach
        @endif
        <!--end::Item-->
    </ul>
    <!--end::Nav-->
    <div class="d-flex mt-20" style="justify-content: center;">
        <img src="/website/media/vertical.png" alt="" style="width: 90%;">
    </div>
</div>