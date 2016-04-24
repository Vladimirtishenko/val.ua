function AjaxLoaderCategorySingle(element, hidden){
    "use strict";

    if(!element) {
        return;
    }

    this.element = element;
    this.id = hidden.getAttribute('data-id') ? hidden.getAttribute('data-id') : null;
    this.count = hidden.getAttribute('data-count');
    this.state = true;

    this.commonProps(this, null);

}


AjaxLoaderCategorySingle.prototype = Object.create(AjaxConstructor.prototype);


AjaxLoaderCategorySingle.prototype.generateDataAjax = function(){
    "use strict";
    this.Xhr('GET', '/site/GetCategoryByIdXhrOrNotId?id=' + this.id + '&offset=' + this.count, null, this, this.template);

};

AjaxLoaderCategorySingle.prototype.template = function(data, self){
    "use strict";
    var dataContent = JSON.parse(JSON.parse(data).news),
        lang = JSON.parse(data).language,
        template = '';


    dataContent.forEach(function(item){
        template += '<a href="/site/news/'+item.id+'" class="val-block-gen-news">' +
                        '<div class="val-image-block-gen-news">' +
                            '<img src="/uploads/news/thumb/'+item.image+'">' +
                        '</div>' +
                        '<div class="val-description-block-gen-news">' +
                             '<span class="val-news-view">'+item.views+'</span>' +
                             '<span class="val-content-news-data">'+self.dateHalper(item.date, lang)+'</span>' +
                            '<h3 class="val-content-news-title-small">'+item['title_'+lang]+'</h3>' +
                        '</div>' +
                    '</a>';
    });


    self.element.insertAdjacentHTML('beforeend', template);

    self.count = JSON.parse(data).offset;
    self.state = true;

};