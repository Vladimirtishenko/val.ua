function Helper () {
	"use strict";
}

Helper.prototype.returnDateNow = function () {
	"use strict";
	var now = new Date(),
		currDate = now.getDate() < 10 ? '0' + now.getDate() : now.getDate(),
		currMonth = (now.getMonth() + 1) < 10 ? '0' +(now.getMonth() + 1) : now.getMonth() + 1,
		currYear = now.getFullYear();

	return currYear + '-' + currMonth + '-' + currDate;
};

Helper.prototype.dateHalper = function (datas, lang){
	"use strict";
	var data = datas.split(' ');

	if(this.returnDateNow() > data[0]){
		
		var thisDateMounth = this.mounthObject(new Date(data[0]).getMonth() + 1, lang),
			thisDateDay = new Date(data[0]).getDate(),
			thisDateYear = new Date(data[0]).getFullYear();

		return thisDateDay + ' ' + thisDateMounth + ' ' + thisDateYear;

	} else {
		return data[1].slice(0, -3);
	}

};

Helper.prototype.mounthObject = function(mount, lang){
	"use strict";
	var mounthObject = {
		ru: {
			1: 'Января',
			2: 'Февраля',
			3: 'Марта',
			4: 'Апреля',
			5: 'Мая',
			6: 'Июня',
			7: 'Июля',
			8: 'Августа',
			9: 'Сентября',
			10: 'Октября',
			11: 'Ноября',
			12: 'Декабря'	
		},
		uk: {
			1: "Січня",
			2: "Лютого",
			3: "Березня",
			4: "Квітня",
			5: "Травня",
			6: "Червня",
            7: "Липня",
            8: "Серпня",
            9: "Вересня",
            10: "Жовтня",
            11: "Листопада",
            12: "Грудня"
		}
	};

	return mounthObject[lang][mount];

};


Helper.prototype.templateImage = function(arrays, lang){
	"use strict";

	var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category val-category-image">' +
        '<div class="val-item-outer-category-image">' +
        '<img src="/uploads/news/thumb/' + arrays.image + '" alt="' + arrays['title_' + lang] + '">' +
        '</div>' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + this.dateHalper(arrays.date, lang) + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '</a>';

    return template;
};


Helper.prototype.templateWithoutImage = function(arrays, lang) {
	"use strict";
    var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category">' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + this.dateHalper(arrays.date, lang) + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '<p class="val-description-news-category">' + arrays['description_' + lang].slice(0, 250) + '...</p>' +
        '</a>';

    return template;
};


Helper.prototype.scrollHandler = function(general) {
	"use strict";

    if (document.body.offsetHeight - 1500 < window.scrollY + window.innerHeight && this.state && !general) {
        this.state = false;
        this.generateDataAjax();
    }else if (document.body.offsetHeight - 700 < window.scrollY + window.innerHeight && this.state && this.count < 10 && general) {

        if (this.count === 7) {
            this.count++;
        }
        this.state = false;
        this.generateDataAjax(this.count);
    }


};

Helper.prototype.inArray = function(needle, array) {
    "use strict";
    for (var i = 0, l = array.length; i < l; i++) {
        if (array[i] == needle) {
            return true;
        }
    }
    return false;
};
function ModelXhr() {
    "use strict";
    this.xhr = function() {
        var xmlhttp;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    };
}

ModelXhr.prototype = Object.create(Helper.prototype);

ModelXhr.prototype.Xhr = function(method, url, form, objectCaller, callback) {
    "use strict";
    if (form) {

        var formElement = form.querySelectorAll('input');
        formData = new FormData();

        for (var i = 0; i < formElement.length; i++) {
            formData.append(formElement[i].name, formElement[i].value);
        }

    } else {
        var formData = null;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(argument) {
        if (xhr.status === 200 && xhr.readyState === 4) {
            callback(xhr.responseText, objectCaller);
        }
    };

    xhr.open(method, url, true);
    xhr.send(formData);

};

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
    new Market(document.querySelector('.val-market-table'));
    new StickyAccordeon(document.getElementById('val-only-else-pages'));
    new AjaxLoaderCategorySingle(document.getElementById('val-single-category'), document.getElementById('val-count-and-id'));
    new AjaxLoaderMultimedia(document.getElementById('val-single-multimedia'), document.getElementById('val-count-and-id'));
    new Pikaday({ field: document.getElementById('datepicker') });
    new MansoryGenerator(document.querySelectorAll('.-for-mansory-container'));
};

if(location.href.indexOf('jasmine') == -1){
    window.addEventListener('DOMContentLoaded', handlerAllStart);  
}


/*=============================================
=            Section Slider block            =
=============================================*/

function Slider(elem) {
    "use strict";
    if (!elem) {
        return;
    }

    this.list = elem;
    this.countChild = elem.children.length;
    this.width = parseInt(window.getComputedStyle(elem.parentNode).getPropertyValue('width'));
    this.move = 0;
    this.currentSlide = 0;

    elem.style.width = this.width * this.countChild + 'px';

    [].forEach.call(elem.children, staticSize);

    function staticSize(item, i) {
        item.setAttribute("data-slides-number", i);
    }

    this.createControls(this.countChild);

}

Slider.prototype.createControls = function(count) {
    "use strict";
    var constrols = document.querySelector(".val-display-controls"),
        items = "",
        self = this;

    for (var i = 0; i < count; i++) {
        items += (i === 0) ? "<span class='-active-slide' data-slide=" + i + "></span>" : "<span data-slide=" + i + "></span>";
    }

    constrols.insertAdjacentHTML("afterbegin", items);
    constrols.addEventListener("click", self._clickSlideHandlers.bind(self));
    this.controlsBuild = true;

};

Slider.prototype._clickSlideHandlers = function(event) {
    "use strict";
    var target = event.target ? event.target : event,
        self = this,
        clicked = target.getAttribute('data-slide') ? parseInt(target.getAttribute('data-slide')) : null,
        move = null;

    if (clicked == null || target.classList.contains('-active-slide')) {
        return;
    }

    if (clicked > this.currentSlide) {
        if ((this.currentSlide + 1) < clicked) {
            move = parseInt((-self.width) * clicked);
            toSlideAnimation(move, 0.5);
        } else {
            move = parseInt(self.move) + parseInt(-self.width);
            toSlideAnimation(move, 0.8);
        }

    } else {
        if ((this.currentSlide - 1) > clicked) {
            move = parseInt((-self.width) * clicked);
            toSlideAnimation(move, 0.5);
        } else {
            move = parseInt(self.move) + parseInt(self.width);
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

};

/*=====  End of Slider comment block  ======*/

/*=============================================
=            Section IframeGemerate block      =
=============================================*/

function IframeGemerate(element) {
    "use strict";
    if(!element) {
        return false;
    }

    var dataArray = element.getAttribute('data-src').split(','),
        self = this,
        template = '';

    dataArray.forEach(function(item) {
        template += self.template(item);
    });

    element.insertAdjacentHTML('afterbegin', template);

}


IframeGemerate.prototype.template = function(src) {
    "use strict";
    var str = "<div class='val-outer-frame'>" +
        "<span class='val-ico-online'><i>Online</i></span>" +
        "<iframe width='100%' height='270px' src='" + src + "' frameborder='0' allowfullscreen></iframe>" +
        "</div>";

    return str;
};


/*=====  End of IframeGemerate comment block  ======*/
function StickyAccordeon(element){
    "use strict";
    if(!element) {
        return;
    }

    this.accordeon = element.querySelector('.val-accordeons-block');
    
    var self = this;

    window.addEventListener('scroll', self.positionOfAccordeon.bind(self));

}

StickyAccordeon.prototype.positionOfAccordeon = function () {
    "use strict";
    var elementOuterParent = this.accordeon.parentNode.getBoundingClientRect();

    if(elementOuterParent.top <= 30 && this.accordeon.style.position !== 'fixed'){
        this.accordeon.style.position = 'fixed';
    } else if(elementOuterParent.top > 30 && this.accordeon.getAttribute('style')) {
        this.accordeon.removeAttribute('style');
    } 

}; 
function Modal() {
    "use strict";
    var self = this;

    this.login = document.querySelector('.-login');
    this.registration = document.querySelector('.-registration');
    this.about = document.querySelector('.-about');
    this.outerModal = document.querySelector('.val-modal-login-reg-outer');
    this.rememberPassOrBack = document.querySelectorAll('.-val-remember-pass');
    this.formSubmit = (this.outerModal) ? this.outerModal.querySelectorAll('form') : null;

    this.StaticForm = null;

    this.login.addEventListener('click', self.openForm.bind(self, this.login));
    this.registration.addEventListener('click', self.openForm.bind(self, this.registration));
    this.about.addEventListener('click', self.openForm.bind(self, this.about));

    for (var i = 0; i < this.rememberPassOrBack.length; i++) {
        this.rememberPassOrBack[i].addEventListener('click', self.openRememberPassOrBack.bind(self));
    }

    for (var j = 0; j < this.formSubmit.length; j++) {
        this.formSubmit[j].addEventListener('submit', self.sendForm.bind(self, this.formSubmit[j].id));
    }

}

Modal.prototype = Object.create(Site.prototype);

Modal.prototype.openForm = function(button, event) {
    "use strict";
    this.contentBox = document.querySelector("." + button.getAttribute('data-attr'));
    this.contentBox.style.display = 'block';
    this.outerModal.classList.add('-active-outer');
    this.contentBox.classList.add('-animate-content-window');
    this.closeActivated();
};


Modal.prototype.closeActivated = function(container) {
    "use strict";
    var closeActivated = this.contentBox.querySelector('.val-close-modals'),
        self = this;

    closeActivated.addEventListener('click', self.closeModal.bind(self));

};

Modal.prototype.closeModal = function() {
    "use strict";
    var self = this;

    this.contentBox.classList.add('-animate-content-window-close');
    self.outerModal.classList.add('-active-outer-out');
    setTimeout(function() {
        self.outerModal.classList.remove('-active-outer', '-active-outer-out');
        self.contentBox.style.display = 'none';
        self.removeClass(self.contentBox, ['-animate-content-window', '-animate-content-window-close']);
    }, 500);

};

Modal.prototype.removeClass = function(element, argumentsArray) {
    "use strict";
    argumentsArray.forEach(function(item) {
        element.classList.remove(item);
    });

};

Modal.prototype.openRememberPassOrBack = function() {
    "use strict";

    for (var i = 0; i < this.formSubmit.length; i++) {
        if (window.getComputedStyle(this.formSubmit[i]).getPropertyValue('display') === 'none') {
            var notice = this.formSubmit[i].querySelector('.val-notice');
            if (notice) {
                notice.parentNode.removeChild(notice);
            }
            this.formSubmit[i].style.display = 'block';

        } else {
            this.formSubmit[i].style.display = 'none';
        }

    }

};

Modal.prototype.sendForm = function(id, event) {
    "use strict";
    event.preventDefault();

    var url = '/site/' + id;
    this.StaticForm = event.target;

    this.Xhr('POST', url, this.StaticForm, this, this.responseFromServer);

};

Modal.prototype.responseFromServer = function(response, self) {
    "use strict";
    if (JSON.parse(response).href) {
        window.location.href = location.protocol + '//' + location.host + JSON.parse(response).href;
    } else {
        self.StaticForm.insertAdjacentHTML('beforeend', '<p class="val-notice">' + JSON.parse(response) + '</p>');
    }

    if (self.StaticForm) {
        self.StaticForm.reset();
    }

};
/*=============================================
=            Section Market      =
=============================================*/

function Market(element) {

    if (!element) {
        return;
    }

    this.element = element;
    var child = this.element.children;


    for (var i = 0; i < child.length; i++) {
        ("mouseenter mouseleave".split(" ")).forEach(function(e) {
            child[i].addEventListener(e, this.HandlerToMouseEnterLeave, false);
        }.bind(this));
    }

}

Market.prototype.HandlerToMouseEnterLeave = function() {

    var attr = this.getAttribute('data-attr'),
        block = document.getElementById(attr);

    if (!block) {
        return;
    }

    if (event.type == "mouseenter") {
        block.style.display = "block";
    } else {
        block.style.display = "none";
    }

};



/*=====  End of Section Market block  ======*/

function Currency() {
    "use strict";

    var url = "http://"+location.hostname+"/site/tryCurrency";

    this.Xhr('GET', url, null, this, this.templates);
}

Currency.prototype = Object.create(Site.prototype);

Currency.prototype.templates = function(query, self) {

    "use strict";
    var querys = JSON.parse(query),
        InArray = ["Альфа-Банк", "ПриватБанк", "ПУМБ", "Укрсоцбанк", "Райффайзен Банк Аваль"],
        a = [],
        stay;

    [].reduce.call(querys, function(previousValue, currentValue, index) {

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
            };
        } else {
            stay[currentValue.codeAlpha] = {
                rateBuy: currentValue.rateBuy,
                rateBuyDelta: currentValue.rateBuyDelta,
                rateSale: currentValue.rateSale,
                rateSaleDelta: currentValue.rateSaleDelta
            };
        }

        return currentValue.bankName;

    }, 0);


    var newA = a.filter(function(item, i) {
        if (self.inArray(item.bankName, InArray)) {
            return item;
        }
    });

    self.templateForArray(newA, self);

};

Currency.prototype.templateForArray = function(a, self) {
    "use strict";
    var str = "<table class='-new-currensy'><tr><th><span>Банк</span></th><th><span style='font-size: 18px'>&#402;</span></th><th><span>Покупка</span></th><th><span>Продажа</span></th></tr>";

    [].forEach.call(a, function(item, i) {
        str += "<tr>" + "<td><p><i>" + item.bankName + "</i></p></td>" + "<td><span><b>&euro;</b></span><span><b>$</b></span><span><b>R</b></span></td>" + "<td><span>" + self.gets(item, "EUR", "rateBuy") + "</span> <span>" + self.gets(item, "USD", "rateBuy") + "</span> <span>" + self.gets(item, "RUB", "rateBuy") + "</span></td>" + "<td><span>" + self.gets(item, "EUR", "rateSale") + "</span> <span>" + self.gets(item, "USD", "rateSale") + "</span> <span>" + self.gets(item, "RUB", "rateSale") + "</span></td>" + "</tr>";
    });

    str += "</table>";

    var div = document.querySelector(".-currency-val");
    div.insertAdjacentHTML("beforeend", str);

};


Currency.prototype.gets = function(item, items, rate) {
    "use strict";
    var delta, str;
    if (item[items]) {
        if (rate == "rateBuy") {
                str = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateBuyDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateBuyDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            str += delta;
            return str;
        } else if (rate == "rateSale") {
                str = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateSaleDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateSaleDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            str += delta;
            return str;
        }
    } else {
        return '-';
    }

};
function weatherForVal(){
    "use strict";
    var url = "http://"+location.hostname+"/site/tryWeather";

    this.Xhr('GET', url, null, this, this.tmp);

}

weatherForVal.prototype = Object.create(Site.prototype);

weatherForVal.prototype.tmp = function(data, self){
  "use strict";
  var datas = JSON.parse(data),
      query = datas.forecast,
      queryNow = datas.now,
      structure = self.creaters(query);

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
                          + structure
                      +'</ul>'
                  +'</div>'
              +'</div>'
          +'</div>';
  var el = document.querySelector(".outer-for-weather");
  el.insertAdjacentHTML("beforeend", html);
};

weatherForVal.prototype.creaters = function(query){
  "use strict";
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
  });
  return srt;
};
/*=============================================
=            Section MansoryGenerator      =
=============================================*/

function MansoryGenerator(element) {

   if(!element) {
        return;
   }

   [].forEach.call(element, this.generateMansory);
 
}


MansoryGenerator.prototype.generateMansory = function(item){

    var img = item.querySelectorAll('img'),
        count = img.length,
        j = 1,
        classie = item.querySelector('.val-block-multimedia-gallery') ? '.val-block-multimedia-gallery' : '.val-block-multimedia';

    [].forEach.call(img, function(item, i){
        var img = new Image();
            img.src = item.src;

        img.onload = function(){
            StackMansory(this);
        }
    })

    function StackMansory(images){
        delete images;
        if(j < count){
            j++;
        } else {
            new Masonry( item, {
              itemSelector: classie,
              columnWidth: 1
            });

            item.style.opacity = "1";
            $(function(){$(classie).imageLightbox()})
        }
    }




}

/*=====  End of Section MansoryGenerator block  ======*/

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
        str = '<div class="val-category-block">' +
                '<h2 class="val-title-uppercase-with-line">' + category[0]['name_' + lang] + '</h2>'+
                '<div class="val-news-list-category">';


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
        template = [];

    dataContent.forEach(function(item, i){
        
        var elementOuter = document.createElement('a'), 
            elementInner = document.createElement('div'), 
            img = new Image(), 
            elementSpan = document.createElement('span'),
            classieType = '-val-ico-'+item.type;
        
        elementOuter.href = (item.type == 'photo') ? '/'+lang+'/site/photos/'+item.id : '/'+lang+'/site/video/'+item.id;
        elementOuter.classList.add('val-block-multimedia', classieType);
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