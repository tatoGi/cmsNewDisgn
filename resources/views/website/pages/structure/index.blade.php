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
                        @if($parent_type == 7)
                        <div class="d-flex align-items-center mb-9 bg-light-warning alert-text">
                            მიმართულებები
                            <!--end::Lable-->
                        </div>
                        @endif
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            @if(isset($submenu_sections))
                                @foreach($submenu_sections as $post)

                                <div class="col-md-4 mb-15">
            
                                  <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 structure-card" style="background-color: #EFEFF0; height: 195px;border: solid 2px  @if(isset($post->additional['color'])) {{ $post->additional['color'] }} @endif">

<a class="nav-link border py-50 d-flex flex-grow-1 rounded flex-column align-items-start"  @if(isset($post->children) && count($post->children))  href="{{ $post->getFullSlug() }}"  @endif> 
                                            <span class="nav-icon w-auto">
                                                <img src="{{image($post->icon)}}" class="height-50" />
                                            </span>
                                            <span class="nav-text font-size-lg py-5 sp-font medium">{{ $post->translate(app()->getLocale())->title }}</span>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>

                </div>

            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection