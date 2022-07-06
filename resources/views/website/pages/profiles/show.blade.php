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
        <div class="profile-inner">
            <div class="container">


                <div class="row">
                    <div class="col-lg-8">
                        <div class="title">
                            <h2 class="font-28 line-38">{{$post->translate(app()->getlocale())->title}}</h2>
                        </div>

                        <div class="date">
                            <span class="font-20 line-38">Year Of Foundation - {{$post->year_of_establishment}}; </span>
                        </div>

                        <div class="sector">
                            <span class="font-20 line-38">Sector - {{$post->sector[1]}} </span>
                        </div>

                        <div class="location">
                            <i class="icon-yellow-arrow"></i><span class="font-22 line-54">{{$post->municipality}}</span>
                        </div>

                        <div class="text font-20 line-30">
                            <div class="text-title font-20 line-54">
                                Description
                            </div>
                            {!!$post->translate(app()->getlocale())->text!!}
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="contact-button">
                            <a href=""><span class="icon-plane"></span>Contact Us</a>
                        </div>

                        <div class="" style="padding-left: 52px;">
                            <div class="address">
                                <i class="icon-pin"></i><span class="font-18 line-50">{{$post->translate(app()->getlocale())->address}}</span>
                            </div>

                            <div class="contact-person">
                            {!!$post->translate(app()->getlocale())->contact_person!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-inner-gallery">
            <img src="assets/img/dots.png" alt="" class="dot-cover">
            <div class="gray-cover"></div>
            <div class="container">
                <div class="title font-28 line-54">
                    <span>Gallery</span>
                </div>
                <div class="row">
                            @foreach ($post->files as $image)
                    <div class="col-lg-3">
                        <a href="{{image($image->file)}}" data-fancybox="profile">
                            <div class="image">
                                <img src="{{image($image->file)}}" alt="">
                            </div>
                        </a>
                    </div>                               
                            @endforeach 
                </div>
            </div>
        </div>
    </section>

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