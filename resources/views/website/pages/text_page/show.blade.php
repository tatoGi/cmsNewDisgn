@extends('website.master')
@section('main')
<main style="overflow-x:hidden;">
   
@if($model->cover == '')
    <section>
        <div class="home-banner">
            <img src="/public/website/img/banner3.jpg" alt="home-img">
        </div>
    </section> 
    @else
    <section>
            <div class="home-banner">
                <img src="{{image($model->cover)}}" alt="">
                {{dd($model)}}
            </div>
        </section>
    @endif
    @if(isset($breadcrumbs))
    <section>
        <div class="bandcamp">
            <div class="container">
                <div class="row">
                    <ul>
                        <li><a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a></li>
                        @foreach ($breadcrumbs as $breadcrumb)
                        <li><span class="icon-D-arrow d-arrow-b"> <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </span></li>
                        <li class="brand-colored"><a href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(isset($model->posts))
   
    <section>

       
        <div class="text-section">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-lg-12 col-md-12  col-12 border-first">
                        <div class="row">
                            <div class="col-xxl-8 col-lg-9 col-md-9 col-sm-12 col-12 ">
                                <div class="text-area m-b-2">
                                    <div class="title-text">
                                        <h1>{{$model->posts[0][app()->getLocale()]->title}}</h1>
                                    </div>
                                    <div class="text">{!!$model->posts[0][app()->getLocale()]->text!!}</div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-3 col-md-3 hidden-img">
                                <div class="right-side-img">
                                    <div class="right-img">
                                        <img src="/public/website/img/Group 135.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
        <div class="detail-content text-det-t">    
            <div class="special-row-box text-det-p-b">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12 col-lg-12 col-md-12 p-r-2">
                            <div class="row row-slider-mobile">
                                @foreach ($model->posts[0]->files as $file)
                               
                                <div class="col-xxl-3 col-lg-3 col-md-6 col-slider">
                                    <div class="detail-image">
                                        <a data-fancybox="gallery-1" href="/{{ config('config.image_path') . $file->file }}">
                                            <img class="rounded" src="/{{ config('config.image_path') . $file->file }}" />
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </section>
    @endif
    <section style="overflow:hidden;">
        <div class="about-section p-t-2">
            <div class="container">
                <div class="col-xxl-10 col-lg-10  col-md-11 col-sm-12 col-12  mg-center">
                    <div class="about-content">
                        <div class="row" style="width: 100%;">

                            <div class="col-xxl-3 col-lg-3 col-md-3 col-sm-6 col-6 card-padding">
                                <a  class="card">
                                    <span>
                                        <span class="count">{{settings('years_operation')}}</span>
                                        <span>M</span>
                                    </span>
                                    <span> {{ trans('website.card1') }}</span>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-lg-3 col-md-3 col-sm-6 col-6 card-padding">
                                <a  class="card">
                                    <span>
                                        <span class="count">{{settings('revenue')}}</span>
                                        <span>+</span>
                                    </span>
                                    <span>{{ trans('website.card2') }}</span>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-lg-3 col-md-3 col-sm-6 col-6 card-padding">
                                <a  class="card">
                                    <span>
                                        <span class="count">{{settings('worldwide')}}</span>
                                        <span>M</span>
                                    </span>
                                    <span>{{ trans('website.card3') }}</span>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-lg-3 col-md-3 col-sm-6 col-6 card-padding">
                                <a  class="card">
                                    <span>
                                        <span class="count">{{settings('growth_rate')}}</span>
                                        <span></span>
                                    </span>
                                    <span>{{ trans('website.card4') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @if (isset($teams))
    <section style="overflow:hidden;">
        <div class="projects">
            <div class="project-text-side">
                <div class="row">
                    <div class="col-xxl-4 col-lg-4 col-md-6 col-sm-10 col-10  mg-center">
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