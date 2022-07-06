@extends('website.master')
@section('main')

<main>
@if(isset($breadcrumbs))
    <section>
            <div class="container">
            @foreach ($breadcrumbs as $breadcrumb)
                <div class="b-r-c">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    <span>/</span>
                    <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
                </div>
            </div>
            @endforeach 
        </section>
        @endif
        
    @if(isset($model->posts))
        <section>
            <div class="about-section about-section2 padding-b">
                <div class="container">
                    <div class="important-title">
                        <span class="line-1"></span>
                        <h1>{{$model[app()->getlocale()]->title}}</h1>
                        <span class="line-1"></span>
                    </div>
                    @if(isset($model->posts) && (count($model->posts) > 0))
                      @foreach($model->posts as $post)
                    <div class="about-position-box about-delete-after"> 
                        <div class="row wrap-row">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                <div class="about-image about-image2">
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-12  absolute-position">
                                <div class="text-box-h">
                                    <h2>{{$model->posts[0][app()->getLocale()]->title}}</h2>
                                    <div class="about-text mb-0">
                                    {!! $model->posts[0][app()->getLocale()]->desc !!}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="about-page-text">
                    {!! $model->posts[0][app()->getLocale()]->text!!}
                        <br>
                        <br>
                        <strong>{{trans('admin.Missions')}}</strong>
                        <br>
                        {!! $model->posts[0][app()->getLocale()]->Mission !!}
                        <br>
                        <br>
                        <strong>{{trans('admin.Vission')}}</strong>
                        <br>
                        {!! $model->posts[0][app()->getLocale()]->Vission !!}
                        <br>
                        <br>
                        <strong>{{trans('admin.History')}}</strong>
                        <br>
                        {!!$model->posts[0][app()->getLocale()]->History !!}
                       
                         
                    </div>
                    <div class="about-page-share-icons">
                        <h6>{{trans('admin.Sheare_this')}}</h6>
                        <div class="share-icons">
                            <a href="{{settings('facebook')}}">
                                <span class="icon-face"></span>
                            </a>
                            <a href="{{settings('linkedin')}}">
                                <span class="icon-tw"></span>
                            </a>
                            <a href="{{settings('instagram')}}">
                                <span class="icon-inst"></span>
                            </a>
                        </div>
                    </div>
                    <div class="about-page-img-gallery">
                    @foreach ($model->posts[0]->files as $file)
                    @if($file->file != $post->thumb)
                                
                        <a href="/{{ config('config.image_path') . $file->file }}" data-fancybox="video-inner">
                            <img src="/{{ config('config.image_path') . $file->file }}" alt="">
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif

            
    @include('website.components.progress')
    </main>
    @endsection