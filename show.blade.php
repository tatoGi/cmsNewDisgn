@extends('website.master')
@section('main')
<main>
      @if(isset($model->cover))
      <section>
          <div class="home-banner">
              <img src="{{image($model->cover)}}" alt="home-img">
          </div>
      </section>
      @endif
      @if(isset($breadcrumbs))
      <section>
          <div class="bandcamp">
              <div class="container">
                  <div class="row">
                      <ul>
                          <li><a href="/">{{ trans('website.home') }}</a></li>
                          @foreach ($breadcrumbs as $breadcrumb)
                          <li><span class="icon-D-arrow d-arrow-b"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span></li>
                          <li class="brand-colored"><a href="/{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
      </section>
      @endif
      <section>
          <div class="detail-content">
              <!-- <div class="special-row-box"> -->
              <div class="container">
                  <div class="row">
                      <div class="col-xxl-12 col-lg-12 col-md-12 p-r-1">
                        @if(isset($projects->posts) && (count($projects->posts) > 0))
                        @foreach($projects->posts as $project)
                          <div class="detail-text-area">
                              <h1>{{$project->translate(app()->getlocale())->title}}</h1>
                              <h2>{{$project->translate(app()->getlocale())->start_date}} - {{$project->translate(app()->getlocale())->end_date}}| #{{$project->translate(app()->getlocale())->tag}}</h2>
                              <div class="text">
                                    {!! $project->translate(app()->getlocale())->text!!}
                              </div>
                          </div>
                          @endforeach
                          @endif
                      </div>
                      @if(isset($projects->posts) && (count($projects->posts) > 0))
                      @foreach($projects->posts as $project)
                      <div class="col-xxl-12 col-lg-12 col-md-12 p-r-2">
                          <div class="row">
                              <div class="col-xxl-4 col-lg-4 col-md-4">
                                  <div class="detail-image">
                                      <a data-fancybox="gallery-1" href="https://lipsum.app/id/1/800x600">
                                          <img class="rounded" src="https://lipsum.app/id/1/800x600" />
                                      </a>
                                  </div>
                              </div>
                              <div class="col-xxl-4 col-lg-4 col-md-4">
                                  <div class="detail-image">
                                      <a data-fancybox="gallery-1" href="assets/img/Mask Group 20.jpg">
                                          <img class="rounded" src="assets/img/Mask Group 20.jpg" />
                                      </a>
                                  </div>
                              </div>
                              <div class="col-xxl-4 col-lg-4 col-md-4">
                                  <div class="detail-image">
                                      <a data-fancybox="gallery-1" href="assets/img/Mask Group 17.jpg">
                                          <img class="rounded" src="assets/img/Mask Group 17.jpg" />
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                      @endif
                  </div>
              </div>
              <!-- </div>        -->
          </div>
      </section>
      @if (isset($projects))
    <section>
        <div class="recent-projects p-t">
            <div class="container">

                <div class="row">
                    <div class="col-xxl-12 col-lg-12 col-md-12 col-12">
                        <div class="projects-links">
                            <div class="team-list-links">
                                <h1>{{$projects->translate(app()->getlocale())->title}}</h1>
                                <div class="list-links">

                                    <button class="tablinks active-color" onclick="openPos(event, 'all')">All</button>

                                    @if(isset($services) && isset($services->posts) && (count($services->posts) > 0))
                                    @foreach($services->posts as $service)
                                    <button class="tablinks" onclick="openPos(event, '{{$service->translate(app()->getlocale())->title}}')">{{$service->translate(app()->getlocale())->title}}</button>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabcontent" id="all" style="display: block;">
                    <div class="row">
                        @if(isset($projects->posts) && (count($projects->posts) > 0))
                        @foreach($projects->posts as $project)
                        <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6 pad-l-r">
                            <a href="/{{$projects->getfullslug()}}" class="recent-item">
                                <div class="recent-project-img">
                                    <img src="{{ image($project->thumb) }}" alt="img">
                                </div>
                                <div class="recent-text">
                                    <h2>{{$project->translate(app()->getlocale())->title}}</h2>
                                    <div class="text">
                                        {!! $project->translate(app()->getlocale())->text!!}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                @if(isset($services) && isset($services->posts) && (count($services->posts) > 0))
                @foreach($services->posts as $service)
                <div class="tabcontent" id="{{$service->translate(app()->getlocale())->title}}">
                    <div class="row">
                        @if(isset($projects->posts) && (count($projects->posts) > 0))
                        @foreach($projects->posts as $project)
                        @if(isset($project->service) && (count($project->service) > 0) && in_array($service->id, $project->service))
                        <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6 pad-l-r">
                            <a href="{{$project->getfullslug()}}" class="recent-item">
                                <div class="recent-project-img">
                                    <img src="{{ image($project->thumb) }}" alt="img">
                                </div>
                                <div class="recent-text">
                                    <h2>{{$project->translate(app()->getlocale())->title}}</h2>
                                    <div class="text">
                                        {!! $project->translate(app()->getlocale())->text!!}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @endif
      <section>
          <div class="advert-box">
              <div class="container">
                  <div class="row">
                      <div class="col-xxl-8 col-lg-8 col-md-8 mg-center">
                          <div class="advert">
                              <div class="advert-item">
                                  We are ready for collaboration
                                  Feel free to contact us!
                              </div>
                              <a href="#" class="advert-contact">Contact Us</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </main>
  @endsection
