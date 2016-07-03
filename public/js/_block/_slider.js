/*=============================================
=            Section Slider block            =
=============================================*/

function Slider(elem) {
    "use strict";
    if (!elem) {
        return;
    }

    this.list = elem;
    this.countChild = elem.children.length;
    this.width = elem.parentNode.clientWidth;
    this.currentSlide = 0;

    elem.style.width = this.width * this.countChild + 'px';

    this.createControls(this.countChild);

}

Slider.prototype.createControls = function(count) {
    "use strict";
    var constrols = document.querySelector(".val-display-controls"),
        items = "",
        self = this;

    for (var i = 0; i < count; i++) {
        items += (i === 0) ? "<span class='-active-slide' data-slide=" + i + "></span>" : "<span data-slide=" + i + "></span>";
    }

    constrols.insertAdjacentHTML("afterbegin", items);
    constrols.addEventListener("click", self._clickSlideHandlers.bind(self));
    this.controlsBuild = true;

};

Slider.prototype._clickSlideHandlers = function(event) {
    "use strict";
    var target = event.target ? event.target : event,
        self = this,
        clicked = target.getAttribute('data-slide') ? parseInt(target.getAttribute('data-slide')) : null,
        move = null;

    if (clicked == null || target.classList.contains('-active-slide')) {
        return;
    }

    toSlideAnimation(parseInt((-self.width) * clicked), 0.8);
       

    function toSlideAnimation(move, speed) {

        var activeBeforeSlide = document.querySelector(".-active-slide");

        self.list.style.cssText += "transition-duration: " + speed + "s; ";
        self.list.style.cssText += "transform: translateX(" + move + "px)";
        self.currentSlide = clicked;
        self.move = move;

        activeBeforeSlide.parentNode.querySelector("span[data-slide='" + clicked + "']").classList.add("-active-slide");
        activeBeforeSlide.classList.remove("-active-slide");

    }

};

/*=====  End of Slider block  ======*/
