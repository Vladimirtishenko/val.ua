function StickyAccordeon(element){
    "use strict";
    if(!element) {
        return;
    }
    var self = this;
    self.accordeon = element.querySelector('.val-accordeons-block');
    window.addEventListener('scroll', self.positionOfAccordeon.bind(self));
}

StickyAccordeon.prototype.positionOfAccordeon = function () {
    "use strict";
    var elementOuterParent = this.accordeon.parentNode.getBoundingClientRect();

    if(elementOuterParent.top <= 30 && this.accordeon.style.position !== 'fixed'){
        this.accordeon.style.paddingTop = ((-elementOuterParent.top)) +"px";
    } else if(elementOuterParent.top > 30 && this.accordeon.getAttribute('style')) {
        this.accordeon.removeAttribute('style');
    } 

}; 