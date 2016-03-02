function StickyAccordeon(element){

    if(!element) return;

    this.accordeon = element.querySelector('.val-accordeons-block');
    
    var self = this;

    window.addEventListener('scroll', self.positionOfAccordeon.bind(self))

}

StickyAccordeon.prototype.positionOfAccordeon = function () {

    var elementOuterParent = this.accordeon.parentNode.getBoundingClientRect();

    if(elementOuterParent.top <= 30 && this.accordeon.style.position != 'fixed'){
        this.accordeon.style.position = 'fixed'
    } else if(elementOuterParent.top > 30 && this.accordeon.getAttribute('style')) {
        this.accordeon.removeAttribute('style')
    } 

}   