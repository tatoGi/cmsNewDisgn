@extends('website.master')
@section('main')
<main>

@if($section->cover == '')
    <section>
        <div class="home-banner">
            <img src="/public/website/img/banner3.jpg" alt="home-img">
        </div>
    </section> 
    @else
    <section>
            <div class="home-banner">
                <img src="{{image($section->cover)}}" alt="">
            </div>
        </section>
    @endif
    @if(isset($breadcrumbs))
    <section class="bandc-m-t-1" style="overflow-x:hidden;">
        <div class="bandcamp">
            <div class="container">
                <div class="row">
                    <ul>
                        <li><a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a></li>
                        @foreach ($breadcrumbs as $breadcrumb)
                        <li><span class="icon-D-arrow d-arrow-b"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span></li>
                        <li class="brand-colored"><a href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section style="overflow:hidden;">
        <div class="person-info">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-lg-7 col-md-8 col-sm-7 col-7">
                        <div class="person-box">
                            <h1>{{$model[app()->getLocale()]->title}}</h1>
                            <div class="person-info-box">
                                <a href="#">{{$model->email}}</a>
                                <a href="#">{{$model->mobile}}</a>
                                <a href="#">{{$model->phone}}</a>
                            </div>
                            <div class="person-special">
                                <h2>{{ trans('website.specialized_in') }} : </h2>
                                

                                <ul> 
                                    
                                @if(($model[app()->getLocale()]->Specialised != '') && is_array(explode(",", $model[app()->getLocale()]->Specialised)))
                                @foreach(explode(",", $model[app()->getLocale()]->Specialised) as $specialise)
                                    <li><a href="#">{{ $specialise }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                               
                                <a href="/{{$contact->getfullslug()}}" target="_blank" class="person-contact-link">{{ trans('website.contact') }} </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-lg-5 col-md-4 col-sm-5 col-5">
                        <div class="right-side-img img-border">
                            <a href="#">
                                <div class="right-img team-right-img">
                                <a data-fancybox="gallery-1" href="{{ image($model->thumb) }}">
                                            <img   src="{{ image($model->thumb) }}" />
                                        </a>
                                     
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="person-info-text">
                            {!! $model[app()->getLocale()]->text !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    @if(isset($teams))
    <section style="overflow:hidden;">
        <div class="projects">
            <div class="project-text-side">
                <div class="row" >
                    <div class="col-xxl-5 col-lg-5 col-md-6 col-sm-10 col-10 mg-center">
                        <div class="project-text">
                            <h1>{{$teams->translate(app()->getlocale())->title}}</h1>
                            <div class="text">
                                {!! $teams->translate(app()->getlocale())->desc!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="project-slider">
                {{-- {{dd($teams_section_post)}} --}}

                @if(isset($teams->posts) && (count($teams->posts) > 0))
                @foreach($teams->posts as $team)
                <a href="/{{$team->getfullslug()}}" class="project-item">
                    <div class="project-img">
                        <img src="{{image($team->thumb)}}" alt="">
                    </div>
                    <div class="project-person">
                        <h1> {{ $team->translate(app()->getlocale())->title }}</h1>
                        <h2> {!! $team->translate(app()->getlocale())->position !!}</h2>
                    </div>
                </a>
                
                @endforeach
                @endif

            </div>
            <div class="members-link">
                <a href="/{{$teams->getfullslug()}}" class="more-link">{{ trans('website.see_all_members') }}</a>
            </div>
        </div>
    </section>
    @endif



</main>
@endsection