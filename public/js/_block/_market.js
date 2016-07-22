/*=============================================
=            Section Market      =
=============================================*/

function Market(element) {

    if (!element) {
        return;
    }

    this.element = element;
    var child = this.element.children;


    for (var i = 0; i < child.length; i++) {
        this.listen(['mouseenter', 'mouseleave'], [child[i]], this.HandlerToMouseEnterLeave);
    }

}

Market.prototype = Object.create(Site.prototype);

Market.prototype.HandlerToMouseEnterLeave = function() {

    var attr = this.getAttribute('data-attr'),
        block = document.getElementById(attr);

    if (!block) {
        return;
    }

    if (event.type == "mouseenter") {
        block.style.display = "block";
    } else {
        block.style.display = "none";
    }

};



/*=====  End of Section Market block  ======*/
