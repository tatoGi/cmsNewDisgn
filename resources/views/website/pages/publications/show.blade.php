@extends('website.layout')

@section('content')


<section class="aboutus-section news-show-section section1 publication-section">
    <div class="container">
        <div class="row ">
            <div class="parenttpub">
                <div class="content">
                    <div class="titles">
                        <a href=""><span></span>RELATED DOCUMENTS</a>
                    </div>
                    <h2>{{$post->translate(app()->getLocale())->title}}</h2>
                    <span class="date">{{getDates($post->date)}}</span>
                    <span class="downloadspan">Download : </span>
                    <div class="file-part">
                        <!-- <i class="icon-home"></i> -->
                        <img src="/website/img/pdf (1).png" alt="">
                        @if(isset(json_decode($post->translate(app()->getLocale())->locale_additional)->publications))
                        <a href="/{{config('config.file_path').json_decode($post->translate(app()->getLocale())->locale_additional)->publications->file}}">{{json_decode($post->translate(app()->getLocale())->locale_additional)->publications->name}}</a> 
                        
                        @else
                        @endif 
                    </div> 
                </div>
                <div class="pubinmobileparent">
                    <div class="seeealld">
                        <div class="cardd">
                            <img src="{{image($post->thumb)}}" alt="">

                        </div>
                    </div>
                </div>
            </div>
            <div class="text">
            </div> 
        </div>
    </div>
</section>
<section class="aboutus-section news-show-section section2">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="content">
                    <div class="titles">
                        <a href=""><span></span>RELATED DOCUMENTS</a>
                    </div>
                    <h2>{{$post->translate(app()->getLocale())->title}}</h2>
                    <span class="date">{{getDates($post->date)}}</span>
                    <div class="text">
                    </div> 
            <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="seeealld">
                        <div class="cardd">
                            <img src="{{image($post->thumb)}}" alt="">

                            @if(isset(json_decode($post->translate(app()->getLocale())->locale_additional)->publications))
                            <span class="downloadspan">Download : </span>
                            <div class="file-part">
                                <!-- <i class="icon-home"></i> -->
                                <img src="/website/img/pdf (1).png" alt="">
                                <a href="/{{config('config.file_path').json_decode($post->translate(app()->getLocale())->locale_additional)->publications->file}}" target="blank">{{json_decode($post->translate(app()->getLocale())->locale_additional)->publications->name}}</a>
                            </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</section>
@endsection
