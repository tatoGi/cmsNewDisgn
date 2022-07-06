@extends('website.layout')
@section('content')
<div class="content d-flex flex-column flex-column-fluid">
    <input type="hidden" value="{{$birthdays}}" name="birthdays">   
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{$model->url}}" class="text-muted">{{strtoupper($model->title)}}</a>
                </li>
            </ul>
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row mt-0 mt-lg-8">
                <div class="col-xl-12">
                    <div class="mb-17">
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <div class="card-toolbar mb-10">
                            <span class="icon-speaker title-logo-size">
								<img src="{{image($model->icon)}}" class="align-self-end" alt="">
                            </span>
                            <a href="#" class="font-weight-bolder d-ib ml-1 section-title">{{strtoupper($model->title)}}</a>
                        </div>

                        <div id="kt_calendar"></div>
                    </div>

                </div>

            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
</div>
@endsection