
@if (isset($settings))

    
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
            @foreach (settingTransAttrs($settings) as $key => $field)
           
            <div class="form-group">
    
                {{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}
                
                @if ($field['type'] == 'textarea')
                    
                        {{ Form::textarea('translatables['.$key.']['.$locale.']',  $field['value'][$locale] ?? null, [
                            'class' => 'form-control ckeditor', 
                        ]) }}
                @elseif($field['type'] == 'text')
                    {{ Form::text('translatables['.$key.']['.$locale.']',  $field['value'][$locale], ['class' => 'form-control']) }}
                
                
                @endif
                
            </div>
            
            @endforeach

        </div>
        
    @endforeach
</div> 

<br>
@foreach (settingNonTransAttrs($settings) as $key1 => $field1)
    <div class="form-group">
            
        {{ Form::label(trans('admin.'.$key1), null, ['class' => 'control-label']) }}
    
        @if($field1['type'] == 'text')
            {{ Form::text('nonTranslatables['.$key1.']',  $field1['value'], array_merge(['class' => 'form-control'])) }}
            
            
        @endif
    </div>
    
                        
@endforeach
        

    
@endif
            
                
                

<div class="form-group text-right mb-0">
    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
        {{ trans('admin.save') }}
    </button>
</div>
                