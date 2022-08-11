; (function ($) {
    "use strict";

    $(document).ready(function () {
        // Custom Cursor
        var data = ecc_data;


        function customCursor() {
            var cursor = $('.dl-cursor'),
                cursorFill = $('.dl-fill');
            // linksCursor = $(data.selectors);

            $(window).on('mousemove', function (e) {
                cursor.css({ 'transform': 'translate(' + (e.clientX - 3) + 'px,' + (e.clientY - 3) + 'px)', 'visibility': 'inherit' });
                cursorFill.css({ 'transform': 'translate(' + (e.clientX - 19) + 'px,' + (e.clientY - 19) + 'px)', 'visibility': 'inherit' });

                // style two
                $('.cursor-style-two')
                    .eq(0)
                    .css({
                        left: e.pageX,
                        top: e.pageY,
                        'visibility': 'inherit',
                    });
                setTimeout(function () {
                    $('.cursor-style-two')
                        .eq(1)
                        .css({
                            left: e.pageX,
                            top: e.pageY,
                            'visibility': 'inherit',
                        });
                }, 100);

                //style three
                $('.cursor-style-three')
                    .eq(0)
                    .css({
                        left: e.pageX,
                        top: e.pageY,
                        'visibility': 'inherit',
                    });
                setTimeout(function () {
                    $('.cursor-style-three')
                        .eq(1)
                        .css({
                            left: e.pageX,
                            top: e.pageY,
                            'visibility': 'inherit',
                        });
                }, 100);

            });

            $(window).on('mouseout', function () {
                cursor.css('visibility', 'hidden');
                cursorFill.css('visibility', 'hidden');
                $('.cursor-style-two').css('visibility', 'hidden');
                $('.cursor-style-three').css('visibility', 'hidden');
            });
        }

        if ('yes' === data.status) {
            if ($(window).width() < 768) {
                if ('yes' === data.mobile_status) {
                    customCursor();
                    $('.dl-cursor').css('display', 'none');
                    $('.dl-fill').css('display', 'none');
                    $('.cursor-style-two').css('display', 'none');
                    $('.cursor-style-three').css('display', 'none');
                }
            } else {
                customCursor();
                console.log("abc desk");
            }
        }
    });

})(jQuery);