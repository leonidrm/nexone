jQuery(document).ready( function($) {
    /* Single Project */
    $('.nex-project-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 2000,
        asNavFor: '.nex-project-nav'
    });
    $('.nex-project-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.nex-project-slider',
        dots: false,
        arrows: false,
        centerMode: false,
        focusOnSelect: true
    });

    /*Load more*/
    let noMoreItems = false;

    $('.nex-portfolio-loadmore').on('click', function(e){
        e.preventDefault();

        let button          = $(this);
        let buttonData      = button.data('ajax');
        let isotopeContainer= button.siblings('.isotope-container');

        if(noMoreItems)
            return;

        $.ajax({
            url: nex_ajax_object.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action          : 'nex_load_portfolio',
                loadMoreData    : buttonData,
            },
            success: function(response) {
                console.log(response)
                if(response.html !== '') {
                    $newContent = $(response.html)
                    $newContent.imagesLoaded(function(){
                        isotopeContainer
                            .append($newContent)
                            .isotope('appended', $newContent)
                    });
                    buttonData.paged++;
                } 
                if(response.result === '0'){
                    button.find('a').text(buttonData.no_posts_text);
                    noMoreItems = true;
                }
            },
            fail: function(er,err,error) {
                console.log(er,err,error);
            }
        });
    });
});