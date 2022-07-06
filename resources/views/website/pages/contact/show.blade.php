@extends('website.master')
@section('main')
<main>
@if(isset($breadcrumbs))
        <section>
            <div class="container">
                <div class="b-r-c">
                    <a href="#">{{ trans('website.home') }}</a>
                    <span >/</span>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li><span class="icon-D-arrow d-arrow-b"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span></li>
                        <li class="brand-colored"><a href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @endforeach
                </div>
            </div>
        </section>
    @endif
    @if (isset($contact))
         <section>
            <div class="important-title m-t-2 m-tt-22">
                <span class="line-1"></span>
                <h1>{{$model->title}}</h1>
             
                <span class="line-1"></span>
            </div>
            <div class="container">
                <div class="row contact-end-row">
                    <div class="col-lg-8 col-md-8 col-sm-6 col-12 padd-2">
                        <div class="contact-form-side">
                            <div class="contact-title">
                            {{$model->posts[0][app()->getLocale()]->title}}
                            </div>
                            <form  method="POST">
                            @csrf 
                                <div class="full-name">
                                <input type="hidden" placeholder="Name" name="post_id"  value="{{$model->posts[0]->id}}">
                               
                                    <label>{{trans('name')}}</label>
                                    <input  type="text" placeholder=" {{trans('admin.name')}}" name="name"  required>
                                </div>
                                <div class="email">
                                    <label>{{trans('website.mail')}}</label>
                                    <input  type="text" placeholder="{{trans('admin.email')}}" name="email"  required>
                                </div>
                                <div class="text-area">
                                    <label>{{trans('website.messege')}}</label>
                                    <textarea></textarea>
                                </div>
                                <div class="submit">
                                    <button>
                                        Submit
                                    </button>
                                </div>
                                 @if(Session::has('message'))
                                         <p class="alert alert-info">{{ Session::get('message') }}</p>
                                    @endif
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 padd-1">
                        <div class="contact-right-side">
                            <div class="ph-ad">
                                <div class="phone-1">
                                    <div class="phone-icon">
                                        <span>
                                            
                                            <svg id="Iconly_Bold_Calling" data-name="Iconly/Bold/Calling" xmlns="http://www.w3.org/2000/svg" width="51.504" height="51.504" viewBox="0 0 51.504 51.504">
                                                <g id="Group" transform="translate(29.353)">
                                                <g id="Calling" transform="translate(0)">
                                                    <path id="Fill_1" data-name="Fill 1" d="M2.626.039a2.216,2.216,0,0,0-.841,4.352,8.915,8.915,0,0,1,7.066,7.082v0a2.212,2.212,0,0,0,2.165,1.791,2.4,2.4,0,0,0,.426-.039,2.227,2.227,0,0,0,1.744-2.6A13.325,13.325,0,0,0,2.626.039" transform="translate(0 8.948)" fill="#fff"/>
                                                    <path id="Fill_3" data-name="Fill 3" d="M2.455.02A2.1,2.1,0,0,0,.845.473a2.222,2.222,0,0,0,1.118,3.95A17.8,17.8,0,0,1,17.738,20.232a2.207,2.207,0,0,0,2.19,1.969,2.059,2.059,0,0,0,.251-.015,2.182,2.182,0,0,0,1.48-.818,2.205,2.205,0,0,0,.467-1.629A22.188,22.188,0,0,0,2.455.02" transform="translate(0.01 0)" fill="#fff"/>
                                                </g>
                                                </g>
                                                <g id="Call" transform="translate(0 2.575)">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M23.258,25.681c10.273,10.27,12.6-1.611,19.144,4.925,6.306,6.3,9.93,7.567,1.941,15.554-1,.8-7.359,10.48-29.7-11.859S1.961,5.594,2.766,4.594c8.009-8.009,9.25-4.364,15.555,1.94C24.862,13.073,12.986,15.411,23.258,25.681Z" transform="translate(0 0)" fill="#fff"/>
                                                </g>
                                            </svg>
  
                                        </span>
                                        <h2>Phone Number</h2>
                                        <div class="numbers">
                                            <a href="#">{{$model->posts[0]->mobile}}</a>
                                            <a href="#">{{$model->posts[0]->mobile}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="address-1">
                                    <div class="phone-icon">
                                        <span>
                                            <svg id="Iconly_Bold_Location" data-name="Iconly/Bold/Location" xmlns="http://www.w3.org/2000/svg" width="40.5" height="47.564" viewBox="0 0 40.5 47.564">
                                                <g id="Location">
                                                <path id="Location-2" data-name="Location" d="M20.26,47.564a3.239,3.239,0,0,1-1.748-.589,51.216,51.216,0,0,1-13.2-12.226A24.67,24.67,0,0,1,0,19.782,19.409,19.409,0,0,1,5.963,5.788,20.341,20.341,0,0,1,20.234,0,20.051,20.051,0,0,1,40.5,19.782a24.683,24.683,0,0,1-5.313,14.968,52.186,52.186,0,0,1-13.2,12.226A3.147,3.147,0,0,1,20.26,47.564Zm-.027-33.825A6.671,6.671,0,0,0,13.566,20.4a6.443,6.443,0,0,0,1.957,4.648,6.7,6.7,0,0,0,4.711,1.9,6.6,6.6,0,1,0,0-13.206Z" fill="#fff"/>
                                                </g>
                                            </svg>
                                        </span>
                                        <h2>address</h2>
                                        <div class="address">
                                        {{$model->posts[0]->address}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
    @endif
        <section class="padding">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2976.4010407681544!2d44.796278315678855!3d41.755010481086615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40446d7d9582ce07%3A0xecde3d7c5a2d7bb3!2sGvazauri%20St%2C%20T&#39;bilisi!5e0!3m2!1sen!2sge!4v1651675927147!5m2!1sen!2sge" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
             
       
        
        
    

        <section>
            <div class="counter-cards">
                <div class="cards-bg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="count-card">
                                <div class="card-span">
                                    <span class="count">10</span>
                                    <span></span>
                                </div>
                                <div class="title">Business Years</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="count-card">
                                <div class="card-span">
                                    <span class="count">80</span>
                                    <span>K+</span>
                                </div>
                                <div class="title">Product Sales</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="count-card">
                                <div class="card-span">
                                    <span class="count">90</span>
                                    <span>%</span>
                                </div>
                                <div class="title">Happy Customers</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="count-card">
                                <div class="card-span">
                                    <span class="count">10</span>
                                    <span></span>
                                </div>
                                <div class="title">Team Members</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
