
<ol class="dd-list">
  @foreach ($categories as $category)
  
  <li class="dd-item @if (count($category->children) > 0 ) acordion @endif" data-id="{{ $section->id }}">
      <div class="dd-handle">
          {{ $category[app()->getlocale()]->title }}
         
      </div>
      <div class="change-icons">
          @if ($category->type['type'] != 1 && $category->type['type'] != 13 && $category->type['type'] != 9 )
          <a href="/{{ app()->getLocale() }}/admin/section/{{ $section->id }}/posts/" class="far fa-eye"></a>
          @endif
          @if (auth()->user()->isType('admin'))
          <a href="/{{ app()->getLocale() }}/admin/sections/edit/{{ $section->id }}" class="fas fa-pencil-alt"></a>
          <a href="/{{ app()->getLocale() }}/admin/sections/destroy/{{ $section->id }}" onclick="return confirm('დარწმნებლი ხართ რომ გსურთ სექციის წაშლა ?');" class="fas fa-trash-alt"></a>
         @endif
          {{-- @if (count($category->children) > 0 ) <span class="button_je mdi mdi-chevron-down arrow"></span> @endif --}}
      </div>
      @if (count($category->children) > 0 )
      @include('admin.sections.list-helper', ['sections' => $category->children])
      @endif
  </li>
  @endforeach
</ol>

{{-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5><strong>ნამდვილად გსურთ სექციის წაშლა ?</strong></h5>
          </div>
          <div class="modal-footer">

              <button type="button" style="border:none; background-color:transparent; color:blue"
                  data-dismiss="modal">გაუქმება</button>

              <a href="/{{ app()->getLocale() }}/admin/sections/destroy/{{ $section->id }}" style="color: red">
                  დადასტურება
              </a>
          </div>
      </div>
  </div>
</div> --}}

{{-- <style>
.acordion{
  height: 57px;
  overflow: hidden;
}
.opened{
  height: initial;
}
.arrow{
  display: inline-block;
  transform: rotate(-90deg);
  font-size: 34px;
  position: relative;
  top: 8px;
  cursor: pointer;
}
.rotate{
  transform: rotate(0deg);
  display: inline-block
}
</style>  --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}

{{-- <script>
$('#confirm-delete').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});



$(".button_je").on('click', function () {
  var parent_li = $(this).parent().parent();
  parent_li.addClass('opened');
});



$(".button_je").on('click', function () {
  $(this).addClass('rotate');
});


</script> --}}
