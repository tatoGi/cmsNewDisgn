
<ol class="dd-list">
  @foreach ($sections as $section)
  <li class="dd-item @if (count($section->children) > 0 ) acordion @endif" data-id="{{ $section->id }}">
      <div class="dd-handle">
          {{ $section[app()->getlocale()]->title }}
      </div>
      <div class="change-icons">
          @if (isset($section->type['type']) && !in_array($section->type['type'],[1, 13 ,9]))
          <a href="/{{ app()->getLocale() }}/admin/section/{{ $section->id }}/posts/" class="far fa-eye"></a>
          @endif
          @if (auth()->user()->isType('admin'))
        
           @if (isset($_GET['type']) && ($_GET['type'] == 13))     
          <a href="/{{ app()->getLocale() }}/admin/sections/edit/{{ $section->id }}?type=13" class="fas fa-pencil-alt"></a>
          @else
          <a href="/{{ app()->getLocale() }}/admin/sections/edit/{{ $section->id }}" class="fas fa-pencil-alt"></a>
          @endif
          @if (isset($_GET['type']) && ($_GET['type'] == 13)) 
          <a href="/{{ app()->getLocale() }}/admin/sections/destroy/{{ $section->id }}?type=13" onclick="return confirm('დარწმნებლი ხართ რომ გსურთ სექციის წაშლა ?');" class="fas fa-trash-alt"></a>
          @else
          <a href="/{{ app()->getLocale() }}/admin/sections/destroy/{{ $section->id }}" onclick="return confirm('დარწმნებლი ხართ რომ გსურთ სექციის წაშლა ?');" class="fas fa-trash-alt"></a>
          @endif
         @endif
          {{-- @if (count($section->children) > 0 ) <span class="button_je mdi mdi-chevron-down arrow"></span> @endif --}}
      </div>
      @if (count($section->children) > 0 )
      @include('admin.sections.list-helper', ['sections' => $section->children])
      @endif
  </li>
  @endforeach
</ol>
