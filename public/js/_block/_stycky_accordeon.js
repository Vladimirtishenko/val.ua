function StickyAccordeon(element){
    "use strict";
    if(!element) {
        return;
    }
    this.accordeon = element.querySelector('.val-accordeons-block') || document.querySelector('.val-market-sticky');
    this.listen(['scroll'],[window],this.positionOfAccordeon.bind(this))

}

StickyAccordeon.prototype = Object.create(Site.prototype)

StickyAccordeon.prototype.positionOfAccordeon = function () {
    "use strict";
    var elementOuterParent = this.accordeon.parentNode.getBoundingClientRect(),
        footer = document.querySelector('.val-footer').getBoundingClientRect(),
        cord = this.accordeon.classList.contains('val-market-sticky') ? 789 : 450;

    if(elementOuterParent.top <= 30 && footer.top > cord) {
        this.accordeon.style.paddingTop = ((-elementOuterParent.top +10)) +"px";
    } else if(elementOuterParent.top > 30 && this.accordeon.getAttribute('style')) {
        this.accordeon.removeAttribute('style');
    } 

}; 