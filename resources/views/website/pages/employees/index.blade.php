@extends('website.layout')
@section('content')
<div class="content d-flex flex-column flex-column-fluid">
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
                        <div class="card-toolbar mb-6">

                            <span class="icon-user title-logo-size">
                                <img src="{{image($model->icon)}}" class="align-self-end" alt="">
                            </span>
                            <a href="#" class="font-weight-bolder d-ib ml-6" style="color: #606062;">{{strtoupper($model->title)}}</a>
                            <div class="filter mb-8" style="display: flex; justify-content: space-between;float: right;">

                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-light-primary" style="font-feature-settings: 'case' on !important;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download" style="color: #fff;font-size: 20px;top: -3px;position: relative;"></i> ექსპორტი</button>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <ul class="navi flex-column navi-hover py-2">
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_print">
                                                    <span class="navi-icon">
                                                        <i class="la la-print"></i>
                                                    </span>
                                                    <span class="navi-text">ბეჭდვა</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" id="export_excel">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-excel-o"></i>
                                                    </span>
                                                    <span class="navi-text">ექსელი</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable2">
                            <thead>
                                <tr>
                                    <th class="case_on">{{trans('website.name_surname')}}</th>
                                    <th class="case_on">{{trans('website.date_of_birth')}}</th>
                                    <th class="case_on">{{trans('website.section')}}</th>
                                    <th class="case_on">{{trans('website.sub_section')}}</th>
                                    <th class="case_on">{{trans('website.position')}}</th>
                                    <th class="case_on">{{trans('website.mobile')}}</th>
                                    <th class="case_on">{{trans('website.ip_phone')}}</th>
                                    <th class="case_on">{{trans('website.email')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $key => $emp)
                                <tr>
                                    <td>{{$emp->name_surname}}</td>
                                    <td>{{$emp->date}}</td>
                                    <td>{{$emp->section}}</td>
                                    <td>{{$emp->sub_section}}</td>
                                    <td>{{$emp->position}}</td>
                                    <td>{{$emp->mobile}}</td>
                                    <td>{{$emp->ip_phone}}</td>
                                    <td>{{$emp->company_email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
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