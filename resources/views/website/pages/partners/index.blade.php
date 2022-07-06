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
        <section>
              
            <div class="important-title ">
                <span class="line-1"></span>
                <h1>{{$model->translate(app()->getlocale())->title}}</h1>
                <span class="line-1"></span>
            </div>
             <div class="container">
                 <div class="row">
                 @if(isset($partners_posts) && (count($partners_posts) > 0))
            @foreach($partners_posts as $partners)
                     <div class="col-lg-3 col-md-3 col-sm-6 col-6 partners-item">
                         <a href="{{$partners->website}}">
                             <img src="{{ image($partners->thumb) }}" alt="partners">
                             <div class="partners-name">
                             {{$partners->translate(app()->getlocale())->title}}
                             </div>
                         </a>
                     </div>
                     @endforeach
             @endif
                 </div>
             </div>
            
        </section>
       
        <section>
            <div class="container">
                <div class="pagination pagination-2">
                @if(isset($partners_posts) && (count($partners_posts) > 0))
    {{ $partners_posts->links("website.components.pagination") }}
@endif
        
                </div>
            </div>
            
        </section>
        @include('website.components.progress')
    </main>
    @endsection