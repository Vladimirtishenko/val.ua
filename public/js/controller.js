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
    this.listen(['scroll'], [window], self.scrollHandler.bind(self, value));
    if(!value){
      self.generateDataAjax();  
    }
};


var handlerAllStart = function() {
    "use strict";
    new FacebookPopUp();
    new Slider(document.querySelector('.val-list-slider'));
    new IframeGemerate(document.querySelector('.val-iframe-streams'));
    new AjaxLoadCategory(document.querySelector('.val-full-width-category'));
    new Modal();
    new Currency();
    new weatherForVal();
    new MenuButton(document.querySelector('.val-button-menu'), document.querySelector('.val-all-outer'));
    new Market(document.querySelector('.val-market-table'));
    new StickyAccordeon(document.getElementById('val-only-else-pages'));
    new AjaxLoaderCategorySingle(document.getElementById('val-single-category'), document.getElementById('val-count-and-id'));
    new AjaxLoaderMultimedia(document.getElementById('val-single-multimedia'), document.getElementById('val-count-and-id'));
    new Pikaday({ field: document.getElementById('datepicker') });
    new MansoryGenerator(document.querySelectorAll('.-for-mansory-container'));
};

var handlerToError = function(e){
    console.log(e);
}

if(location.href.indexOf('jasmine') == -1){
    window.addEventListener('DOMContentLoaded', handlerAllStart);  
    window.addEventListener('error', handlerToError);  
}

