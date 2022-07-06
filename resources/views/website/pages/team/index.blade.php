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
        <section style="overflow-x: hidden;">
            <div class="important-title">
                <span class="line-1"></span>
                <h1>{{$model[app()->getlocale()]->title}}</h1>
                <span class="line-1"></span>
            </div>
            @if(isset($team_posts) && (count($team_posts) > 0))
                            @foreach($team_posts as $key => $team)
                       
                        
             <div class="@if($key % 2 == 0)team-member-1 @else team-member-2 @endif team-member-list">
                 <div class="container">
             
                     <div class="row team-row @if($key % 2 != 0) team-row-reverse @endif">
                 
                         <div class="person-img">
                             <a href="{{ image($team->thumb) }}" data-fancybox="person-img"> 
                                <img src="{{ image($team->thumb) }}" alt="team">
                            </a>
                         </div>
                         <div class="person-info">
                             <h4 class="person-name">{{$team->translate(app()->getlocale())->title}}</h4>
                             <div class="person-special">{{$team->translate(app()->getlocale())->position}}</div>
                             <div class="text">{!! $team->translate(app()->getlocale())->text !!}</div>
                            
                             <div class="person-contact">
                                 @if($team->Linkedin != '')
                                 <a href="{{$team->Linkedin}}">Linkedin</a>
                                 @endif
                                 @if($team->facebook != '')
                                 <a href="{{$team->facebook}}">facebook</a>
                                 @endif
                                 @if($team->instagram != '')
                                 <a href="{{$team->instagram}}">instagram</a>
                                 @endif
                             </div>
                             
                       
                             <div class="person-email">
                                 <a href="#">
                                 @if($team->mail != '')
                                     <span>
                                        <svg id="Iconly_Bold_Send" data-name="Iconly/Bold/Send" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g id="Send">
                                            <path id="Send-2" data-name="Send" d="M19.435.582A1.933,1.933,0,0,0,17.5.079L1.408,4.76A1.919,1.919,0,0,0,.024,6.281a2.253,2.253,0,0,0,1,2.1L6.06,11.477a1.3,1.3,0,0,0,1.61-.193l5.763-5.8a.734.734,0,0,1,1.06,0,.763.763,0,0,1,0,1.067l-5.773,5.8a1.324,1.324,0,0,0-.193,1.619L11.6,19.054A1.91,1.91,0,0,0,13.263,20a2.078,2.078,0,0,0,.25-.01A1.95,1.95,0,0,0,15.144,18.6L19.916,2.525a1.964,1.964,0,0,0-.48-1.943" fill="#e3662a"/>
                                            </g>
                                        </svg>
                                     </span>
                                     <span>{{$team->mail}}</span>
                                     @endif
                                 </a>
                             </div>
                         </div>
                        
                     </div>
                    
                 </div>
                 <img src="/website/assets/img/Mask Group 158.svg" alt="img" class="position-img">
             </div>
             @endforeach
                         @endif
        </section>
        

        <section>
            <div class="container">
                <div class="pagination">
                @if(isset($team_posts) && (count($team_posts) > 0))
                {{ $team_posts->links("website.components.pagination") }}
            @endif
                </div>
            </div>
            
        </section>
    </main>

@endsection