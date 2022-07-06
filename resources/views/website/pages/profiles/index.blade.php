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


    <div class="profiles-page section-p">
        <div class="container">
            <div class="inner-section-title">
                <div class="container">
                    <h2 class="font-32 line-54">{{$section->title}}</h2>
                </div>
            </div>
        </div>

        <div class="profile">
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profiles-menu">
                            <div class="tab menu-tab">
                                @if(isset($sectors->posts) && (count($sectors->posts) > 0))
                                <button class="tablinks font-24 line-38 active" onclick="openCity(event, 'All')">All</button>
                                @foreach($sectors->posts as $key => $sector)
                                <button class="tablinks font-24 line-38" onclick="openCity(event, '{{$key}}')">{{$sector[app()->getlocale()]->title}}</button>
                                @endforeach
                                @endif
                            </div>

                            <img src="assets/img/dots.png" alt="" class="profiles-menu-cover">
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="profile-cards tabcontent" id="All" style="display: block;">
                            <div class="row">
                                @if(isset($section->posts) && (count($section->posts) > 0))
                                @foreach($section->posts as $key => $company)
                                <div class="col-lg-4">
                                    <a href="{{$company->getfullslug()}}">
                                        <div class="prof-card">
                                            <img src="{{image($company->thumb)}}" alt="">

                                            <div class="cover">
                                                <div class="title font-20">
                                                {{$company[app()->getlocale()]->title}}
                                                </div>

                                                <div class="location">
                                                    <span><i class="icon-pin"></i>{{$company->municipality}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="partners-section">
            <div class="container">
                <div class="title-link">
                    <div class="section-title">
                        <h2 class="font-32 line-54">Partners</h2>
                    </div>

                    <div class="link">
                        <a href="">All Partners</a>
                    </div>
                </div>

                <div class="partner-logos">
                    <div class="logo">
                        <a href="">
                            <img src="/website/img/gerbi-yellow.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="assets/img/turizmi.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="assets/img/logo 200px.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="assets/img/EnterpriseGeorgia-GEO.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="assets/img/gerbi-yellow.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="footer-banner">
            <div class="container">
                <div class="logos-row">
                    <div class="log">
                        <a href="">
                            <img src="assets/img/f1.png" alt="">
                        </a>
                    </div>

                    <div class="log">
                        <a href="">
                            <img src="assets/img/f2.png" alt="">
                        </a>
                    </div>

                    <div class="log">
                        <a href="">
                            <img src="assets/img/f3.png" alt="">
                        </a>
                    </div>

                    <div class="log">
                        <a href="">
                            <img src="assets/img/f4.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="text">
                    The web page was developed within the Fostering Regional and Local Development in Georgia, Phase 2 project implemented by the United Nations Development Programme (UNDP) with the support of the Swiss Agency for Development and Cooperation (SDC), the Austrian Development Cooperation (ADC) and the Ministry of Regional Development and Infrastructure of Georgia.
                </div>
            </div>
        </div>
    </section>
</main>
@endsection