/*window.onload = function () {
    function a(a, b) {
        var c = /^(?:file):/, d = new XMLHttpRequest, e = 0;
        d.onreadystatechange = function () {
            4 == d.readyState && (e = d.status), c.test(location.href) && d.responseText && (e = 200), 4 == d.readyState && 200 == e && (a.outerHTML = d.responseText)
        };
        try {
            d.open("GET", b, !0), d.send()
        } catch (f) {
        }
    }

    var b, c = document.getElementsByTagName("*");
    for (b in c) c[b].hasAttribute && c[b].hasAttribute("data-include") && a(c[b], c[b].getAttribute("data-include"))
};
*/
$(() => {
    $(".select2").select2({minimumResultsForSearch: -1});

    $('.task output,.ref-link output').on("click", function () {
        $(this).selectText();
        document.execCommand("copy");
    });
    $(".timer .time").each(function () {
        const time = $(this).data('time');
         var today = new Date();

        utcDate = new Date(Date.UTC(today.getFullYear(), today.getUTCMonth()+1, today.getDay()+1, 0, 0, 0));
        $(this).countdown(utcDate, function (event) {
            $(this).text(event.strftime('%H:%M:%S'));
        });
    });
    // ÑƒÐ±ÐµÑ€ÐµÑˆÑŒ setTimeout
    setTimeout(() => {
        $('.show-items').click(function (e) {
            e.preventDefault();
            const item = $(this).closest('.investment');
            item.find('.items').slideToggle();
            item.toggleClass('toggled');
        });
        $('.sidebar-toggler').click(function (e) {
            e.preventDefault();
            $('.sidebar').toggle("slide", {direction: "left"}, 500);
            $(this).toggleClass('active');
        });
    }, 500);
});