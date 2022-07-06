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
                        </div>

                        <!-- <div class="filter mb-8" style="display: flex; justify-content: space-between">

                            <button type="button" class="btn btn-light-primary font-weight-bolder " data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <img src="../website/media/Group 656.png" />
                                </span>{{trans('website.filter')}}
                            </button>
                        </div> -->

                        <!--begin: Datatable-->
                        <div class="employees-table">
                            <table class="table table-separate table-head-custom" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th class="case_on">{{trans('website.name_surname')}}</th>
                                        <th class="case_on">{{trans('website.date_of_birth')}}</th>
                                        <th class="case_on">{{trans('website.section')}}</th>
                                        <th class="case_on">{{trans('website.sub_section')}}</th>
                                        <th class="case_on">{{trans('website.position')}}</th>
                                        <th class="case_on">{{trans('website.mobile')}}</th>
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
                                        <td>{{$emp->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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