@extends('website.layout')

@section('content')
{{-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="{{URL::to('/')}}" class="text-dark-50">მთავარი</a>
</li>
<li class="breadcrumb-item text-muted">
    <a href="/{{app()->getLocale()}}/profile" class="text-dark-50">პროფილი</a>
</li>
<li class="breadcrumb-item text-muted">
    <a href="/{{app()->getLocale()}}/update_profile" class="text-dark-50">რედაქტირება</a>
</li>
</ul>

<div class="separator separator-dashed mb-9"></div>
<div class="card-toolbar mb-10">
    <span class="icon-user title-logo-size" style="top:3px;"><span class="path1"></span><span class="path2"></span></span>
    <h4 href="/{{app()->getLocale()}}/update_profile" class="font-weight-bolder d-ib ml-4 section-title">პროფილის რედაქტირება</h4>
</div>
<!--end::Dashboard-->
</div>
<!--end::Container-->
</div>
<!--end::Entry-->
</div> --}}

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="mt-6 mb-6 personal-change-title" style="position: relative;">
                <h3>პერსონალური ინფორმაცია</h3>
                <span>განაახლე პირადი ინფორმაცია</span>
                <div class="pass-buttons">
                    <button class="btn btn-sm password-button-2 yellow font-weight-bolder text-uppercase mr-3 fs-16" id="submit_form" type="submit">განახლება</button>
                    <a href="/{{app()->getLocale()}}/profile" class="btn btn-sm password-button-2 font-weight-bolder text-uppercase mr-3 fs-16">გაუქმება</a>
                </div>
            </div>

            <div class="separator separator-dashed mb-9"></div>

            <!--begin::Dashboard-->
            <div class="change-info">

                @if(session()->has('success'))
                <div class="absolute-message" id="mes">
                    <span class="sucsess-message" style="float: right;">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                </div>
                @endif
                @if(session()->has('error'))
                <div class="absolute-message">
                    <span class="sucsess-message" style="float: right;">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                </div>
                @endif
                <script type="text/javascript" id="mes">
                    setTimeout(function() {
                        $('#mes').addClass('none');
                    }, 3000);
                </script>
                <form action="/{{ app()->getLocale() }}/emp_profile_update" class="w-100" id="edit_password" method="POST">
                    @csrf

                    <div class="image d-flex mb-8">
                        <div class="title-pass">სურათი</div>

                        <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url('/website/media/users/blank.png')">
                            <div class="image-input-wrapper" @if(auth()->user()->photo != '') style="background-image: url('/uploads/profile/{{auth()->user()->photo}}')" @else style="background-image: url('/website/media/users/blank.png')" @endif></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="სურათის შეცვლა">
                                <img src="/website/img/edit.png" alt="" class="edit-img">
                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_avatar_remove" />
                                <input type="hidden" id="base_photo" value="" name="base_photo" />

                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="სურათის მოშორება">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="სურათის წაშლა">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                    </div>

                    <div class="current-pass d-flex mt-8">
                        <div class="title-pass">მიმდინარე პაროლი</div>
                        <div class="pass-input">
                            @if(Session::has('pass_error'))
                            <p class="alert alert-danger">{{ Session::get('pass_error') }}</p>
                            @endif

                            @if(Session::has('ent_current_pass'))
                            <p class="alert alert-danger">{{ Session::get('ent_current_pass') }}</p>
                            @endif

                            <input id="current_password" type="password" placeholder="მიმდინარე პაროლი" class="form-control" name="current_password">

                            @if (count($errors))
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">შეიყვანეთ მიმდინარე პაროლი</p>
                            @endforeach
                            @endif

                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <a href="">დაგავიწყდა პაროლი?</a>
                        </div>
                    </div>
                    <div class="current-pass d-flex mt-8">
                        <div class="title-pass">ახალი პაროლი</div>
                        <div class="pass-input">
                            @if(Session::has('new_pass_error'))
                            <small style="display:block; color:rgb(239, 83, 80)">{{ Session::get('new_pass_error') }}</small>
                            @endif
                            <input data-parsley-equalto="#pass1" type="password" placeholder="ახალი პაროლი" name="password" class="form-control" id="pass2">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="current-pass d-flex mt-8">
                        <div class="title-pass">გაიმეორეთ პაროლი</div>
                        <div class="pass-input">
                            @if(Session::has('new_pass_error'))
                            <small style="display:block; color:rgb(239, 83, 80)">{{ Session::get('new_pass_error') }}</small>
                            @endif
                            <input data-parsley-equalto="#pass1" type="password" placeholder="გაიმეორეთ პაროლი" name="password_confirmation" class="form-control @error('re_password') danger @enderror" id="pass3">
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>


@endsection