// image popup

$('.popover').on({
    mousemove: function(e) {
        $(this).next('img').css({
            top: e.pageY - 10,
            left: e.pageX - 100
        });
    },
    mouseenter: function() {
        var big = $('<img />', {'class': 'big_img', src: this.src});
        $(this).after(big);
    },
    mouseleave: function() {
        $('.big_img').remove();
    }
});