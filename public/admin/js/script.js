$('.add-video-card').on('click', function(e) {
    e.preventDefault();
    var parent = $(this).parent().children('.video-cards');
    $(this).parent().children('.hidden-video-card').clone().addClass('video-card').appendTo(parent);
})
$(document).on('click', '.remove-video-card', function(e) {
    e.preventDefault();
    $(this).parent().remove();
})

$("body").on("click", ".deletefile", function() {
    var elem = $(this).closest('.dfie');
    var que = $(this).data("id");
    var TOKEN = $(this).data("token");

    if (confirm("დოკუმენტის წაშლა!?")) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).data('route'),
            type: 'DELETE',
            data: { _token: TOKEN, que: que },
            dataType: 'JSON',
            success: function(response) {
                if (response.success) {
                    elem.remove()
                }
            },
        });
        $(this).parents('tr').hide('slow');
    }
});

$("body").on("click", ".DeleteCover", function () {
    var elem = $(this).closest('.dfie');
    var que = $(this).data("id");
    var TOKEN = $(this).data("token");

    if (confirm("დოკუმენტის წაშლა!?")) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).data('route'),
            type: 'DELETE',
            data: {
                _token: TOKEN,
                que: que
            },
            dataType: 'JSON',
            success: function (response) {
                if (response.success) {
                    elem.remove()
                }
            },
        });
        $(this).parents('tr').hide('slow');
    }
});


$("body").on("click", ".DeleteImages", function () {
    var elem = $(this).closest('.dfie');
    var que = $(this).data("id");
    var TOKEN = $(this).data("token");

    if (confirm("დოკუმენტის წაშლა!?")) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).data('route'),
            type: 'DELETE',
            data: {
                _token: TOKEN,
                que: que
            },
            dataType: 'JSON',
            success: function (response) {
                if (response.success) {
                    elem.remove()
                }
            },
        });
        $(this).parents('tr').hide('slow');
    }
});
