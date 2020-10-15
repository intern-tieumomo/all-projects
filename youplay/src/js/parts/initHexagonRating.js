/*------------------------------------------------------------------

  Init Hexagon Rating

-------------------------------------------------------------------*/
function initHexagonRating() {
    if ($.fn.hexagonProgress === 'undefined') {
        return;
    }

    $('.youplay-hexagon-rating:not(.youplay-hexagon-rating-ready)').each(function () {
        const max = parseFloat($(this).attr('data-max')) || 10;
        const cur = parseFloat($(this).text()) || 0;
        const size = parseFloat($(this).attr('data-size')) || 120;
        const backColor = $(this).attr('data-back-color') || 'rgba(255,255,255,0.1)';
        const frontColor = $(this).attr('data-front-color') || '#fff';

        $(this).css({
            width: size,
            height: size,
        }).hexagonProgress({
            value: cur / max,
            size,
            animation: false,
            // 60deg + fix (strange error in hexagon plugin)
            startAngle: (60 + 0.00000001) * Math.PI / 180,
            lineWidth: 2,
            clip: true,
            lineBackFill: { color: backColor },
            lineFrontFill: { color: frontColor },
        });

        $(this).addClass('youplay-hexagon-rating-ready');
    });
}

export { initHexagonRating };
