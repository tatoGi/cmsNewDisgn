@extends('admin.layouts.app')

@push('name')
@endpush







@section('content')


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <form method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                        placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-success" type="submit"
                        id="button-addon2">{{ trans('website.search') }}</button>
                </div>
            </form>
            <div style="display: flex; align-items:center; justify-content: space-between; padding:20px 0">
                <h4 class="mt-0 header-title float-left">{{ $section [app()->getLocale()]->title }}</h4>


                <a href="/{{ app()->getLocale() }}/admin/section/{{ $section->id }}/posts/create" type="button"
                    class="float-right btn btn-info waves-effect width-md waves-light">{{ trans('admin.add_post') }}</a>

            </div>

            <div class="container-fluid">

                <div class="row">
                    @foreach ($posts as $post)

                    <div class="col-xl-4 col-md-6">
                        <div class="card-box">
                            <div class="dropdown float-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if (count($post->submissions) > 0)
                                    <a style="color: #35b8e0"
                                        href="/{{ app()->getLocale() }}/admin/submissions?post_id={{ $section->post()->id }}"
                                        class="dropdown-item">{{ trans('admin.submissions') }}</a>
                                    @endif

                                    <a style="color: #35b8e0"
                                        href="{{ route('post.edit', [app()->getLocale(), $post->id]) }}"
                                        class="dropdown-item">{{ trans('admin.edit') }}</a>

                                    <a style="color: #ff3535"
                                        href="{{ route('post.destroy', [app()->getLocale(), $post->id]) }}"
                                        data-confirm="დარწმუნებული ხართ რომ გსურთ პოსტის წაშლა?"
                                        class="dropdown-item delete">{{ trans('admin.delete') }}</a>


                                </div>
                            </div>

                            <h4 class="header-title mt-0 ">{{ $post->translate(app()->getLocale())->title }} <br> </h4>

                            @if ($post->thumb == null && isset(json_decode($post->locale_additional)->youtube_Link))
                            <img class="img-fluid card-image"
                                src="{{ getVideoImage(json_decode($post->locale_additional)->youtube_Link) }}"
                                alt="Card image cap">
                            @else
                            @if($section->type_id ==4)
                            @else
                            <img class="img-fluid card-image" src="/uploads/img/thumb/{{ $post->thumb }}"
                                alt="Card image cap">
                            @endif
                            @endif

                        </div>

                    </div><!-- end col -->
                    @endforeach
                    <div class="col-lg-12">

                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function (event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');
            }
        });
    }

</script>
@endsection
