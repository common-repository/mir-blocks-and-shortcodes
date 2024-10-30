(function ($) {

    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,
        to: 100,
        speed: 5000,
        refreshInterval: 100,
        decimals: 0,
        onUpdate: null,
        onComplete: null,
    };

    $(window).on("load", function(){
        $(document).ready(function () {

        });
    });
    $(document).ready(function () {
        $('.mp-stats-counter').each(function() {
            $(this).countTo({
                from: $(this).data('from'),
                to: $(this).data('to'),
                speed: $(this).data('speed'),
                decimals: $(this).data('decimals'),
                onComplete: function(value) {
                    $(this).addClass("mp-stats-display").delay(540).queue(function(next){
                        $(this).removeClass("mp-stats-display");
                        next();
                    });
                    $(this).prev().removeClass("mp-stats-ready-display").delay(500).queue(function(next){
                        $(this).addClass("mp-stats-ready-display");
                        next();
                    });
                }
            });
        });
    });
})(jQuery);