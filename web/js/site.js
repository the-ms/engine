$('.js-delete').click(function() {
    return confirm('Вы действительно хотите удалить?');
});

$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});