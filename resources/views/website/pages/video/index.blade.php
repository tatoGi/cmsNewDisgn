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







    @if(isset($video))



    <section>

        <div class="important-title  ">

            <span class="line-1"></span>

            <h1>Video gallery</h1>

            <span class="line-1"></span>

        </div>

        <div class="container">

            <div class="row">

                @if(isset($video_posts) && (count($video_posts) > 0))

                @foreach($video_posts as $video)

                

               

                <div class="col-lg-3 col-md-3 col-sm-6 col-6 video-item">

                    <a href="{{$video->translate(app()->getlocale())->youtube}}" data-fancybox="video-gallery">

                        <div class="img-box">

                            <img src="{{ image($video->thumb) }}" src="{{$video->translate(app()->getlocale())->youtube}}" alt="img">

                           

    

                            <svg xmlns="http://www.w3.org/2000/svg" width="74.514" height="53.378"

                                viewBox="0 0 74.514 53.378">

                                <path id="Subtraction_1" data-name="Subtraction 1"

                                    d="M-8028.742,11957.378c-.058,0-5.9,0-12.369-.2-5.979-.186-13.744-.584-16.788-1.428a9.448,9.448,0,0,1-6.567-6.719c-1.517-5.836-1.535-18.212-1.535-18.337s.018-12.439,1.535-18.339a9.728,9.728,0,0,1,2.432-4.285,9.293,9.293,0,0,1,4.135-2.5c3.012-.811,10.779-1.194,16.765-1.374,6.478-.193,12.333-.2,12.392-.2s5.916,0,12.391.2c5.984.187,13.749.585,16.764,1.43a9.446,9.446,0,0,1,6.567,6.718c1.582,5.916,1.536,18.277,1.535,18.4s-.018,12.44-1.535,18.338a9.441,9.441,0,0,1-6.567,6.718c-3.012.812-10.779,1.2-16.764,1.375C-8022.829,11957.376-8028.684,11957.378-8028.742,11957.378Zm-7.426-38.117h0v22.859l19.394-11.43-19.394-11.43Z"

                                    transform="translate(8066 -11904)" fill="#fff" />

                            </svg>

                        </div>

                        <div class="text-side">

                            {{ $video->translate(app()->getlocale())->title }}

                        </div>

                    </a>

                </div>

                @endforeach

                @endif

            </div>

        </div>

    </section>

    @endif



    <section>

        <div class="container">

            <div class="pagination pagination-2">

                @if(isset($video_posts) && (count($video_posts) > 0))

                {{ $video_posts->links("website.components.pagination") }}

                @endif

            </div>

        </div>



    </section>

 @include('website.components.progress')

</main>





@endsection

