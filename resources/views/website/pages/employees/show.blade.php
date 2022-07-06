@extends('website.layout')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

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
            </ul>

            <div class="separator separator-dashed mb-9"></div>
            <div class="card-toolbar mb-10">
                <span class="icon-user title-logo-size" style="top:3px;"><span class="path1"></span><span class="path2"></span></span>
                <h4 href="/{{app()->getLocale()}}/profile" class="font-weight-bolder d-ib ml-4 section-title">პროფილი</h4>
            </div>
            <div class="d-flex mb-9 res-col" style="border-bottom: solid 1px #cccccc !important;padding-bottom: 20px;">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3 resp-flex">
                    <div class="symbol-private">

                        @if (isset(auth()->user()->photo))
                        <img src="/uploads/profile/{{auth()->user()->photo}}" alt="image">
                        @else
                        <img src="/website/img/user-logo.png" alt="image">
                        @endif
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between flex-wrap mt-6 emp-title-resp">
                        <div class="d-flex mr-3">
                            <span href="#" class="text-hover-primary mr-3 private-name">{{$emp->name_surname}}</span>

                        </div>
                        <div class="my-lg-0 my-3">
                            <a href="/{{app()->getLocale()}}/update_profile" class="btn btn-sm password-button font-weight-bolder text-uppercase mr-3">პროფილის ცვლილება</a>
                        </div>
                    </div>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <div class="d-flex flex-wrap justify-content-lg-start mt-1">
                        <div class="d-flex flex-wrap mb-4  mr-20 user-position">
                            <div class="pi" style="font-weight: bold; max-width: 170px;">
                                <span>დაბადების თარიღი</span>
                                <span>ტელეფონი</span>
                                <span>ელ.ფოსტა</span>
                            </div>

                            <div class="pi-2 pl-10">
                                <span href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{$emp->date}}</span>
                                <span href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{$emp->mobile}}</span>
                                <span href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{$emp->email}}</span>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap mb-4 ml-20 user-position">
                            <div class="yellow-border"></div>
                            <div class="pi pi-3 emp-position" style="font-weight: bold; max-width: 200px;">
                                <span>განყოფილება</span>
                                <span>ქვეგანყოფილება</span>
                                <span>პოზიცია</span>
                            </div>


                            <div class="pi-2 pl-10">
                                <span href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{$emp->section}}</span>
                                <span href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{$emp->sub_section}}</span>
                                <span href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{$emp->position}}</span>

                            </div>
                        </div>
                    </div>

                    <!--end::Content-->
                </div>
                <!--end::Info-->
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 card-hover" style="background-color: #F2F2F2;margin-bottom: 20px !important;height: 143px;">
                        <div class="private-card" style="padding: 20px; display: flex; align-items: center;">
                            <a class="d-flex flex-grow-1 rounded flex-column active" data-toggle="pill" href="#tab_forms_widget_1">
                                <span class="nav-icon w-auto">
                                    <span class="svg-icon svg-icon-3x private-card-logo">
                                        <span class="icon-credit-card"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg font-weight-bold mb-2 mt-2"><b>{{$emp->paid_vacation}} დღე</b></span>
                                <span class="nav-text font-size-sm dn2">{{trans('website.paid_vacation')}}</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 card-hover" style="background-color: #F2F2F2;margin-bottom: 20px !important;height: 143px;">
                        <div class="private-card" style="padding: 20px; display: flex; align-items: center;">
                            <a class="d-flex flex-grow-1 rounded flex-column active" data-toggle="pill" href="#tab_forms_widget_1">
                                <span class="nav-icon w-auto">
                                    <span class="svg-icon svg-icon-3x private-card-logo">
                                        <span class="icon-ice-cream"><span class="path1"></span><span class="path2"></span></span>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg font-weight-bold mb-2 mt-2"><b>{{$emp->unpaid_vacation}} დღე</b></span>
                                <span class="nav-text font-size-sm dn2">{{trans('website.unpaid_vacation')}}</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 card-hover" style="background-color: #F2F2F2;margin-bottom: 20px !important;height: 143px;">
                        <div class="private-card" style="padding: 20px; display: flex; align-items: center;">
                            <a class="d-flex flex-grow-1 rounded flex-column active" data-toggle="pill" href="#tab_forms_widget_1">
                                <span class="nav-icon w-auto">
                                    <span class="svg-icon svg-icon-3x private-card-logo">
                                        <span class="icon-heart"><span class="path1"></span><span class="path2"></span></span>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg font-weight-bold mb-2 mt-2"><b>{{$emp->day_Off}} დღე</b></span>
                                <span class="nav-text font-size-sm dn2">{{trans('website.day_Off')}}</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 card-hover" style="background-color: #F2F2F2;margin-bottom: 20px !important;height: 143px;">
                        <div class="private-card" style="padding: 20px; display: flex; align-items: center;">
                            <a class="d-flex flex-grow-1 rounded flex-column active" data-toggle="pill" href="#tab_forms_widget_1">
                                <span class="nav-icon w-auto">
                                    <span class="svg-icon svg-icon-3x private-card-logo">
                                        <span class="icon-wave"><span class="path1"></span><span class="path2"></span></span>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg font-weight-bold mb-2 mt-2"><b>{{$emp->family_circumstances}} დღე</b></span>
                                <span class="nav-text font-size-sm dn2">{{trans('website.family_circumstances')}}</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 card-hover" style="background-color: #F2F2F2;margin-bottom: 20px !important;height: 143px;">
                        <div class="private-card" style="padding: 20px; display: flex; align-items: center;">
                            <a class="d-flex flex-grow-1 rounded flex-column active" data-toggle="pill" href="#tab_forms_widget_1">
                                <span class="nav-icon w-auto">
                                    <span class="svg-icon svg-icon-3x private-card-logo">
                                        <span class="icon-wave"><span class="path1"></span><span class="path2"></span></span>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg font-weight-bold mb-2 mt-2"><b>{{$emp->bulletin}} დღე</b></span>
                                <span class="nav-text font-size-sm dn2">{{trans('website.bulletin')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">

                    @if(isset($attendances[0]))
                    <table class="table mb-5 col-md-6 up" style="float: left;">
                        <span class="green-title-space w-100 up" style="background: #17B255;">დასწრების აღრიცხვა</span>

                        <thead class="green-border-1">

                            <tr>
                                <th scope="col">თარიღი</th>
                                <th scope="col">მოსვლა</th>
                                <th scope="col">წასვლა</th>
                            </tr>
                        </thead>
                        <tbody class="green-border" style="width: 50%">
                            @foreach ($attendances[0] as $colum1)
                            <tr>
                                <td>{{$colum1['date']}}</td>
                                <td>{{$colum1['come']}}</td>
                                <td>{{$colum1['go']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    @if(isset($attendances[1]))
                    <table class="table mb-5 col-md-6 up" style="float: left;">
                        <thead class="g-1">
                            <tr>
                                <th scope="col">თარიღი</th>
                                <th scope="col">მოსვლა</th>
                                <th scope="col">წასვლა</th>
                            </tr>
                        </thead>
                        <tbody class="g-0" style="width: 50%">
                            @foreach ($attendances[1] as $colum1)
                            <tr>
                                <td>{{$colum1['date']}}</td>
                                <td>{{$colum1['come']}}</td>
                                <td>{{$colum1['go']}}</td>
                            </tr>
                            @endforeach
                            @if(count($attendances[0]) == count($attendances[1]) + 1)
                            <tr>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    @endif

                    <table class="table mb-5 col-md-12 up" style="float: left; border: 2px solid #606062;">
                        <span class="green-title-space w-100 up" style="background: #606062;">დისციპლინირებული სანქციები</span>
                        <thead class="thead-dark-white">
                            <tr>
                                <th scope="col white-th" class="white-th">თარიღი</th>
                                <th scope="col">დასახელება</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">06.08.2021</th>
                                <td>საყვედური</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">06.08.2021</th>
                                <td>საყვედური</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--begin::Dashboard-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection