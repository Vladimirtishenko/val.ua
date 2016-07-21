/*=============================================
=            Section MenuButton block      =
=============================================*/

function MenuButton(button, element) {
    "use strict";
    if(!element && !button) {
        return false;
    }

    button.addEventListener('click', this.slideMenu.bind(this, element, button));

}


MenuButton.prototype.slideMenu = function(element, button) {
    "use strict";

    button.classList.toggle('-val-active-menu-side');
    element.classList.toggle('val-all-outer-animate');

};


/*=====  End of MenuButton comment block  ======*/