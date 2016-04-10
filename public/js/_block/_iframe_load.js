/*=============================================
=            Section IframeGemerate block      =
=============================================*/

function IframeGemerate(element) {
    "use strict";
    if(!element) {
        return false;
    }

    var dataArray = element.getAttribute('data-src').split(','),
        self = this,
        template = '';

    dataArray.forEach(function(item) {
        template += self.template(item);
    });

    element.insertAdjacentHTML('afterbegin', template);

}


IframeGemerate.prototype.template = function(src) {
    "use strict";
    var str = "<div class='val-outer-frame'>" +
        "<span class='val-ico-online'><i>Online</i></span>" +
        "<iframe width='100%' height='270px' src='" + src + "' frameborder='0' allowfullscreen></iframe>" +
        "</div>";

    return str;
};


/*=====  End of IframeGemerate comment block  ======*/