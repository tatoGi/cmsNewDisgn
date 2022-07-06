@extends('website.master')
@section('main')

<main>
    @if (isset($section->cover) )
    <div class="section-banner">
        <div class="section-cover">
            <img src="{{image($section->cover)}}" alt="">
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="crumbs font-18 line-54">
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    @else
                    <a href="@if($loop->first)/ @else{{ $breadcrumb['url'] }} @endif">{{ $breadcrumb['name'] }}</a>
                    <span></span>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="section-banner">
        <div class="section-cover">
            <img src="/website/img/banner.png" alt="">
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="crumbs font-18 line-54">
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    @else
                    <a href="@if($loop->first)/ @else{{ $breadcrumb['url'] }} @endif">{{ $breadcrumb['name'] }}</a>
                    <span></span>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <section>
        <div class="banners-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="key-sectors">
                            <div class="inner-section-title key-sector">
                                <div class="container">
                                    <h2 class="font-32 line-54">{{$model->title}}</h2>
                                </div>
                            </div>
                            <div class="menu">
                                @foreach ($model->posts as $item)
                                <a href="{{$model->getfullslug()}}/{{ $item->translate(app()->getlocale())->slug }}" class="font-20 line-36">{{$item->translate(app()->getlocale())->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($model->posts as $key => $item)
                            <div class="col-lg-4 p-0">
                                
                            <div class="@if($key == 1)banner-2 banner-w yellow banner-relative @elseif($key == 2)banner banner-w banner-relative-2 @elseif($key == 3)banner-2 banner-w blue @elseif($key == 4)banner banner-w banner-relative  @elseif($key == 5) banner-2 banner-w orange banner-relative-2 @else banner banner-w  @endif">
                                    <a href="{{$item->getfullslug()}}">
                                        @if($key % 2 == 1)
                                        <div class="color-side">
                                            <div class="img">
                                                <img src="/website/img/tour.png" alt="">
                                            </div>

                                            <div class="text font-24 line-32">
                                                {{$item->translate(app()->getlocale())->title}}
                                            </div>
                                        </div>

                                        <div class="cover">
                                            <img src="{{ image($item->thumb) }}" alt="">
                                        </div>
                                        @else
                                        <div class="img">
                                            <img src="{{ image($item->thumb) }}" alt="">
                                        </div>


                                        <div class="banner-hover">
                                            <div class="img">
                                                <img src="/website/img/construct.png" alt="">
                                            </div>

                                            <div class="text font-24 line-32">
                                                {{$item->translate(app()->getlocale())->title}}
                                            </div>
                                        </div>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="cards-row">
            <img src="/website/img/dots.png" alt="" class="dot-cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-card">
                            <a href="">
                                <div class="image">
                                    <img src="/website/img/forest.png" alt="">
                                </div>

                                <div class="title">
                                    <h3 class="font-20">Why Samegrelo</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single-card">
                            <a href="">
                                <div class="image">
                                    <img src="/website/img/geo.png" alt="">
                                </div>

                                <div class="title">
                                    <h3 class="font-20">Why Samegrelo</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single-card">
                            <a href="">
                                <div class="image">
                                    <img src="/website/img/factory.png" alt="">
                                </div>

                                <div class="title">
                                    <h3 class="font-20">Why Samegrelo</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection