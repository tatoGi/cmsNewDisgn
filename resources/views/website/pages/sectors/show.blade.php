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
        <div class="text-page section-p">
            <img src="/website/img/orange-tringle.png" alt="" class="orange-tringle">
            <div class="inner-section-title">
                <div class="container">
                    <h2 class="font-32 line-54">{{$post->translate(app()->getLocale())->title}}</h2>
                </div>
            </div>

            <div class="container">
                <div class="col-lg-10">
                    <div class="text-side">
                        <div class="text font-18 line-28">
                            {!!$post->translate(app()->getLocale())->text!!}
                        </div>
                    </div>

                    <div class="share-cions">
                        <img src="/website/img/f.png" alt="" style="margin-right: 10px;">
                        <img src="/website/img/t.png" alt="" style="margin-right: 10px;">
                        <img src="/website/img/l.png" alt="" style="margin-right: 10px;">
                    </div>

                    <div class="images">
                        <div class="row">
                            @foreach ($post->files as $image)
                            <div class="col-lg-4">
                                <a href="">
                                    <div class="img">
                                        <img src="{{image($image->file)}}" alt="">
                                    </div>
                                </a>
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
            <img src="website/img/dots.png" alt="" class="dot-cover-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-card">
                            <a href="">
                                <div class="image">
                                    <img src="/website/img/books.png" alt="">
                                </div>

                                <div class="title">
                                    <h3 class="font-20">Publication</h3>
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
                                    <h3 class="font-20">Profiles</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single-card">
                            <a href="">
                                <div class="image">
                                    <img src="/website/img/mandarin.png" alt="">
                                </div>

                                <img src="website/img/play.png" alt="" class="play-button">

                                <div class="title">
                                    <h3 class="font-20">Videos</h3>
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

<!--begin::