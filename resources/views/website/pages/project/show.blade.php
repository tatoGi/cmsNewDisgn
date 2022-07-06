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
        @if (isset($breadcrumbs))
            <section>
                <div class="bandcamp">
                    <div class="container">
                        <div class="row">
                            <ul>
                                <li><a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a></li>
                                @foreach ($breadcrumbs as $breadcrumb)
                                    <li><span class="icon-D-arrow d-arrow-b"> <i class="fa fa-chevron-down"
                                                aria-hidden="true"></i> </span></li>
                                    <li class="brand-colored"><a
                                            href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section>
            <div class="detail-content">
                <!-- <div class="special-row-box"> -->
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12 col-lg-12 col-md-12 p-r-1">
                            <div class="detail-text-area">
                                <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                                <h2>
                                    <h2>{{ Carbon\Carbon::parse($model->start_date)->format('d M, Y') }} -
                                        {{ Carbon\Carbon::parse($model->end_date)->format('d M, Y') }} | #Management</h2>
                                    <div class="text">{!! $model->translate(app()->getlocale())->text !!}</div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-lg-12 col-md-12 p-r-2">
                            <div class="row row-slider-mobile">
                                @foreach ($model->files as $image)
                                    <div class=" col-xxl-3 col-lg-3 col-md-6 col-slider">
                                        <div class="detail-image">
                                            <a data-fancybox="gallery-1" href="{{ image($image->file) }}">
                                                <img class="rounded" src="{{ image($image->file) }}" />
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div>        -->
            </div>
        </section>

        @if (isset($projects))
            <section>
                <div class="recent-projects">
                    <div class="container">
                        <div class="row">
                            <div class="ol-xxl-5 col-lg-5 col-md-6 col-sm-10 col-10 mg-center">
                                <div class="recent-project-text">
                                    <h1>{{ $projects->translate(app()->getlocale())->title }}</h1>
                                    <h3>{!! $projects->translate(app()->getlocale())->desc !!}</h3>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-lg-12 col-md-12 col-12">
                                <div class="projects-links">
                                    <div class="left-side-links">
                                        <button class="tablinks active-color" onclick="openPos(event, 'all')">All</button>
                                        @if (isset($services) && isset($services->posts) && count($services->posts) > 0)
                                            @foreach ($services->posts as $service)
                                                <button class="tablinks"
                                                    onclick="openPos(event, '{{ $service->translate(app()->getlocale())->title }}')">{{ $service->translate(app()->getlocale())->title }}</button>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="right-side-links">
                                        <a href="/{{ $projects->getfullslug() }}"
                                            class="all-projects-link">{{ trans('website.see_all_projects') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabcontent" id="all" style="display: block;">
                            <div class="row">
                                @if (isset($projects->posts) && count($projects->posts) > 0)
                                    @foreach ($projects->posts as $project)
                                        <div class="col-xxl-3 col-lg-3 col-md-3 col-sm-6 col-6 pad-l-r ">
                                            <a href="/{{ $project->getfullslug() }}" class="recent-item">
                                                <div class="recent-project-img">
                                                    <img src="{{ image($project->thumb) }}" alt="img">
                                                </div>
                                                <div class="recent-text">
                                                    <div class="recent-text-center">
                                                        <h2>{{$project->translate(app()->getlocale())->title}}</h2>
                                                    </div>
                                                    <div class="text">
                                                        {!! $project->translate(app()->getlocale())->text !!}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if (isset($services) && isset($services->posts) && count($services->posts) > 0)
                            @foreach ($services->posts as $service)
                                <div class="tabcontent" id="{{ $service->translate(app()->getlocale())->title }}">
                                    <div class="row">
                                        @if (isset($projects->posts) && count($projects->posts) > 0)
                                            @foreach ($projects->posts as $project)
                                                @if (isset($project->service) && count($project->service) > 0 && in_array($service->id, $project->service))
                                                    <div class="col-xxl-3 col-lg-3 col-md-3 col-sm-6 col-6 pad-l-r ">
                                                        <a href="/{{ $project->getfullslug() }}" class="recent-item">
                                                            <div class="recent-project-img">
                                                                <img src="{{ image($project->thumb) }}" alt="img">
                                                            </div>
                                                            <div class="recent-text">
                                                                <div class="recent-text-center">
                                                                    <h2>{{$project->translate(app()->getlocale())->title}}</h2>
                                                                </div>
                                                                <div class="text">
                                                                    {!! $project->translate(app()->getlocale())->text !!}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        @endif

    </main>
   
@endsection
