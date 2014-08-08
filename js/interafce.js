(function($) {

    $(function() {

        // Drag & drop events handling
        var $dropBox = $("#drop-box");
        var $uploadForm = $("#upload-form");
        var exitedToForm = false;
        var highlighted = false;
        var highlight = function(mode) {
            mode ? $dropBox.addClass('highlighted') : $dropBox.removeClass('highlighted');
        };
        $dropBox.on({
            dragenter: function() {
                highlight(true);
            },
            dragover: function() {
                highlighted || highlight(true);
                return false; // To prevent default action
            },
            dragleave: function() {
                setTimeout(function() {
                    exitedToForm || highlight(false);
                }, 50);
            },
            drop: function() {
                highlight(false);
            }
        });
        $uploadForm.on({
            dragenter: function() {
                exitedToForm = true;
                highlighted || highlight(true);
            },
            dragleave: function() {
                exitedToForm = false;
            }
        });

    });

})(window.jQuery);
