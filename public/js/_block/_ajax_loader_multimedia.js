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
        template = [],
        classie = '',
        classieType = '';

    var RandomNumberArray = [4,5,14];

    dataContent.forEach(function(item, i){
        if(i == RandomNumberArray[0]){ 
            classie = '-big-img';
            RandomNumberArray.shift();
        } else {
            classie = '';
        }
        classieType = '-val-ico-'+item.type;
        var elementOuter = document.createElement('a'), 
            elementInner = document.createElement('div'), 
            img = new Image(), 
            elementSpan = document.createElement('span');
        
        elementOuter.href = (item.type == 'photo') ? '/'+lang+'/site/photos/'+item.id : '/'+lang+'/site/video/'+item.id;
        classie ? elementOuter.classList.add('val-block-multimedia', classieType, classie) : elementOuter.classList.add('val-block-multimedia', classieType);
        elementInner.classList.add('val-image-block-multimedia');
        (item.type == 'photo') ? img.src = '/uploads/galery/category/'+item.image+'' : img.src = 'http://img.youtube.com/vi/'+item.image+'/mqdefault.jpg';
        elementSpan.classList.add('-val-multimedia-description');

        elementSpan.innerHTML = item['name_'+lang];

        elementInner.appendChild(img);
        elementOuter.appendChild(elementSpan);
        elementOuter.appendChild(elementInner);

        template.push(elementOuter);
    });

     for (var i = template.length - 1; i >= 0; i--) {
        self.element.appendChild(template[i]);
    }

    if(self._Masonry_){
        self._Masonry_.appended(template);
        self._Masonry_.layout();
        readyNextIteration();
    } else {
        setTimeout(function () {
            self._Masonry_ = new Masonry( self.element, {
              itemSelector: '.val-block-multimedia',
              columnWidth: 1
            });
            readyNextIteration();
            self.element.style.opacity = 1;
        }, 500);
    }

    function readyNextIteration(){
        self.count = JSON.parse(data).offset;
        self.state = true;
    }

};