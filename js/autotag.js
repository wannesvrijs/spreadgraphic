$('body').on('input', 'textarea[name=gra_tags]', function() {
    $(this).val($(this).val().replace(/ /g, ' #'));
});

$('.tags').click(function() {
    var text = $('.tags');
    text.val('#');
});