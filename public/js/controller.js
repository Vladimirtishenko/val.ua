function Site() {
    "use strict";
}

Site.prototype = Object.create(ModelXhr.prototype);


function AjaxConstructor(){
    "use strict";
}

AjaxConstructor.prototype = Object.create(Site.prototype);

AjaxConstructor.prototype.commonProps = function(self, value){
    "use strict";
    window.addEventListener('scroll', self.scrollHandler.bind(self, value));
    if(!value){
      self.generateDataAjax();  
    }
};


var handlerAllStart = function() {
    "use strict";
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
};

if(location.href.indexOf('jasmine') == -1){
    window.addEventListener('DOMContentLoaded', handlerAllStart);  
}

