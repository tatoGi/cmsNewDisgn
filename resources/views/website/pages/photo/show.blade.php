@extends('website.master')
@section('main')
  
  
  
  <main>
  @if(isset($breadcrumbs))



<section>

    <div class="container">

        <div class="b-r-c">

            <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>

            <span>/</span>
            <a href="/{{$section->getfullslug()}}">  {{ $section[app()->getlocale()]->title }}</a>
            <span>/</span>
            @foreach ($breadcrumbs as $breadcrumb)



            <a href="/{{ $breadcrumb['url'] }}">{{Str::limit($breadcrumb['name'] , 70 , $end='...' )}}</a>

          

            @endforeach



        </div>

    </div>

</section>

@endif

        <section class="mg-b-21">  
            <div class="photo-albums p-t-5">
                <div class="container">
                    <div class="albums-title">
                        <h1> {!! Str::limit($model->translate(app()->getlocale())->title, 50) !!}</h1>
                        <div class="text">
                        <!-- {{ $model->translate(app()->getlocale())->desc }} -->
                        </div>
                    </div>
                    <div class="photo-box">
                       
                        @foreach ($model->files as $file)
                        <a href="/{{ config('config.image_path') . $file->file }}" class="photo" data-fancybox="photos">
                            <img src="/{{ config('config.image_path') . $file->file }}" alt="product">
                           
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
           
        </section>
        @if(isset($photo_posts))   
        <section>

      
        <div class="container">
            <div class="pagination">
                @if(isset($photo_posts) && (count($photo_posts) > 0))
                {{ $photo_posts->links("website.components.pagination") }}
                @endif
            </div>
        </div>

    </section>
    @endif
        <section>
     
            <div class="important-title m-t-2">
                <span class="line-1"></span>
                <h1>{{ trans('admin.other_albums')}}</h1>
                <span class="line-1"></span>
            </div>
           
            <div class="news-slider">
            @if(isset($photo_posts) && (count($photo_posts) > 0)) 
                        @foreach($photo_posts as $post)
                        @if(!$loop->first)
                <div class="news-section padding m-b-22 padding-2">
                    <img src="/website/assets/img/Mask Group 158.svg" alt="svg" class="album-slider-pos">
                    <div class="container">
                        <div class="row row2 album-row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 news-position">
                                <div class="news-img-box">
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="news-text-box album-text-box">
                                     
                                    <h2 class="m-b-1">
                                        {!! Str::limit($post->translate(app()->getlocale())->title, 100) !!}
                                    </h2>
                                    <div class="text">
                                    {!! Str::limit($post->translate(app()->getlocale())->desc, 160) !!}
                            </div>
                                    <a href="/{{$post->getfullslug()}}" class="about-read-link m-t-1">
                                        <div class="read-link">{{trans('website.See_More')}}</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36.514" height="11.852" viewBox="0 0 36.514 11.852">
                                            <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right" transform="translate(0.75 1.061)">
                                              <g id="Arrow_-_Right" data-name="Arrow - Right" transform="translate(0 9.73) rotate(-90)">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M0,35.013V0" transform="translate(4.865 0)" fill="none" stroke="#e3662a" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                <path id="Stroke_3" data-name="Stroke 3" d="M9.73,0,4.865,4.886,0,0" transform="translate(0 30.128)" fill="none" stroke="#e3662a" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                              </g>
                                            </g>
                                          </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endif
            </div>
            <div class="container">
                <div class="slider-arrows">
                    <li>
                        <a  id="prev">
                            <span>    
                                <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382" viewBox="0 0 65.542 33.382">
                                    <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right" transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right" transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0" transform="translate(13.863)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="4"/>
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0" transform="translate(0 47.705)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="4"/>
                                    </g>
                                    </g>
                                </svg>
                            </span>
                            {{trans('admin.Prev')}}
                        </a>
                    </li>
                    <li>
                        <a  id="next">
                        {{trans('admin.Next')}}
                            <span>    
                                <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382" viewBox="0 0 65.542 33.382">
                                    <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right" transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right" transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0" transform="translate(13.863)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="4"/>
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0" transform="translate(0 47.705)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="4"/>
                                    </g>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    </li>
                </div>
            </div>
         
        </section>


 @include('website.components.progress')

    </main>
    @endsection