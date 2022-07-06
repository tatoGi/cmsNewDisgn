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
       
         <section>
             <div class="container">
                 <form class="form-control-1 p-t-5">
                 <input type="text" class="form-controller" id="search" name="que"></input>
                   
                    <button class="search-btn">
                        <svg id="search-normal" xmlns="http://www.w3.org/2000/svg" width="20.493" height="20.493" viewBox="0 0 20.493 20.493">
                            <path id="Vector" d="M16.224,8.112A8.112,8.112,0,1,1,8.112,0,8.112,8.112,0,0,1,16.224,8.112Z" transform="translate(1.708 1.708)" fill="none" stroke="#414141" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"/>
                            <path id="Vector-2" data-name="Vector" d="M1.708,1.708,0,0" transform="translate(17.078 17.078)" fill="none" stroke="#414141" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"/>
                            <path id="Vector-3" data-name="Vector" d="M0,0H20.493V20.493H0Z" transform="translate(0 0)" fill="none" opacity="0"/>
                        </svg>                          
                    </button>
                    <div class="close-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.451" height="15.451" viewBox="0 0 15.451 15.451">
                            <g id="Group_1843" data-name="Group 1843" transform="matrix(0.695, 0.719, -0.719, 0.695, 7.967, -5.987)">
                            <rect id="Rectangle_132" data-name="Rectangle 132" width="1.959" height="19.588" rx="0.979" transform="translate(8.815 0)" fill="#414141"/>
                            <rect id="Rectangle_133" data-name="Rectangle 133" width="1.959" height="19.588" rx="0.979" transform="translate(0 10.578) rotate(-90)" fill="#414141"/>
                            </g>
                        </svg>
                    </div>
                 </form>
                 <div class="results">
                     <span> Page Results:{{ $posts->total() }} </span>
                     
                 </div>
             </div>
             @foreach ($posts as $item)
             <div class="search-result-item">
                <div class="container">
              
                    <div class="result-item">
                    @if (($item->parent->type_id == 3) || ($item->parent->type_id == 6) || ($item->parent->type_id == 4))
                        <h2>{!! strip_tags($item->translate(app()->getlocale())->title) !!} 
                        </h2>
                        @else
                        <h4>{!! $item->translate(app()->getlocale())->title !!}</h4>
                        <div class="text"> {!! strip_tags($item->translate(app()->getlocale())->text) !!}
                        </div>
                        @endif
                        <a href="/{{ $item->getfullslug() }}@if($item->parent->type_id == 6)#{{$item->id}}@endif" class="about-read-link">
                            <div class="read-link">Read more</div>
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
             @endforeach
         </section>
        <section>
            <div class="container">
                <div class="pagination pagination-2">
                @if (isset($posts) && count($posts) > 0)
            {{ $posts->links('website.components.pagination') }}
        @endif
 
                </div>
            </div>
            
        </section>
    </main>
@endsection
