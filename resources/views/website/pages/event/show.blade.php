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
        <div class="events-inner-page section-p">
            <div class="container">
                <div class="title">
                    <h2 class="font-32 line-46">{{$post->translate(app()->getLocale())->title}}</h2>
                </div>

                <div class="date-pin">
                    <div class="date">
                        <i class="icon-calendar"></i><span class="font-18 line-30">{{$post->additional['start_date']}} - {{$post->additional['end_date']}}</span>
                    </div>

                    <div class="pin">
                        <i class="icon-pin"></i><span class="font-18 line-30">{{$post->additional['location']}}</span>
                    </div>
                </div>

                <div class="text font-18 line-28">{!!$post->translate(app()->getLocale())->text!!}
                </div>

                <div class="share-cions">
                
                @if($post->additional['facebook'] != '')
                <a href="/{{$post->additional['facebook']}}" target="blank">
                    <img src="/website/img/f.png" alt="{{$post->additional['facebook']}}" style="margin-right: 10px;">
                </a>
                    @endif
                @if($post->additional['twitter'] != '')
                <a href="/{{$post->additional['twitter']}}" target="blank">
                    <img src="/website/img/t.png" alt="" style="margin-right: 10px;">
                </a>
                    @endif
                @if($post->additional['linkedin'] != '')
                <a href="/{{$post->additional['linkedin']}}" target="blank">
                    <img src="/website/img/l.png" alt="" style="margin-right: 10px;">
                </a>
                    @endif
                </div>
            </div>

        </div>



        <div class="registration">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="registration-info">
                            <div class="title font-24 line-46">
                                Would You Like To Registration On This Event?
                            </div>

                            <div class="text font-18 line-28">
                                Georgia serves as an entry gate to the Caucasus and Central Asiaas well as a
                                stepping stone to the region. Leveraging transport economy of Georgia can benefit
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="registration-button">
                            <button id="myBtn"><span class="icon-check"></span>Registration</button>
                        </div>
                    </div>

                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="font-30">Event Registration Form</h2>
                                <span class="close">&times;</span>
                            </div>

                            <div class="registration-form">
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-place">
                                                <label for="">Name<i style="color: red;">*</i></label>
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-place">
                                                <label for="">Laset Name<i style="color: red;">*</i></label>
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-place">
                                                <label for="">Organization</label>
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-place">
                                                <label for="">Phone<i style="color: red;">*</i></label>
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-place">
                                                <label for="">Email<i style="color: red;">*</i></label>
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-place">
                                                <label for="">Additional Information</label>
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button">
                                        <button class="font-20 line-32" type="submit">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
@endsection