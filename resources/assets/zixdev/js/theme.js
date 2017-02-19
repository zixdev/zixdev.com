$(function () {
    var $document = $(document);


    $document.on('click', '.smooth-scroll a', function (event) {
        event.preventDefault();
        var elAttr = $(this).attr('href');
        $('body,html').animate({
            scrollTop: ($(elAttr).offset().top)
        }, 700);
    });

});