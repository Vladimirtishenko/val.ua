function AjaxLoadCategory(element) {
    "use strict";
    if(!element) {
        return;
    }
    
    this.count = 1;
    this.container = element;
    this.state = true;

    this.commonProps(this, 'general');
}

AjaxLoadCategory.prototype = Object.create(AjaxConstructor.prototype);


AjaxLoadCategory.prototype.generateDataAjax = function(id) {
    "use strict";
    var self = this;
    this.Xhr('GET', '/site/GetCategory?id=' + id, null, self, self.responseGetServer);

};

AjaxLoadCategory.prototype.responseGetServer = function(response, self) {
    "use strict";
    var res = JSON.parse(response),
        news = JSON.parse(res.news),
        category = JSON.parse(res.category),
        lang = res.language;

    self.templateCategory(news, category, lang);
};

AjaxLoadCategory.prototype.templateCategory = function(news, category, lang) {
    "use strict";
    var self = this,
        str = '<div class="val-category-block"><h2 class="val-title-uppercase-with-line">' + category[0]['name_' + lang] + '</h2><div class="val-news-list-category">';


    for (var i = 0; i < news.length; i++) {
        if (i === 0) {
            str += self.templateImage(news[i], lang);
        } else {
            str += self.templateWithoutImage(news[i], lang);
        }
    }

    str += '</div></div>';

    self.container.insertAdjacentHTML('beforeend', str);

    this.state = true;
    this.count++;

};