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
            <!--begin::Row-->
            <div class="row mt-0 mt-lg-8">
                <div class="col-xl-12">
                    <!--begin::Separator-->
                    <div class="separator separator-dashed mb-9"></div>
                    <!--end::Separator-->
                    <!--begin::Row-->
                    <div class="card-toolbar mb-10">
                        <span class="icon-speaker title-logo-size">
                            <img src="{{image($model->icon)}}" class="align-self-end" alt="">
                        </span>
                        <a href="#" class="font-weight-bolder d-ib ml-4 section-title">{{strtoupper($model->title)}}</a>
                        
                        @if(Session::has('message'))
                            <div class="absolute-message" id="succ">
                                <span class="sucsess-message">{{ Session::get('message') }} !</span>
                            </div>
                        @endif

                        <script type="text/javascript">
                            setTimeout(function() {
                                $('#succ').addClass('none');
                            }, 3000);
                        </script>
                    </div>
                    <!--end::Row-->
                </div>
            </div>
            <img src="{{image($post->thumb)}}" class="reco_img">

           
            <div class="row">
                
                    <div class="col-xxl-8 col-xl-12 row mt-10">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/{{app()->getLocale()}}/submission" method="POST" class="w-100 recomend-form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id_number }}">
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="d-flex">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>{{trans('website.employee_name_surname')}}
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_surname" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group" style="position: relative;">
                                        <label for="exampleSelect1">{{trans('website.subsection')}} <span class="text-danger">*</span></label>
                                       
                                       
                                        <select class="form-control" id="exampleSelect1" name="sub_section" required>
                                            <option value="">***</option>
                                            @foreach ($sub_section as $sub_sec)
                                                <option value="{{$sub_sec->sub}}">{{$sub_sec->sub}}</option>
                                            @endforeach
                                        </select>
                                        <span class="icon-down down-arrow"></span>
                                    </div>
                                </div>
                            </div>
    
    
    
                            <div class="col-12">
                                <div class="card card-custom card-stretch rec-card-textarea pb-0">
                                    <div class="form-group mb-1">
                                        <label for="exampleTextarea">{{trans('website.letter')}}
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="exampleTextarea" rows="3" name="letter" required></textarea>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="form-group mt-8">
                                    <label>{{trans('website.reveal_your_identity')}}<span class="text-danger">*</span></label>
                                    <div class="radio-list mt-6">
                                        <label class="radio">
                                            <input type="radio" name="identity" value="1">
                                            <span></span>{{trans('website.yes')}}</label>
                                        <label class="radio">
                                            <input type="radio" checked="checked" name="identity" value="0">
                                            <span></span>{{trans('website.no')}}</label>
                                    </div>
    
                                    <button class="rec-form-button" type="submit">{{trans('website.send')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xxl-4 col-xl-12 d-flex flex-column">
                        <div class="card card-custom card-stretch rec-card mt-18">
                            <div class="card-header">
                                <div class="card-title mt-12 mb-6">
                                    <h3 class="card-label">{{ $post->translate(app()->getLocale())->title }}</h3>
                                </div>

                                <div class="card-t">{!! $post->translate(app()->getLocale())->text !!}</div>
                            </div>
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