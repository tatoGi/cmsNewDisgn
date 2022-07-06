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
    <section>
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
    
    <section class="services-section">
        
                
        
                @if(isset($service_posts) && (count($service_posts) > 0))
                @foreach($service_posts as $service)
                <div class="services-boxes"  id="{{ $service->id }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-9 col-lg-9 col-md-9 col-12">
                                <div class="service-text-box">
                                    <div class="img-icon">
                                        <img src="/{{ config('config.file_path') . $service->additional['icon'] }}" alt="">
                                    </div>
                                    <h1>{{$service->translate(app()->getlocale())->title}}</h1>
                                    <div class="text">{!! $service->translate(app()->getlocale())->desc !!}
                                    </div>
                                    <ul>
                                        @if(($service[app()->getLocale()]->keywords != '') && is_array(explode(",", $service[app()->getLocale()]->keywords)))
                                        @foreach(explode(",", $service[app()->getLocale()]->keywords) as $keywords)
                                            <li><a>{{ $keywords }}</a></li>
                                            @endforeach
                                            @endif
                                    </ul>
                                    <a href="{{$service->BookNow}}"target="_blank" class="booking-service">Book a service</a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-3 col-md-3 hide-service-img">
                                <div class="service-box-right-img d-flex align-items-center">
                                   
                                        <div class="service-box-img">
                                            <a data-fancybox="gallery-1" href="{{ image($service->thumb) }}">
                                                <img  src="{{ image($service->thumb) }}" />
                                            </a>
                                           
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
      
        </section>
        @if(isset($service_posts) && (count($service_posts) > 0))
        {{ $service_posts->links("website.components.pagination") }}
    @endif
</main>
@endsection
