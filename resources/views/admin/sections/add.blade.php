@extends('admin.layouts.app')

@push('name')
{{ trans('admin.sections') }}
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">{{ trans('admin.add_section') }}</h4>
            <form action="/{{ app()->getLocale() }}/admin/sections/create" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
                @csrf
                <ul class="nav nav-tabs">

                    @foreach (config('app.locales') as $locale)
                    <li class="nav-item ">
                        <a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($locale == app()->getLocale()) active @endif">
                            <span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>
                        </a>
                    </li>
                    @endforeach

                </ul>
                <div class="tab-content">
                    @foreach (config('app.locales') as $locale)
                    <div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif " id="locale-{{ $locale }}">

                        <div class="form-group">
                            <label for="{{ $locale }}-title">{{ trans('admin.title') }}</label>
                            @error('name')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <input type="text" name="{{ $locale }}[title]" parsley-trigger="change" class="@error('title') danger @enderror form-control" id="{{ $locale }}-title" Required>
                        </div>

                        <div class="form-group">
                            <label for="{{ $locale }}-slug">{{ trans('admin.slug') }}</label>
                            @error('slug')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <input type="text" name="{{ $locale }}[slug]" parsley-trigger="change" class="@error('slug') danger @enderror form-control" id="{{ $locale }}-slug">
                        </div>
                        <div class="form-group">
                            <label for="{{ $locale }}-desc">{{ trans('admin.desc') }}</label>
                            <textarea id="{{ $locale }}-desc" name="{{ $locale }}[desc]" class="form-control ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="{{ $locale }}-active">{{ trans('admin.active') }}</label>
                            @error('active')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <br>
                            <input type="hidden" name="{{ $locale }}[active]" value="0" />
                            <input type="checkbox" name="{{ $locale }}[active]" id="{{ $locale }}-active" checked value="1" data-plugin="switchery" data-color="#3bafda" />
                        </div>

                    </div>
                    @endforeach
                </div>
                <div style="padding-top:20px">
                  <div class="form-group">
                        <label for="cover">{{trans('admin.cover')}}</label>
                        <br>
                        <div class="input-group">
                            <span class="input-group-btn">
                           
                              <input data-input="thumbnail" type="file" name="cover" value="file_types" class="btn btn-primary"  multiple>  
                            </span>
                          
                          </div>
                          <img id="holder" style="margin-top:15px;max-height:100px;">    
                          
                    </div> 
                    <div class="form-group">
                        <label for="type">{{ trans('admin.type') }}</label>
                        @error('active')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.type_is_required') }}</small>
                        @enderror
                        
                        @if (isset($_GET['type']) && ($_GET['type'] == 13))
                            <select class="form-control  @error('type') danger @enderror " name="type_id" id="typeselect">
                            
                            <option value="13" id="typeoption" selected>{{ trans('sectionTypes.category') }}</option>
                            
                        </select>
                        @else
                        <select class="form-control  @error('type') danger @enderror " name="type_id" id="typeselect">
                            @foreach ($sectionTypes as $key => $type)
                            <option value="{{ $type['id'] }}" id="typeoption">{{ trans('sectionTypes.'.$key) }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="parent">{{ trans('admin.parent') }}</label>
                        <select class="form-control" name="parent_id" id="parent">
                            <option value="">{{ trans('admin.parent') }}</option>
                            @foreach ($sections as $key => $sec)
                            <option value="{{ $sec->id }}">{{ $sec[app()->getlocale()]->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    @foreach ( menuTypes() as $key => $menuType )
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" name="menu_types[]" id="type_{{ $key }}" value="{{ $key }}">
                        <label for="type_{{ $key }}">
                            {{ trans('menuTypes.'.$menuType) }}
                        </label>
                    </div>
                    @endforeach
               
                   
                </div>
                <div class="form-group text-right mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        {{ trans('admin.save') }}
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>


<script>
  $('#lfm').filemanager('image');
     </script>
@endsection
<style>
    .danger {
        border: 1px solid rgb(239, 83, 80) !important;
    }
</style>


