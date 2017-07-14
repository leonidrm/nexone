/* =================Ajaxify forms=======================*/
// Ovewriting obj from:
// fw_get_framework_directory_uri('/static/js/fw-form-helpers.js')
jQuery(function(){
    isAdmin = (typeof adminpage != 'undefined' && jQuery(document.body).hasClass('wp-admin'));
    if(typeof fwForm != 'undefined'){
        fwForm.initAjaxSubmit({
            //selector: 'form[some-custom-attribute].or-some-class'

            // Open the script code and check the `opts` variable
            // to see all options that you can overwrite/customize.
            onSuccess: function (elements, ajaxData) {
                if (isAdmin) {
                    fwForm.backend.showFlashMessages(
                        fwForm.backend.renderFlashMessages(ajaxData.flash_messages)
                    );
                } else {
                    let html = fwForm.frontend.renderFlashMessages(ajaxData.flash_messages);
                    let resultHolder;

                    if (!html.length) {
                        html = '<p>Success</p>';
                    }

                    resultHolder = elements.$form.find('li.fw-flash-message').parent();

                    if(resultHolder.length){
                        resultHolder.fadeOut(function(){
                            resultHolder.replaceWith(html)
                            resultHolder.fadeIn();
                        });
                    } else {
                        elements.$form.append(html)
                    }

                    // prevent multiple fast submit
                    elements.$form.on('submit', function(e){ 
                        e.preventDefault(); e.stopPropagation(); 
                    });
                    // reenable submit
                    setTimeout(function(){
                        elements.$form.off('submit');
                    },3000)
                }
            }
        });
    }
});