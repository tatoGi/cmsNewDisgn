@extends('website.layout')
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{$section->url}}" class="text-muted">{{strtoupper($section->title)}}</a>
                </li>
            </ul>

            <div class="separator separator-dashed mb-9"></div>
            <div class="card-toolbar mb-10">

                <span class="icon-user title-logo-size">
                    <img src="{{image($section->icon)}}" class="align-self-end" alt="">
                </span>
                <a href="#" class="font-weight-bolder d-ib ml-6" style="color: #606062;">{{strtoupper($section->title)}}</a>
            </div>
            <div class="d-flex mb-9">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                    <div class="symbol-private">
                        <img src="{{image($post->thumb)}}" alt="image">
                    </div>
                    <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                        <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between flex-wrap mt-5 mb-4">
                        <div class="d-flex mr-3">
                            <a href="#" class="text-hover-primary mr-3 private-name">{{ $post->translate(app()->getLocale())->title }}</a>

                        </div>

                    </div>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <div class="mt-2 mb-6 d-flex">
                        <div class="yellow-line"></div>
                        <div class="personal-position pl-6">გაყიდვების ანალიზისა და განვითარების მენეჯერი</div>
                    </div>

                    <div class="person-b-date">
                        <i class="d-block mb-1" style="color: #606062; font-weight: bold;">{{trans('website.date_of_birth')}}ი</i>
                        <span>23 იანვარი, 1995 წელი</span>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Info-->
            </div>

            <div class="mb-3 person-text">
            {!! $post->translate(app()->getLocale())->text !!}
            </div>


            <!--begin::Dashboard-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection