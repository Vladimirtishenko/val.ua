function Site() {}

Site.prototype = Object.create(ModelXhr.prototype);


function AjaxConstructor(){}

AjaxConstructor.prototype = Object.create(Site.prototype);

AjaxConstructor.prototype.commonProps = function(self, value){
    window.addEventListener('scroll', self.scrollHandler.bind(self, value));
    if(!value){
      self.generateDataAjax();  
    }
}


function handlerAllStart() {
    new Slider(document.querySelector('.val-list-slider'));
    new IframeGemerate(document.querySelector('.val-iframe-streams'));
    new AjaxLoadCategory(document.querySelector('.val-full-width-category'));
    new Modal();
    new Currency();
    new weatherForVal();
    new StickyAccordeon(document.getElementById('val-only-else-pages'));
    new AjaxLoaderCategorySingle(document.getElementById('val-single-category'), document.getElementById('val-count-and-id'));
    new AjaxLoaderMultimedia(document.getElementById('val-single-multimedia'), document.getElementById('val-count-and-id'));
    new Pikaday({ field: document.getElementById('datepicker') });
}

window.addEventListener('DOMContentLoaded', handlerAllStart)
