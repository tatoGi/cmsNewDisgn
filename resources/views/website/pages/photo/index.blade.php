@extends('website.master')
@section('main')


<main>
@if(isset($breadcrumbs))
    <section>
            <div class="container">
            
                <div class="b-r-c">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    <span>/</span>
                    @foreach ($breadcrumbs as $breadcrumb)
                    <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
                    @endforeach 
                </div>
            </div>
          
        </section>
        @endif
        @if(isset($photo))
      
        <section style="overflow-x: hidden;">
            <div class="important-title">
                <span class="line-1"></span>
                <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                <span class="line-1"></span>
            </div>
            @if(isset($photo_posts) && (count($photo_posts) > 0))
            @foreach($photo_posts as $key  => $photo)
            <div class="@if($key % 2 == 0)gallery-1 gallery @else gallery-2 gallery  @endif">
                <div class="container">
                    <div class="row gallery-row @if($key % 2 != 0) gallery-row-reverse @endif">
                        <div class="gallery-img">
                            <a href="/{{$photo->getfullslug()}}"  >
                                <img src="{{ image($photo->thumb) }}" alt="newsimg">
                            </a>
                        </div>
                        <div class="gallery-text">
                            <h2>{!! Str::limit($photo->translate(app()->getlocale())->title, 150) !!}</h2>
                             <div class="text">
                                 {!! Str::limit($photo->translate(app()->getlocale())->desc, 190) !!}
                            </div>
                            <a href="/{{$photo->getfullslug()}}" class="about-read-link">
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
                <img src="/website/assets/img/Mask Group 158.svg" alt="img" class="position-img">
            </div>
            @endforeach
            @endif
        </section>
        @endif
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
      
    </main>
    @endsection