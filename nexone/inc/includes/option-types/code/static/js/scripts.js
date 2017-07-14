jQuery(document).ready(function ($) {
    var optionTypeClass = '.fw-option-type-code';
    /**
     * Listen to special event that is triggered for uninitialized elements
     */
    fwEvents.on('fw:options:init', function (data) {
        /**
         * data.$elements are jQuery selected elements
         * that contains options html that needs to be initialized
         *
         * Find uninitialized options by main class
         */
        var $options = data.$elements.find(optionTypeClass +':not(.initialized)');

        if($('#fw-option-css_area').length && !$('#fw-option-css_area').hasClass('initialized')) {
            CodeMirror.fromTextArea(document.getElementById("fw-option-css_area"), {
                lineNumbers: true,
                mode: "css",
                theme: "mdn-like",
                matchBrackets: true,
                autoCloseBrackets: true
            });
        }
        if($('#fw-option-js_area').length && !$('#fw-option-js_area').hasClass('initialized')) {
            CodeMirror.fromTextArea(document.getElementById("fw-option-js_area"), {
                lineNumbers: true,
                mode: "javascript",
                theme: "mdn-like",
                matchBrackets: true,
                autoCloseBrackets: true
            });
        }

        /**
         * After everything has done, mark options as initialized
         */
        $options.addClass('initialized');
    });
});