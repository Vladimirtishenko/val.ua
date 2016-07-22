function StickyAccordeon(element){
    "use strict";
    if(!element) {
        return;
    }
    var self = this;
    self.accordeon = element.querySelector('.val-accordeons-block');
    self.listen(['scroll'],[window],self.positionOfAccordeon.bind(self))

}

StickyAccordeon.prototype = Object.create(Site.prototype)

StickyAccordeon.prototype.positionOfAccordeon = function () {
    "use strict";
    var elementOuterParent = this.accordeon.parentNode.getBoundingClientRect(),
        footer = document.querySelector('.val-footer').getBoundingClientRect();

    if(elementOuterParent.top <= 30 && footer.top > 450){
        this.accordeon.style.paddingTop = ((-elementOuterParent.top)) +"px";
    } else if(elementOuterParent.top > 30 && this.accordeon.getAttribute('style')) {
        this.accordeon.removeAttribute('style');
    } 

}; 