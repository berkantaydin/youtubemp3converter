$(function () {
    path = window.location.pathname;
    path = path.replace('/', '');
    switch (path) {
        case "":
            $("li#index").addClass("active");
            break;
        case "stats/viewed":
            $("li#mostviewed").addClass("active");
            break;
        default :
            break;
    }

    $("a[rel=popover]")
        .popover({
            trigger: 'hover',
            placement: 'top',
            offset: 10
        });


    $("div.indir_link").hide();
    setTimeout(function () {
        $("div.indir_link").show();
    }, 50000);

    setTimeout(function () {

        $('.progress .bar').each(function () {
            var me = $(this);
            var perc = me.attr("data-percentage");

            //TODO: left and right text handling

            var current_perc = 0;

            var progress = setInterval(function () {
                if (current_perc >= perc) {
                    clearInterval(progress);
                } else {
                    current_perc += 1;
                    me.css('width', (current_perc) + '%');
                }

                me.text((current_perc) + '%');

            }, 500);

        });

    }, 300);

});