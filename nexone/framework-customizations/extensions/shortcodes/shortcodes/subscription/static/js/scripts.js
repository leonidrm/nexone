jQuery(document).ready(function ($) {

/*Subscribe*/
$('.nex-form-subscribe').on('submit', function(e){
    e.preventDefault();
    let form = $(this);
    let resultContainer = form.find('.result-message');
    $.ajax({
        url: nex_ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'nex_subscribe',
            email: form.find('[name="email"]').val(),
            lists: form.find('[name="lists"]').val(),
        },
        dataType: 'json'
    })
        .done(function(response) {
            console.log(response);
            resultContainer.text(response.message)
        })
        .fail(function(er,err,error) {
            console.log(er,err,error);
        });

    return false;
});

});