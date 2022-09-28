@extends('admin.layouts.app')

@push('name')
{{ trans('admin.users') }}
@endpush



@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card-box" style="margin-left: 30px">


            <h4 class="header-title mt-0 mb-3">{{ trans('admin.edit_user') }}</h4>

            <form action="/{{ app()->getLocale() }}/admin/users/edit/{{ $user->id }}" method="post"  enctype="multipart/form-data"
                data-parsley-validate novalidate>
                @csrf
                <div class="form-group">
                    <label for="userName">{{ trans('admin.username') }}</label>
                    @error('name')
                    <small
                        style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.username_is_required') }}</small>
                    @enderror
                    <input type="text" value="{{ $user->name }}" name="name" parsley-trigger="change" required
                        placeholder="Enter user name" class="@error('name') danger @enderror form-control"
                        id="userName">
                </div>
                <div class="form-group">
                    <label for="emailAddress">{{ trans('admin.email') }}</label>
                    @error('email')
                    <small
                        style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.email_is_required_and_must_be_unique') }}</small>
                    @enderror
                    <input type="email" value="{{ $user->email }}" name="email" parsley-trigger="change" required
                        placeholder="Enter email" class="@error('email') danger @enderror form-control"
                        id="emailAddress">
                </div>
                <div class="form-group">
                    <h5>{{ trans('admin.type') }}</h5>
                    @error('type_id')
                    <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.type_is_required') }}</small>
                    @enderror

                    <select class="form-control select2 @error('type_id') danger @enderror " name="type_id">
                        @foreach ($user_types as $key => $type)
                        <option value="{{ $key }}" @if ($user->type_id == $key) selected @endif
                            >{{ trans('admin.'.$type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pass1">{{ trans('admin.password') }}</label>
                    @error('password')
                    <small
                        style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.password_is_required_min_8_characters') }}</small>
                    @enderror
                    <input id="pass1" type="password" placeholder="Password"
                        class="form-control @error('password') danger @enderror" name="password">
                </div>
                <div class="form-group">
                    <label for="passWord2">{{ trans('admin.re_password') }}</label>
                    @error('re_password')
                    <small
                        style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.re_password_must_be_same_as_password') }}</small>
                    @enderror
                    <input data-parsley-equalto="#pass1" type="password" placeholder="Password" name="re_password"
                        class="form-control @error('re_password') danger @enderror" id="passWord2">
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('admin.images') }}</label>
                    <br>
                    <div class="row">
                        <input type="file" 
                        class="filepond"
                        name="filepond"
                        accept="image/png, image/jpeg, image/gif"/>
                      
                        
                        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js"></script>
                        
                        
                        <script>
                           FilePond.registerPlugin(
	// encodes the file as base64 data
  FilePondPluginFileEncode,
	
	// validates files based on input type
  FilePondPluginFileValidateType,
	
	// corrects mobile image orientation
  FilePondPluginImageExifOrientation,
	
	// previews the image
  FilePondPluginImagePreview,
	
	// crops the image to a certain aspect ratio
  FilePondPluginImageCrop,
	
	// resizes the image to fit a certain size
  FilePondPluginImageResize,
	
	// applies crop and resize information on the client
  FilePondPluginImageTransform
);
                            FilePond.create(
                                            document.querySelector('input'),
                                            {
                                                labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
                                            imagePreviewHeight: 170,
                                            imageCropAspectRatio: '1:1',
                                            imageResizeTargetWidth: 200,
                                            imageResizeTargetHeight: 200,
                                            stylePanelLayout: 'compact circle',
                                            styleLoadIndicatorPosition: 'center bottom',
                                            styleButtonRemoveItemPosition: 'center bottom'
                                            }
                                        );
                            FilePond.setOptions({
                                server:{
                                    url:'/admin/users/store',
                                    headers:{
                                        'X-CSRF-TOKEN':'{{ csrf_token() }}'
                                    }
                                }
                            })
                              FilePond.registerPlugin(
                                
                                // encodes the file as base64 data
                            FilePondPluginFileEncode,
                                
                          
                                
                                // corrects mobile image orientation
                                FilePondPluginImageExifOrientation,
                                
                                // previews dropped images
                            FilePondPluginImagePreview
                            );
                        </script>
                    

                    </div>



                </div>

                <div class="form-group text-right mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <div class="author">
                    <a href="#">
                        @if(isset( $user->image ))
                        <img class="avatar border-gray" src="{{ image($user->image) }}" alt="...">
                        @else
                        <img src="/uploads/img/user-profile.jpg" style="width: 30%;" alt="">
                        @endif
                        <h5 for="userName" class="title"> {{ auth()->user()->name }}</h5>
                    </a>
                    <p class="description">
                    {{ $user->name }}
                    </p>
                </div>
                <p class="description text-center">
                {{ $user->email }}
                </p>
            </div>
            <hr>
            <!-- <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                    <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                    <i class="fab fa-google-plus-g"></i>
                </button>
            </div> -->
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('/admin/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .danger {
        border: 1px solid rgb(239, 83, 80) !important;
    }
/*
 * FilePond Custom Styles
 */

 .filepond--drop-label {
	color: #4c4e53;
}

.filepond--label-action {
	text-decoration-color: #babdc0;
}

.filepond--panel-root {
	background-color: #edf0f4;
}


/**
 * Page Styles
 */
html {
	padding: 20vh 0 0;
}

.filepond--root {
	width:170px;
	margin: 0 auto;
}

</style>
@endpush

@push('scripts')

<script src="{{ asset('/admin/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- validation init -->
<script src="{{ asset('/admin/assets/js/pages/form-validation.init.js') }}"></script>
@endpush
