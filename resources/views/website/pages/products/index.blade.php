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

    @if(isset($products))
    <section class="padding-b">
        <div class="important-title">
            <span class="line-1"></span>
            <h1>{{$model[app()->getlocale()]->title}}</h1>

            <span class="line-1"></span>
        </div>
        <div class="filter-title-close">
                <div class="container">
                    <div class="filter-flex">
                        <h2>FILTER</h2>
                        <div class="filter-close ">  
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.451" height="15.451" viewBox="0 0 15.451 15.451">
                                <g id="Group_1843" data-name="Group 1843" transform="matrix(0.695, 0.719, -0.719, 0.695, 7.967, -5.987)">
                                <rect id="Rectangle_132" data-name="Rectangle 132" width="1.959" height="19.588" rx="0.979" transform="translate(8.815 0)" fill="#414141"/>
                                <rect id="Rectangle_133" data-name="Rectangle 133" width="1.959" height="19.588" rx="0.979" transform="translate(0 10.578) rotate(-90)" fill="#414141"/>
                                </g>
                            </svg>
                        </div>
                    </div>  
                </div> 
            </div>
        <div class="container">

            <div class="row">



                <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-12">
                    <div class="select-categories-box">
                        <h2>{{trans('website.Product_Categories')}}</h2>
                        <hr>
                        <div class="categories-list">
                            <ul class="list-ul">
                                <li class="list-li opened">
                                    <a href="/{{$products->getfullslug()}}" >{{trans('website.all')}}</a>
                                    <span></span>
                                </li>
                                
                                @foreach($category as $key => $cat)
                                @if($cat ==! 0)
                                @if ($cat->children ==! 0)
                                    
                                <li  class="list-li tablinks @if(isset($filter_category) && ($cat->id == $filter_category->id )) opened @endif" >
                               
                                  
                                    <a href="/{{$products->getfullslug()}}?category={{$cat->id}}" >{{ $cat->translate(app()->getlocale())->title }}</a>
                                 
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                            viewBox="0 0 9.414 16.828">
                                            <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                transform="translate(8 1.414) rotate(90)">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M14,0,7,7,0,0" fill="none"
                                                    stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </span>

                                    @foreach ($cat->children as $subSec)
                                    <ul class="child-ul tablinks">

                                        <li  class=" @if(isset($filter_category) && ($subSec->id == $filter_category->id )) opened @endif">
                                            <a href="/{{$products->getfullslug()}}?category={{$subSec->id}}" >{{ ($subSec[app()->getlocale()]->title) }}</a>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                                    viewBox="0 0 9.414 16.828">
                                                    <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                        transform="translate(8 1.414) rotate(90)">
                                                        <path id="Stroke_1" data-name="Stroke 1" d="M14,0,7,7,0,0"
                                                            fill="none" stroke="#000" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10"
                                                            stroke-width="2" />
                                                    </g>
                                                </svg>
                                            </span>
                                            @if ($subSec->children ==! 0)
                                            @foreach ($subSec->children as $CsubSec)

                                            <ul class="child-ul tablinks">
                                                <li class=" @if(isset($filter_category) && ($CsubSec->id == $filter_category->id )) opened @endif">
                                                    <a href="/{{$products->getfullslug()}}?category={{$CsubSec->id}}">{{ ($CsubSec[app()->getlocale()]->title) }}</a>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414"
                                                            height="16.828" viewBox="0 0 9.414 16.828">
                                                            <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                                transform="translate(8 1.414) rotate(90)">
                                                                <path id="Stroke_1" data-name="Stroke 1"
                                                                    d="M14,0,7,7,0,0" fill="none" stroke="#000"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-miterlimit="10" stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    @if ($CsubSec->children ==! 0)
                                            @foreach ($CsubSec->children as $DsubSec)
                                           
                                            <ul class="child-ul">
                                                <li class=" @if(isset($filter_category) && ($DsubSec->id == $filter_category->id )) opened color2 @endif">
                                                    <a href="/{{$products->getfullslug()}}?category={{$DsubSec->id}}" onclick="openPos(event, '{{$DsubSec->id}}')">{{ ($DsubSec[app()->getlocale()]->title) }}</a>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414"
                                                            height="16.828" viewBox="0 0 9.414 16.828">
                                                            <g id="Arrow_-_Left_2" data-name="Arrow - Left 2"
                                                                transform="translate(8 1.414) rotate(90)">
                                                                <path id="Stroke_1" data-name="Stroke 1"
                                                                    d="M14,0,7,7,0,0" fill="none" stroke="#000"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-miterlimit="10" stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </span>

                                                </li>
                                    
                                               
                                            </ul>
                                            @endforeach
                                            @endif
                                                </li>
                                    
                                               
                                            </ul>
                                            @endforeach
                                            @endif
                                          
                                        </li>


                                    </ul>
                                    @endforeach
                                    @endif
                                </li>
                                @endif
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8 col-md-8 col-sm-12">
                    <div class="products-container">
                        <div class="form-box">
                            <div class="product-search-result">
                                <h2>{{$products->translate(app()->getlocale())->title}}</h2>
                                <h4>
                                {{trans('website.found')}} <span>{{ $products_posts->total() }} </span> 
                                </h4>
                                <div class="filter-button">
                                        <span>Filter</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.511" viewBox="0 0 19.5 19.511">
                                            <path id="Stroke_1" data-name="Stroke 1" d="M1.565,0A1.579,1.579,0,0,0,0,1.59v.936A2.549,2.549,0,0,0,.689,4.272L5.535,9.424l0,0A5.157,5.157,0,0,1,7,13.023V17.6a.4.4,0,0,0,.585.356l2.76-1.5A1.309,1.309,0,0,0,11.02,15.3V13.011a5.153,5.153,0,0,1,1.446-3.587l4.846-5.153A2.553,2.553,0,0,0,18,2.526V1.59A1.578,1.578,0,0,0,16.436,0Z" transform="translate(0.75 0.75)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                            </div>
                            <form action="/{{ app()->getLocale() }}/SearchProduct" method="GET" role="SearchProduct">
                                        <input id="MyInput" type="text" placeholder="{{ trans('website.search') }}..." name="que" value="@if(isset($que)) {{$que}} @endif">
                                      
                                <button>
                                    <svg id="search-normal" xmlns="http://www.w3.org/2000/svg" width="20.493"
                                        height="20.493" viewBox="0 0 20.493 20.493">
                                        <path id="Vector"
                                            d="M16.224,8.112A8.112,8.112,0,1,1,8.112,0,8.112,8.112,0,0,1,16.224,8.112Z"
                                            transform="translate(1.708 1.708)" fill="none" stroke="#414141"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" />
                                        <path id="Vector-2" data-name="Vector" d="M1.708,1.708,0,0"
                                            transform="translate(17.078 17.078)" fill="none" stroke="#414141"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" />
                                        <path id="Vector-3" data-name="Vector" d="M0,0H20.493V20.493H0Z"
                                            transform="translate(0 0)" fill="none" opacity="0" />
                                    </svg>
                                </button>
                            </form>
        
                        </div>
                
                        <div class="products-list" id="prosearch">
                        @if(isset($products_posts) && (count($products_posts) > 0))
                            @foreach($products_posts as $post)
                          
                           
                        
                            <a href="/{{$post->getfullslug()}}#{{$post->id}}" class="product-list-item"  id="{{$post->category}}">
                           
                                <div class="list-img">
                                   @if(isset($post->thumb))
                                   
                                    <img src="{{ image($post->thumb) }}" alt="img">
                                    @else
                                   <img src="/uploads/img/blue.png" alt="img">
                                   @endif
                                    <div class="photo-hover">
                                        <div class="text">
                                            {!! $post->translate(app()->getlocale())->desc !!}
                                        </div>
                                    </div>
                                </div>
                                <h3>{{$post->translate(app()->getlocale())->title}}</h3>
                            </a>
                           
                            @endforeach
                            @endif
                        </div>
                       

                    </div>
                </div>
            </div>

        </div>

    </section>
    @endif


    <section>
        <div class="container">
            <div class="pagination">
                @if(isset($products_posts) && (count($products_posts) > 0))
                {{ $products_posts->links("website.components.pagination") }}
                
                @endif
            </div>
        </div>

    </section>
</main>

@endsection
