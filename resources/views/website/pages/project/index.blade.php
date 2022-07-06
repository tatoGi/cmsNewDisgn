@extends('website.master')
@section('main')
<main>
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
            </div>
        </section>
    @endif
    @if(isset($breadcrumbs))
    <section style="overflow-x:hidden;">
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
    <section style="overflow-x:hidden;">
        <div class="text-section">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-lg-12 col-md-12 col-12 border-first">
                        <div class="row">
                            <div class="col-xxl-8 col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="text-area m-b-2">
                                    <div class="title-text">
                                        <h1>{{$model->title}}</h1>
                                    </div>
                                    <div class="text">{!! $model->desc !!}</div>
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
    </section>

    @if (isset($projects))
    <section style="overflow:hidden;">
        <div class="recent-projects p-t ">
            <div class="container">

                <div class="row">
                    <div class="col-xxl-12 col-lg-12 col-md-12 col-12">
                        <div class="projects-links">
                            <div class="team-list-links">
                                <h1>{{$projects->translate(app()->getlocale())->title}}</h1>
                                <div class="list-links">

                                    <button class="tablinks active-color" onclick="openPos(event, 'all')">{{ trans('website.all') }}</button>

                                    @if(isset($services) && isset($services->posts) && (count($services->posts) > 0))
                                    @foreach($services->posts as $service)
                                    <button class="tablinks" onclick="openPos(event, '{{$service->translate(app()->getlocale())->title}}')">{{$service->translate(app()->getlocale())->title}}</button>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs">
                    <div class="tabcontent" id="all" style="display: block;">
                        <div class="row">
                            @if(isset($project_posts) && (count($project_posts) > 0))
                            @foreach($project_posts as $project)
                            <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6 pad-l-r">
                                <a href="/{{$project->getfullslug()}}" class="recent-item">
                                    <div class="recent-project-img">
                                        <img src="{{ image($project->thumb) }}" alt="img">
                                    </div>
                                    <div class="recent-text">
                                        <div class="recent-text-center">
                                            <h2>{{$project->translate(app()->getlocale())->title}}</h2>
                                        </div>
                                        <div class="text">
                                            {!! $project->translate(app()->getlocale())->text!!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                @if(isset($services) && isset($services->posts) && (count($services->posts) > 0))
                @foreach($services->posts as $service)
                <div class="tabs">
                    <div class="tabcontent " id="{{$service->translate(app()->getlocale())->title}}">
                        <div class="row">
                            @if(isset($projects->posts) && (count($projects->posts) > 0))
                            @foreach($projects->posts as $project)
                            @if(isset($project->service) && (count($project->service) > 0) && in_array($service->id, $project->service))
                            <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6 pad-l-r">
                                <a href="/{{$project->getfullslug()}}" class="recent-item">
                                    <div class="recent-project-img">
                                        <img src="{{ image($project->thumb) }}" alt="img">
                                    </div>
                                    <div class="recent-text">
                                        <div class="recent-text-center">
                                            <h2>{{$project->translate(app()->getlocale())->title}}</h2>
                                            
                                        </div>
                                        <div class="text">
                                            {!! $project->translate(app()->getlocale())->text!!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
       
            </div>
            
           
        </div>
    </section>
    @if(isset($project_posts) && (count($project_posts) > 0))
    {{ $project_posts->links("website.components.pagination") }}
@endif
        
    @endif
 
</main>
@endsection