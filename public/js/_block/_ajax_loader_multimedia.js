function AjaxLoaderMultimedia(element, hidden){
    "use strict";
    if(!element) {
        return;
    }

    this.element = element;
    this.count = hidden.getAttribute('data-count');
    this.state = true;
    this._Masonry_ = null;

    this.commonProps(this, null);
}


AjaxLoaderMultimedia.prototype = Object.create(AjaxConstructor.prototype);


AjaxLoaderMultimedia.prototype.generateDataAjax = function(){
    "use strict";
    this.Xhr('GET', '/site/GetMultimedia?offset=' + this.count, null, this, this.template);

};

AjaxLoaderMultimedia.prototype.template = function(data, self){
    "use strict";
    var dataContent = JSON.parse(JSON.parse(data).multimedia),
        lang = JSON.parse(data).language,
        elementOuter = document.createElement('div'),
        templateArray = [];

    dataContent.forEach(function(item, i){ 
        
        elementOuter.innerHTML = "";


        var template = "<a class='val-block-multimedia -val-ico-"+ item.type +"' href="+ ((item.type == 'photo') ? '/'+lang+'/site/photos/'+item.id : '/'+lang+'/site/video/'+item.id) +">" +
                            "<span class='-val-multimedia-description'>"+item['name_'+lang]+"</span>" +
                            "<div class='val-image-block-multimedia'>" + 
                                "<img src="+ ((item.type == 'photo') ? 'http://val.ua/uploads/galery/category/'+item.image+'' : 'http://img.youtube.com/vi/'+item.image+'/mqdefault.jpg') +" />"+
                            "</div>"+
                        "</a>";

        elementOuter.insertAdjacentHTML('afterbegin', template);

        templateArray.push(elementOuter.firstElementChild);
    });

   
    for (var i = templateArray.length - 1; i >= 0; i--) {
        self.element.appendChild(templateArray[i]);
    }

    if(self._Masonry_){
        self._Masonry_.appended(templateArray);
        self._Masonry_.layout();
    } else {
        setTimeout(function () {
            self._Masonry_ = new Masonry( self.element, {
              itemSelector: '.val-block-multimedia',
              columnWidth: 1
            });
            self._Masonry_.on( 'layoutComplete', readyNextIteration);
            readyNextIteration();
            self.element.style.opacity = 1;
        }, 500);
    }

    function readyNextIteration(){
        self.count = JSON.parse(data).offset;
        self.state = true;
    }

};