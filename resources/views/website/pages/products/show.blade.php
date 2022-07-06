@extends('website.master')

@section('main')







<main>

    @if(isset($breadcrumbs))



    <section>

        <div class="container">

            <div class="b-r-c">

                <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>

                <span>/</span>
                <a href="/{{$section->getfullslug()}}"> {{ $section[app()->getlocale()]->title }}</a>
                <span>/</span>
                @foreach ($breadcrumbs as $breadcrumb)



                <a href="/{{ $breadcrumb['url'] }}">{{Str::limit($breadcrumb['name'] , 70 , $end='...' )}}</a>



                @endforeach



            </div>

        </div>

    </section>

    @endif



    <section>

        <div class="products-det-cont p-t-5">

            <div class="container">



                <div class="row center-row">



                    <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-8 col-12 ">

                        <div class="tab-img-products">

                            <div class="tab-img-box-position">

                                @foreach ($model->files as $file)
                                @if($file->file != $model->thumb)

                                <div class="tab-img-item">

                                    <img src="/{{ config('config.image_path') . $file->file }}" alt="Nature"
                                        onclick="myFunction(this);">

                                </div>
                                @endif
                                @endforeach

                            </div>

                            <div class="fancy-gallery-items">
                                @if(isset($model->thumb))

                                <a href="{{ image($model->thumb) }}" data-fancybox="tab-img" id="tab-fancy">
                                    <img id="expandedImg" style="width:100%" src="{{ image($model->thumb) }}">
                                </a>
                                 @else
                                <a href="/uploads/img/blue.png" data-fancybox="tab-img" id="tab-fancy">
                                    <img id="expandedImg" style="width:100%" src="/uploads/img/blue.png">
                                </a>
                                @endif

                                @foreach ($model->files as $file)
                                @if($file->file != $model->thumb)
                                <a href="/{{ config('config.image_path') . $file->file }}" data-fancybox="tab-img"
                                    id="tab-fancy">
                                    <img id="expandedImg" style="width:100%"
                                        src="/{{ config('config.image_path') . $file->file }}">

                                </a>
                                @endif
                                @endforeach

                            </div>


                            <div class="tab-zoom">

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

                            </div>

                        </div>

                    </div>



                    <div class="col-xxl-9 col-lg-8 col-md-8 col-sm-12 col-12">

                        <div class="container-components-box">

                            <h1 class="container-name">

                                {{ $model[app()->getlocale()]->title }}

                            </h1>
                            @if(isset($filter_category))

                            <div class="cont-snt">

                                @foreach($filter_category as  $filter)
                                
                                @if(isset($filter->parent->parent))
                                <a href="/{{$products->getfullslug()}}?category={{$filter->parent->parent->id}}">{{$filter->parent->parent->translate(app()->getlocale())->title}}
                                    <span>-</span> </a>
                                    @endif
                                    @if(isset($filter->parent))
                                <a href="/{{$products->getfullslug()}}?category={{$filter->parent->id}}">{{$filter->parent->translate(app()->getlocale())->title}}
                                    <span>-</span> </a>
                                    @endif
                                <a href="/{{$products->getfullslug()}}?category={{$filter->id}}">{{$filter->translate(app()->getlocale())->title}}
                                    <span>-</span>
                                </a>
                                   
                                @endforeach





                            </div>
                            @endif
                            <div class="container-description">

                                <h3> {{trans('admin.Description')}}:</h3>

                                <div class="text">

                                    {!! $model[app()->getlocale()]->text !!}

                                </div>

                            </div>

                            <div class="container-components">

                                <div class="c-weight c-c-t">

                                    <h5> {{trans('admin.Weight')}}:</h5>

                                    <div class="weight">

                                        @if(($model[app()->getLocale()]->Weight != '') && is_array(explode(",",
                                        $model[app()->getLocale()]->Weight)))
                                        @foreach(explode(",", $model[app()->getLocale()]->Weight) as $Weight)
                                        <div>

                                            <span>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="12.6" height="9.226"
                                                    viewBox="0 0 12.6 9.226">

                                                    <path id="Path"
                                                        d="M12.237,2.124,5.49,8.871a1.252,1.252,0,0,1-1.747,0L.362,5.5A1.245,1.245,0,0,1,2.124,3.743L4.609,6.229,10.476.362a1.245,1.245,0,0,1,1.761,1.761"
                                                        fill="#e3662a" />

                                                </svg>

                                            </span>
                                            <span>

                                                {{$Weight}}



                                            </span>

                                        </div>


                                        @endforeach
                                        @endif

                                    </div>

                                </div>

                                <div class="c-size c-c-t">
                                    <h5> {{trans('admin.Size')}}:</h5>

                                    <div class="size">


                                        @if(($model[app()->getLocale()]->Size != '') && is_array(explode(",",
                                        $model[app()->getLocale()]->Size)))
                                        @foreach(explode(",", $model[app()->getLocale()]->Size) as $Size)
                                        <div>

                                            <span>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="12.6" height="9.226"
                                                    viewBox="0 0 12.6 9.226">

                                                    <path id="Path"
                                                        d="M12.237,2.124,5.49,8.871a1.252,1.252,0,0,1-1.747,0L.362,5.5A1.245,1.245,0,0,1,2.124,3.743L4.609,6.229,10.476.362a1.245,1.245,0,0,1,1.761,1.761"
                                                        fill="#e3662a" />

                                                </svg>

                                            </span>

                                            <span>

                                                {{$Size}}





                                            </span>

                                        </div>
                                        @endforeach
                                        @endif
                                    </div>

                                </div>

                                <div class="c-m-q c-c-t">

                                    <h5>

                                        {{trans('admin.Measurement')}}:

                                        <span>{!! $model[app()->getlocale()]->Measurement !!}</span>



                                    </h5>

                                    <h5>

                                        {{trans('admin.Minimum_Quantity')}}:

                                        <span>{!! $model->Minimum_Quantity !!}</span>

                                    </h5>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>


                <div class="det-socials">

                    <div class="share-icons">

                        <a  data-href="/{{$model->getfullslug()}}"
                                data-layout="button_count" data-size="small"><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://europack.ge/{{$model->getfullslug()}}&amp;src={{$model->translate(app()->getlocale())->title}}" class="fb-xfbml-parse-ignore">


                                

                                <span class="icon-face"></span>

                            </a>
                            

                            <a class="twitter-share-button"
                            href="https://twitter.com/intent/tweet?text=https://europack.ge/{{$model->getfullslug()}}" target="_blank">

                                <span class="icon-tw"></span>

                            </a>

                            <a href="{{$model->instagram}}">

                                <span class="icon-inst"></span>

                            </a>

                    </div>

                </div>
            </div>

        </div>

    </section>









    <section>
        <div class="important-title m-t-2">
            <span class="line-1"></span>
            <h1>{{ trans('admin.Other_products') }}</h1>
            <span class="line-1"></span>
        </div>
            
        <div class="container">
            <div class="row">
                
                <div class="containers-slider">
                    @if(isset($products_posts) && (count($products_posts) > 0))
                    @foreach($products_posts as $post)
                    @if(isset($post->additional['category']))

                    @if($model->id !== $post->id)

                    <div class="col-xxl-2 col-lg-2 col-md-2 col-sm-4 col-6">
                        <a href="/{{$post->getfullslug()}}" class="c-slider-item">
                            @if(isset($post->thumb))
                            <img src="{{ image($post->thumb) }}" alt="img">
                            @else
                            <img src="/uploads/img/blue.png" alt="img">
                            @endif
                            <h2>
                                {{ $post->translate(app()->getlocale())->title }}
                            </h2>
                        </a>
                    </div>
                    @endif
                    @endif
                    @endforeach
                    @endif

                </div>

            </div>
        </div>
        
        <div class="container">
            <div class="slider-arrows">
                <li>
                    <a id="prev2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382"
                                viewBox="0 0 65.542 33.382">
                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                    transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right"
                                        transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0"
                                            transform="translate(13.863)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0"
                                            transform="translate(0 47.705)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                        {{trans('admin.Prev')}}
                    </a>
                </li>
                <li class="last-li">
                    <a id="next2">
                        {{trans('admin.Next')}}
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382"
                                viewBox="0 0 65.542 33.382">
                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                    transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right"
                                        transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0"
                                            transform="translate(13.863)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0"
                                            transform="translate(0 47.705)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
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

    <hr class="hr-bottom">



</main>

@endsection