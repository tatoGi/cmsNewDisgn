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
            <div class="publication-page section-p">
                <div class="inner-section-title">
                    <div class="container">
                        <h2 class="font-32 line-54">{{$section->title}}</h2>
                    </div>
                </div>
                <div class="publication">
                    <div class="container">
                        <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-3">
                                <a href="/{{config('config.file_path').$post->translate(app()->getlocale())->locale_additional['publications']['file']}}" target="_blank">
                                    <div class="pub-card">
                                        <div class="icon">
                                            <span class="icon-publication"></span>
                                        </div>
    
                                        <div class="text font-20 line-32">
                                            {{$post->translate(app()->getlocale())->title}}
                                        </div>
    
                                        <div class="date font-18 line-34">
                                            {{$post->date}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
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
    <!--end::Entry-->
@endsection