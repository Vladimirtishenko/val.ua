function Site() {}

Site.prototype = Object.create(ModelXhr.prototype);

/*=============================================
=            Section Slider block            =
=============================================*/

function Slider(elem) {

    if (!elem) return;

    this.list = elem;
    this.countChild = elem.children.length;
    this.width = parseInt(window.getComputedStyle(elem.parentNode).getPropertyValue('width'));
    this.move = 0;
    this.currentSlide = 0;

    elem.style.width = this.width * this.countChild + 'px';

    [].forEach.call(elem.children, staticSize)

    function staticSize(item, i) {
        item.setAttribute("data-slides-number", i)
    }

    this.createControls(this.countChild)

}

Slider.prototype.createControls = function(count) {
    var constrols = document.querySelector(".val-display-controls"),
        items = "",
        self = this;

    for (var i = 0; i < count; i++) {
        items += (i == 0) ? "<span class='-active-slide' data-slide=" + i + "></span>" : "<span data-slide=" + i + "></span>";
    };

    constrols.insertAdjacentHTML("afterbegin", items);
    constrols.addEventListener("click", self._clickSlideHandlers.bind(self));
    this.controlsBuild = true;



}

Slider.prototype._clickSlideHandlers = function(event) {
    var target = event.target ? event.target : event,
        self = this,
        clicked = parseInt(target.getAttribute('data-slide'));

    if (!clicked) return;

    if (clicked > this.currentSlide) {
        if ((this.currentSlide + 1) < clicked) {
            var move = parseInt((-self.width) * clicked);
            toSlideAnimation(move, 0.5);
        } else {
            var move = parseInt(self.move) + parseInt(-self.width)
            toSlideAnimation(move, 0.8);
        }

    } else {
        if ((this.currentSlide - 1) > clicked) {
            var move = parseInt((-self.width) * clicked)
            toSlideAnimation(move, 0.5);
        } else {
            var move = parseInt(self.move) + parseInt(self.width)
            toSlideAnimation(move, 0.8);
        }
    }

    function toSlideAnimation(move, speed) {

        var activeBeforeSlide = document.querySelector(".-active-slide");

        self.list.style.cssText += "transition-duration: " + speed + "s; ";
        self.list.style.cssText += "transform: translateX(" + move + "px)";
        self.currentSlide = clicked;
        self.move = move;

        activeBeforeSlide.parentNode.querySelector("span[data-slide='" + clicked + "']").classList.add("-active-slide");
        activeBeforeSlide.classList.remove("-active-slide");

    }

}

/*=====  End of Slider comment block  ======*/


/*=============================================
=            Section IframeGemerate block      =
=============================================*/

function IframeGemerate(element) {

    if(!element) return;

    var dataArray = element.getAttribute('data-src').split(','),
        self = this,
        template = '';

    dataArray.forEach(function(item) {
        template += self.template(item);
    })

    element.insertAdjacentHTML('afterbegin', template);

}


IframeGemerate.prototype.template = function(src) {
    var str = "<div class='val-outer-frame'>" +
        "<span class='val-ico-online'><i>Online</i></span>" +
        "<iframe width='100%' height='270px' src='" + src + "' frameborder='0' allowfullscreen></iframe>" +
        "</div>";

    return str;
}


/*=====  End of IframeGemerate comment block  ======*/


/*=============================================
=            Section AjaxLoadCategory block      =
=============================================*/

function AjaxLoadCategory(element) {

    if(!element) return;

    var self = this;

    this.state = true;
    this.count = 1;
    this.container = element;

    window.addEventListener('scroll', self.scrollHandler.bind(self));
}


AjaxLoadCategory.prototype = Object.create(Site.prototype);

AjaxLoadCategory.prototype.scrollHandler = function() {

    if (document.body.offsetHeight - 500 < window.scrollY + window.innerHeight && this.state && this.count < 10) {
        if (this.count == 7) {
            this.count++;
        }
        this.state = false;
        this.XhrConstructor(this.count);
    }

}

AjaxLoadCategory.prototype.XhrConstructor = function(id) {

    var self = this;
    this.Xhr('GET', '/site/GetCategory?id=' + id, null, self, self.responseGetServer);

}

AjaxLoadCategory.prototype.responseGetServer = function(response, self) {

    var res = JSON.parse(response),
        news = JSON.parse(res.news),
        category = JSON.parse(res.category),
        lang = res.language;

    self.templateCategory(news, category, lang);
}

AjaxLoadCategory.prototype.templateCategory = function(news, category, lang) {

    var self = this,
        str = '<div class="val-category-block"><h2 class="val-title-uppercase-with-line">' + category[0]['name_' + lang] + '</h2><div class="val-news-list-category">';


    for (var i = 0; i < news.length; i++) {
        if (i == 0) {
            str += self.templateImage(news[i], lang);
        } else {
            str += self.templateWithoutImage(news[i], lang);
        }
    };

    str += '</div></div>';

    self.container.insertAdjacentHTML('beforeend', str);

    this.state = true;
    this.count++;

}

AjaxLoadCategory.prototype.templateImage = function(arrays, lang) {

    var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category val-category-image">' +
        '<div class="val-item-outer-category-image">' +
        '<img src="/uploads/news/thumb/' + arrays.image + '" alt="' + arrays['title_' + lang] + '">' +
        '</div>' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + arrays.date + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '</a>';

    return template;
}

AjaxLoadCategory.prototype.templateWithoutImage = function(arrays, lang) {
    var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category">' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + arrays.date + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '<p class="val-description-news-category">' + arrays['description_' + lang].slice(0, 250) + '...</p>' +
        '</a>';

    return template;
}


/*=====  End of IframeGemerate comment block  ======*/


/*==============================================================
=            Section AjaxLoaderCategorySingle block            =
==============================================================*/

function AjaxLoaderCategorySingle(element, hidden){


    if(!element) return;

    this.element = element;
    this.id = hidden.getAttribute('data-id') ? hidden.getAttribute('data-id') : null;
    this.count = hidden.getAttribute('data-count');
    this.state = true;

    window.addEventListener('scroll', this.scrollHandler.bind(this));

    this.generateDataAjax();

}


AjaxLoaderCategorySingle.prototype = Object.create(Site.prototype);


AjaxLoaderCategorySingle.prototype.generateDataAjax = function(){

    this.Xhr('GET', '/site/GetCategoryByIdXhrOrNotId?id=' + this.id + '&offset=' + this.count, null, this, this.template);

}

AjaxLoaderCategorySingle.prototype.template = function(data, self){

    var dataContent = JSON.parse(JSON.parse(data).news),
        lang = JSON.parse(data).language,
        template = '';


    dataContent.forEach(function(item, i){
        template += '<a href="/site/news/'+item.id+'" class="val-block-gen-news">' +
                        '<div class="val-image-block-gen-news">' +
                            '<img src="/uploads/news/thumb/'+item.image+'">' +
                        '</div>' +
                        '<div class="val-description-block-gen-news">' +
                             '<span class="val-news-view">'+item.views+'</span>' +
                             '<span class="val-content-news-data">'+item.date+'</span>' +
                            '<h3 class="val-content-news-title-small">'+item['title_'+lang]+'</h3>' +
                        '</div>' +
                    '</a>';
    })


    self.element.insertAdjacentHTML('beforeend', template);

    self.count = JSON.parse(data).offset;
    self.state = true;

}


AjaxLoaderCategorySingle.prototype.scrollHandler = function() {

    if (document.body.offsetHeight - 1200 < window.scrollY + window.innerHeight && this.state) {
        this.state = false;
        this.generateDataAjax();
    }

}

/*=====  End of AjaxLoaderCategorySingle block  ======*/

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


/*=============================================
=            Section Modal block            =
=============================================*/

function Modal() {

    var self = this;

    this.login = document.querySelector('.-login');
    this.registration = document.querySelector('.-registration');
    this.outerModal = document.querySelector('.val-modal-login-reg-outer');
    this.rememberPassOrBack = document.querySelectorAll('.-val-remember-pass');
    this.formSubmit = this.outerModal.querySelectorAll('form');

    this.StaticForm = null;

    this.login.addEventListener('click', self.openForm.bind(self, this.login));
    this.registration.addEventListener('click', self.openForm.bind(self, this.registration));

    for (var i = 0; i < this.rememberPassOrBack.length; i++) {
        this.rememberPassOrBack[i].addEventListener('click', self.openRememberPassOrBack.bind(self));
    };

    for (var i = 0; i < this.formSubmit.length; i++) {
        this.formSubmit[i].addEventListener('submit', self.sendForm.bind(self, this.formSubmit[i].id));
    };

}

Modal.prototype = Object.create(Site.prototype);

Modal.prototype.openForm = function(button, event) {

    this.contentBox = document.querySelector("." + button.getAttribute('data-attr'));
    this.contentBox.style.display = 'block';
    this.outerModal.classList.add('-active-outer');
    this.contentBox.classList.add('-animate-content-window');
    this.closeActivated();

}


Modal.prototype.closeActivated = function(container) {

    var closeActivated = this.contentBox.querySelector('.val-close-modals'),
        self = this;

    closeActivated.addEventListener('click', self.closeModal.bind(self));

}

Modal.prototype.closeModal = function() {

    var self = this;

    this.contentBox.classList.add('-animate-content-window-close');
    setTimeout(function() {
        self.outerModal.classList.remove('-active-outer');
        self.contentBox.style.display = 'none';
        self.removeClass(self.contentBox, ['-animate-content-window', '-animate-content-window-close']);
    }, 500)

}

Modal.prototype.removeClass = function(element, argumentsArray) {

    argumentsArray.forEach(function(item) {
        element.classList.remove(item);
    })

}

Modal.prototype.openRememberPassOrBack = function() {


    for (var i = 0; i < this.formSubmit.length; i++) {
        if (window.getComputedStyle(this.formSubmit[i]).getPropertyValue('display') == 'none') {
            var notice = this.formSubmit[i].querySelector('.val-notice');
            if (notice) {
                notice.parentNode.removeChild(notice);
            }
            this.formSubmit[i].style.display = 'block';

        } else {
            this.formSubmit[i].style.display = 'none';
        }

    };

}

Modal.prototype.sendForm = function(id, event) {

    event.preventDefault();

    var url = '/site/' + id;
    this.StaticForm = event.target;

    this.Xhr('POST', url, this.StaticForm, this, this.responseFromServer);

}

Modal.prototype.responseFromServer = function(response, self) {

    if (JSON.parse(response).href) {
        window.location.href = location.protocol + '//' + location.host + JSON.parse(response).href;
    } else {
        self.StaticForm.insertAdjacentHTML('beforeend', '<p class="val-notice">' + JSON.parse(response) + '</p>')
    }

    if (self.StaticForm) {
        self.StaticForm.reset();
    }

}

/*=====  End of Modal comment block  ======*/

/*=============================================
=            Section Currency block     =
=============================================*/

function Currency() {
    
    var url = "http://"+location.hostname+"/site/tryCurrency";

    this.Xhr('GET', url, null, this, this.templates);
}

Currency.prototype = Object.create(Site.prototype);

Currency.prototype.templates = function(query, self) {

    var query = JSON.parse(query),
        InArray = Array("Альфа-Банк", "ПриватБанк", "ПУМБ", "Укрсоцбанк", "Райффайзен Банк Аваль"),
        a = Array(),
        stay;

    [].reduce.call(query, function(previousValue, currentValue, index) {

        if (previousValue == 0 || currentValue.bankName != previousValue) {
            if (stay) {
                a.push(stay);
            }
            stay = {};
            stay.bankName = currentValue.bankName;
            stay[currentValue.codeAlpha] = {
                rateBuy: currentValue.rateBuy,
                rateBuyDelta: currentValue.rateBuyDelta,
                rateSale: currentValue.rateSale,
                rateSaleDelta: currentValue.rateSaleDelta
            }
        } else {
            stay[currentValue.codeAlpha] = {
                rateBuy: currentValue.rateBuy,
                rateBuyDelta: currentValue.rateBuyDelta,
                rateSale: currentValue.rateSale,
                rateSaleDelta: currentValue.rateSaleDelta
            }
        }

        return currentValue.bankName;

    }, 0);


    var newA = a.filter(function(item, i) {
        if (self.inArray(item.bankName, InArray)) {
            return item;
        }
    });

    self.templateForArray(newA, self);

}

Currency.prototype.inArray = function(needle, array) {
    for (var i = 0, l = array.length; i < l; i++) {
        if (array[i] == needle) {
            return true;
        }
    }
    return false;
}


Currency.prototype.templateForArray = function(a, self) {

    var str = "<table class='-new-currensy'><tr><th><span>Банк</span></th><th><span style='font-size: 18px'>&#402;</span></th><th><span>Покупка</span></th><th><span>Продажа</span></th></tr>";

    [].forEach.call(a, function(item, i) {
        str += "<tr>" + "<td><p><i>" + item.bankName + "</i></p></td>" + "<td><span><b>&euro;</b></span><span><b>$</b></span><span><b>R</b></span></td>" + "<td><span>" + self.gets(item, "EUR", "rateBuy") + "</span> <span>" + self.gets(item, "USD", "rateBuy") + "</span> <span>" + self.gets(item, "RUB", "rateBuy") + "</span></td>" + "<td><span>" + self.gets(item, "EUR", "rateSale") + "</span> <span>" + self.gets(item, "USD", "rateSale") + "</span> <span>" + self.gets(item, "RUB", "rateSale") + "</span></td>" + "</tr>"
    });

    str += "</table>";

    var div = document.querySelector(".-currency-val")
    div.insertAdjacentHTML("beforeend", str);

}


Currency.prototype.gets = function(item, items, rate) {

    if (item[items]) {
        if (rate == "rateBuy") {
            var srt = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
            delta = (item[items]["rateBuyDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateBuyDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            srt += delta;
            return srt;
        } else if (rate == "rateSale") {
            var srt = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
            delta = (item[items]["rateSaleDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateSaleDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            srt += delta;
            return srt;
        }
    } else {
        return '-';
    }

}

/*=====  End of Currency comment block  ======*/


function weatherForVal(){

    var url = "http://"+location.hostname+"/site/tryWeather";

    this.Xhr('GET', url, null, this, this.tmp);

}

weatherForVal.prototype = Object.create(Site.prototype);

weatherForVal.prototype.tmp = function(data, self){

    var data = JSON.parse(data),
        query = data.forecast,
        queryNow = data.now;

  var html = '<div class="drop-weather-button">'
              +'<div class="outer-today-ico">'
                  +'<span class="icons-for-c-min icon-weather-min-'+query[0].code+'"></span>'
                  +'<i class="today-weather">'+queryNow+' С°</i>'
              +'</div>'
              +'<div class="drop-wether">'
                  +'<p class="for-genwether"><span class="title-weather">Погода</span><span class="city-weather">Украина, Чернигов</span></p>'
                  +'<div class="section-today">'
                +'<div class="for-weather-icon">'
                  +'<h5 class="section-heading">Сьогодні</h5>'
                  +'<span class="icons-for-c icon-weather-'+query[0].code+'"></span>'
                +'</div>'
              +'<div class="weather-detail">'
                  +'<h4 class="weather-heading">'
                      +'<span class="temp-now">'+queryNow+' С°</span>'
                      +'<span class="phrase">Температура зараз</span>'
                  +'</h4>'
                  +'<span class="temperature high-temperature">'+query[0].high+' С°</span>'
                  +'&nbsp; - &nbsp;'
                  +'<span class="temperature low-temperature">'+query[0].low+' С°</span>'
                  +'<p class="summary">'+query[0].text+'</p>'
              +'</div>'
                  +'</div>'
                  +'<div class="section-this-week">'
                      +'<h5 class="section-heading">Тиждень</h5>'
                      +'<ul class="item-list-temperature">'
                          + self.creaters(query);
                      +'</ul>'
                  +'</div>'
              +'</div>'
          +'</div>';
  var el = document.querySelector(".outer-for-weather");
  el.insertAdjacentHTML("beforeend", html);
}

weatherForVal.prototype.creaters = function(query){
  var srt = "";
  [].forEach.call(query, function(item, i){
    if(i != 0){
      srt += '<li class="item-time-temperature">'
                +'<span class="icons-for-c icon-weather-'+item.code+'"></span>'
                +'<span class="day">'+item.date+'</span>'
                +'<span class="temperature-days high-temperature">'+item.high+' С°</span>'
                +'&nbsp;-&nbsp;'
                +'<span class="temperature-days low-temperature">'+item.low+' С°</span>'
            +'</li>';
    }
  })
  return srt;
}

/*=============================================
=            Section handlerAllStart block     =
=============================================*/

function handlerAllStart() {
    new Slider(document.querySelector('.val-list-slider'));
    new IframeGemerate(document.querySelector('.val-iframe-streams'));
    new AjaxLoadCategory(document.querySelector('.val-full-width-category'));
    new Modal();
    new Currency();
    new weatherForVal();
    new StickyAccordeon(document.getElementById('val-only-else-pages'));
    new AjaxLoaderCategorySingle(document.getElementById('val-single-category'), document.getElementById('val-count-and-id'));
    new Pikaday({ field: document.getElementById('datepicker') });
}

/*=====  End of handlerAllStart comment block  ======*/


window.addEventListener('DOMContentLoaded', handlerAllStart)
