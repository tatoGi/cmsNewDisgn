@extends('website.master')
@section('main')

<main>
    @if (isset($section->cover) )
    <div class="section-banner">
        <div class="section-cover">
            <img src="{{image($section->cover)}}" alt="">
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="crumbs font-18 line-54">
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    @else
                    <a href="@if($loop->first)/ @else{{ $breadcrumb['url'] }} @endif">{{ $breadcrumb['name'] }}</a>
                    <span></span>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="section-banner">
        <div class="section-cover">
            <img src="/website/img/banner.png" alt="">
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="crumbs font-18 line-54">
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    @else
                    <a href="@if($loop->first)/ @else{{ $breadcrumb['url'] }} @endif">{{ $breadcrumb['name'] }}</a>
                    <span></span>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
        <section>
            <div class="submenu-section section-p">
                <div class="inner-section-title">
                    <div class="container">
                        <h2 class="font-32 line-54">Submenu</h2>
                    </div>
                </div>

                <div class="sub-blocks">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="">
                                    <div class="sub-card">
                                        <div class="label">
                                            <h3 class="font-24 line-28">Production</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection