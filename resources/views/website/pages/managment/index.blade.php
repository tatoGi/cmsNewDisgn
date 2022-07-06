@extends('website.layout')

@section('content')
<div class="content d-flex flex-column flex-column-fluid">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{$model->url}}" class="text-muted">{{strtoupper($model->title)}}</a>
                </li>
            </ul>
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row mt-0 mt-lg-8">
				<div class="col-xl-12">
					<div class="mb-17">
						<!--begin::Separator-->
						<div class="separator separator-dashed mb-9"></div>
						<div class="card-toolbar mb-10">
                            <span class="icon-speaker title-logo-size">
								<img src="{{image($section->icon)}}" class="align-self-end" alt="">
                            </span>
                            <a href="#" class="font-weight-bolder d-ib ml-1 section-title">{{strtoupper($model->title)}}</a>
                        </div>
						<!--end::Separator-->
						<!--begin::Row-->
						<div class="row g-10">
							<!--begin::Col-->

							@if(isset($posts))
							@foreach($posts as $post)
							<div class="col-md-4">
								<div class="card card-custom gutter-b card-stretch">
									<!--begin::Body-->
									<div class="card-body pt-4" style="background-color: #EFEFF0;padding: 38px 35px 0px 35px !important;">
										<!--begin::User-->
										<div class="d-flex align-items-end mb-3">
											<!--begin::Pic-->
											<div class="d-flex align-items-center">
												<!--begin::Pic-->
												<div class="flex-shrink-0 mr-8 mt-lg-0 mt-3">
													<div class="symbol symbol-lg-75">
														<img src="{{image($post->thumb)}}" alt="image">
													</div>
												</div>
												<!--end::Pic-->
												<!--begin::Title-->
												<div class="d-flex flex-column">
	
													<a href="{{ $post->getFullSlug() }}" class="font-weight-bold text-hover-primary mb-0 index-user case_on">{{ $post->translate(app()->getLocale())->title }}</a>
	
													<span class="text-muted bold mt-5 mb-5">ადმინისტრაციული მენეჯერი</span>
												</div>
												<!--end::Title-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::User-->
										<!--begin::Desc-->
										
	
										
										<div class="managment-text-limit">
											<p class="mb-6"></p>
											<p>{!! $post->translate(app()->getLocale())->desc !!}</p>
											<p class="mb-3"></p>
										</div>
										<!--end::Desc-->
										<!--begin::Text-->
										<div class="row mt-10">
											<div class="col-7"></div>
											<div class="col-5">
												<a href="{{ $post->getFullSlug() }}" class="btn btn-primary btn-padd">{{trans('website.more')}}</a>
											</div>
										</div>
									</div>
									<!--end::Body-->
								</div>
							</div>
							@endforeach
							@endif
							<!--end::Col-->
							<div class="col-md-12">
								{{ $posts->links("website.components.pagination") }}
							</div>
						</div>
						<!--end::Row-->
					</div>

				</div>

			</div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection