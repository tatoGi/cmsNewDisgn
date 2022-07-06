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


        <div class="municipal section-p">
            <div class="container">
                <div class="title">
                    <h2 class="font-32 line-54">{{$post->translate(app()->getlocale())->title}}</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="text font-20 line-30">
                        {!!$post->translate(app()->getlocale())->text!!}
                        </div>

                        <div class="website">
                            <span class="font-22 line-54">Officia Website</span> <a href="{{$post->website}}" target="_blank">{{$post->website}}</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="region-image">
                            <img src="{{image($post->thumb)}}" alt="">
                        </div>
                    </div>
                </div>
                

                <div class="municipal-inner-banner">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="">
                                <div class="banner banner-video">
                                    <img src="assets/img/video-big.png" alt="">
    
                                    <span class="font-22 line-54">Videos</span>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="">
                                <div class="banner banner-profile">
                                    <img src="assets/img/portfel.png" alt="">
    
                                    <span class="font-22 line-54">Profiles</span>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="">
                                <div class="banner banner-pub">
                                    <img src="assets/img/pub.png" alt="">
    
                                    <span class="font-22 line-54">Publications</span>
                                </div>
                            </a>
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
                            <img src="/website/img/turizmi.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="/website/img/logo 200px.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="/website/img/EnterpriseGeorgia-GEO.png" alt="">
                        </a>
                    </div>

                    <div class="logo">
                        <a href="">
                            <img src="/website/img/gerbi-yellow.png" alt="">
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
                            <img src="/website/img/f1.png" alt="">
                        </a>
                    </div>

                    <div class="log">
                        <a href="">
                            <img src="/website/img/f2.png" alt="">
                        </a>
                    </div>

                    <div class="log">
                        <a href="">
                            <img src="/website/img/f3.png" alt="">
                        </a>
                    </div>

                    <div class="log">
                        <a href="">
                            <img src="/website/img/f4.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="text">
                    The web page was developed within the Fostering Regional and Local Development in Georgia, Phase 2
                    project implemented by the United Nations Development Programme (UNDP) with the support of the Swiss
                    Agency for Development and Cooperation (SDC), the Austrian Development Cooperation (ADC) and the
                    Ministry of Regional Development and Infrastructure of Georgia.
                </div>
            </div>
        </div>
    </section>
    </main>
@endsection